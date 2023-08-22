<?php

class UploadModel extends Model
{
    
    private $table = "img_upload";
    // untuk upload gambar

    public function uploadValidation($data)
    {
        

        $fileName = $data['name'];
        $fileSize = $data['size'];
        $fileError = $data['error'];
        $filePlace = $data['tmp_name'];
        $fileType = $data["type"];
        $title = $_POST['image-title'];
        $imageCat = $_POST['tipe-upload'];

        if ($fileError === 4) {
            echo "<script>
                        alert('Error, type is wrong');
                    </script>";
            return false;
        }

        $allowedExtension = ['jpg', 'jpeg', 'png'];
        $extention = explode('.', $fileName);
        $extention = strtolower(end($extention));
        // var_dump($extention);die;
        if (!in_array($extention, $allowedExtension)) {
            echo "<script>
                        alert('Error, file extention is not allowed');
                    </script>";
            return false;
        }

        if ($fileSize / 1024 > 6134) {
            echo "<script>
                        alert('Error, file size to big');
                    </script>";
            return false;
        }

        //set new place/directory for save image

        /**
         * str_replace(yang mau dicari, pengganti, yang mau diganti)
         */
        // var_dump($_SERVER['DOCUMENT_ROOT']);die;
        $newPlace = $_SERVER['DOCUMENT_ROOT'] . "/deux/assets/upload/all/";
        $title = str_replace(" ", "-", $title);
        $newFileName = uniqid() . "-" . time() . "-" . $title . '.' . $extention;
        $newPath = $newPlace . $newFileName;
        move_uploaded_file($filePlace, $newPath);

        $small_thumbnail_path = $_SERVER['DOCUMENT_ROOT'] . "/deux/assets/upload/" . $imageCat . "/small/";
        $this->createFolder($small_thumbnail_path);
        $small_thumbnail = $small_thumbnail_path . $newFileName;

        $medium_thumbnail_path =  $_SERVER['DOCUMENT_ROOT'] . "/deux/assets/upload/" . $imageCat . "/medium/";
        $this->createFolder($medium_thumbnail_path);
        $medium_thumbnail = $medium_thumbnail_path . $newFileName;

        $large_thumbnail_path =  $_SERVER['DOCUMENT_ROOT'] . "/deux/assets/upload/" . $imageCat . "/large/";
        $this->createFolder($large_thumbnail_path);
        $large_thumbnail = $large_thumbnail_path . $newFileName;
        
        // resizing
        $imageSize = getImageSize($newPlace . $newFileName);
        $oriWidthImage = $imageSize[0];
        $oriHeightImage = $imageSize[1];
        // large image
        $largeWidthImage = $oriWidthImage * 0.75;
        $largeHeightImage = $oriHeightImage * 0.75;

        $mediumWidthImage = $oriWidthImage * 0.5;
        $mediumHeightImage = $oriHeightImage * 0.5;

        $smallWidthImage = $oriWidthImage * 0.35;
        $smallHeightImage = $oriHeightImage * 0.35;

        $thumb1 = $this->createThumbnail($newPath, $small_thumbnail, $fileType, $smallWidthImage, $smallHeightImage);
        $thumb2 = $this->createThumbnail($newPath, $medium_thumbnail, $fileType, $mediumWidthImage, $mediumHeightImage);
        $thumb3 = $this->createThumbnail($newPath, $large_thumbnail, $fileType, $largeWidthImage, $largeHeightImage);
        if ($thumb1 && $thumb2 && $thumb3) {
            $output['status'] = TRUE;
            $output['small'] = $small_thumbnail;
            $output['medium'] = $medium_thumbnail;
            $output['large'] = $large_thumbnail;
        }
        return $newFileName;
    }
    public function createFolder($path)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, TRUE);
        }
    }

    public function createThumbnail($sourcePath, $targetPath, $file_type, $thumbWidth, $thumbHeight)
    {

        if ($file_type == "image/png") {
            $source = imagecreatefrompng($sourcePath);
        } else if ($file_type == "image/jpg" || $file_type == "image/jpeg" || $file_type == "image/pjpeg") {
            $source = imagecreatefromjpeg($sourcePath);
        }

        $width = imagesx($source);
        $height = imagesy($source);

        $tnumbImage = imagecreatetruecolor($thumbWidth, $thumbHeight);

        imagecopyresampled($tnumbImage, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $width, $height);

        if (imagejpeg($tnumbImage, $targetPath, 90)) {
            imagedestroy($tnumbImage);
            imagedestroy($source);
            return TRUE;
        } else if (imagepng($tnumbImage, $targetPath, 90)) {
            imagedestroy($tnumbImage);
            imagedestroy($source);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function uploadImg($firstData)
    {

        $image = $this->uploadValidation($_FILES['image-file-upload']);
        if (!$image) {
            return false;
        }

        $query = "INSERT INTO img_upload 
                    VALUES 
                    (
                        '', :id, :img_type, :img_category, :img_title, :img_location, :img_caption, :img_file
                    )";
        $category = str_replace(" ", "_", $firstData['image-categories']);
        $values = [
            "id" => $_SESSION['UID'],
            "img_type" => $firstData['tipe-upload'],
            "img_category" => $category,
            "img_title" => $firstData['image-title'],
            "img_location" => $firstData['image-location'],
            "img_caption" => $firstData['image-caption'],
            "img_file" => $image
        ];
        $this->db->query($query);
        $this->db->bindMultiple(':id,:img_type,:img_category,:img_title,:img_location,:img_caption,:img_file', $values);

        return $this->db->getAffectedRow();
    }

    public function getImageCategories()
    {
        $this->db->query('SELECT DISTINCT img_category FROM ' . $this->table);
        return $this->db->getResultSet();
    }

    public function getUserValidation()
    {
        $this->db->query("SELECT verified FROM users WHERE id = :id");
        $this->db->bind(":id", $_SESSION['UID']);
        return $this->db->getResult();
    }
}

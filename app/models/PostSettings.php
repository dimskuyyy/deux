<?php
class PostSettings extends Model
{
    public function getAllData($id)
    {
        // Check Id from URL
        $newid = explode('-', $id);
        $newid = reset($newid);

        // Get All Data 
        $query = "SELECT * FROM img_upload WHERE id = :id ORDER BY img_id DESC";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $data = $this->db->getResultSet();

        for ($i = 0; $i < count($data); $i++) {
            $like = "SELECT img_id as jumlah_like FROM likes WHERE img_id = :id";
            $this->db->query($like);
            $this->db->bind(':id', $data[$i]['img_id']);
            $jumlahLike = count($this->db->getResultSet());
            $data[$i]['jumlah_like'] = $jumlahLike;
        }

        return $data;
    }
    public function deletePost($id)
    {
        // search filename from database
        $this->db->query("SELECT img_file,img_type FROM img_upload WHERE img_id = :id");
        $this->db->bind(':id', $id);
        $file = $this->db->getResult();
        // delete from directories
        if (file_exists('assets/upload/all/' . $file['img_file'])) {
            unlink('assets/upload/all/' . $file['img_file']);
        } else {
            var_dump($_SESSION);
            die;
        }


        if (file_exists('assets/upload/' . $file['img_type'] . '/large/' . $file['img_file'])) {
            unlink('assets/upload/' . $file['img_type'] . '/large/' . $file['img_file']);
        }
        if (file_exists('assets/upload/' . $file['img_type'] . '/medium/' . $file['img_file'])) {
            unlink('assets/upload/' . $file['img_type'] . '/medium/' . $file['img_file']);
        }
        if (file_exists('assets/upload/' . $file['img_type'] . '/small/' . $file['img_file'])) {
            unlink('assets/upload/' . $file['img_type'] . '/small/' . $file['img_file']);
        }

        // delete from database
        $query = "DELETE FROM img_upload WHERE img_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getAffectedRow();
    }

    public function DataEdit($id)
    {
        $query = "SELECT * FROM img_upload WHERE img_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getResult();
    }

    public function UpdatePost($method)
    {
        if (isset($method['edit'])) {
            // declare
            $id = $method['img_id'];
            $title = $method['img_title'];
            $category = $method['img_category'];
            $loc = $method['img_location'];
            $caption = $method['img_caption'];
            $intId = intval($id);

            /* echo gettype($id);
            die; */
            // check for filename
            $this->db->query("SELECT img_title, img_file, img_type FROM img_upload WHERE img_id = :id");
            $this->db->bind(':id', $id);
            $file = $this->db->getResult();

            // check the old title is the same as new title :
            if ($file['img_title'] === $title) {
                $query = "UPDATE img_upload SET 
                        img_title = :img_title,
                        img_category = :img_category,
                        img_location = :img_location,
                        img_caption = :img_caption
                    WHERE img_id = :img_id";
            } else {
                $type = $file['img_type'];
                $name = $file['img_file'];
                $fn = explode('-', $name);
                $ext = explode('.', end($fn));
                $newTitle = str_replace(' ', '-', $title);
                $newFileName = $fn[0] . "-" . $fn[1] . "-";
                $newFileName = $newFileName . $newTitle . "." . $ext[1];
                // Rename file
                rename('assets/upload/all/' . $name, 'assets/upload/all/' . $newFileName);
                rename('assets/upload/' . $type . '/large/' . $name, 'assets/upload/' . $type . '/large/' . $newFileName);
                rename('assets/upload/' . $type . '/medium/' . $name, 'assets/upload/' . $type . '/medium/' . $newFileName);
                rename('assets/upload/' . $type . '/small/' . $name, 'assets/upload/' . $type . '/small/' . $newFileName);
                $query = "UPDATE img_upload SET 
                        img_title = :img_title,
                        img_category = :img_category,
                        img_location = :img_location,
                        img_caption = :img_caption,
                        img_file = :img_file
                    WHERE img_id = :img_id";
            }
            $this->db->query($query);
            $this->db->bind(':img_id', $intId);
            $this->db->bind(':img_title', $title);
            $this->db->bind(':img_category', $category);
            $this->db->bind(':img_location', $loc);
            $this->db->bind(':img_caption', $caption);
            if ($file['img_title'] !== $title) {
                $this->db->bind(':img_file', $newFileName);
            }
            return $this->db->getAffectedRow();
        } else {
            $usun = str_replace(' ', '-', $_SESSION['UN']);
            $usid = $_SESSION['UID'] . '-' . $usun;
            echo "<script>
                alert('Failed');
                document.location.href = '".BASEURL."/member/user/" . $usid . "/post_settings';
            </script>";
            return false;
        }
    }
}

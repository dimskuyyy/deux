<?php
class EditProfile extends Model
{
    public function updateData($method, $method2)
    {
        $username = $method['username'];
        $instagram = $method['instagram'];
        $location = $method['location'];
        $webLink = $method['websiteLink'];
        $webName = $method['websiteName'];
        $desc = $method['description'];
        $avatar = $method2['avatar'];

        $filename = $avatar['name'];
        $choose = "";
        if (empty($filename)) {
            $av_query = "SELECT user_avatar FROM users WHERE id = :id";
            $this->db->query($av_query);
            $this->db->bind(':id', $_SESSION['UID']);
            $av = $this->db->getResult();
            // set old file 
            $choose = $av['user_avatar'];
        }
        if (!empty($filename)) {
            $image_name = explode(".", $filename);
            $ext = end($image_name);
            $tmp = $avatar['tmp_name'];
            $loc = $_SERVER['DOCUMENT_ROOT'] . "/deux/assets/avatar/";
            $new_file_name = uniqid() . "-avatar-user" . $_SESSION['UID'] . "." . $ext;
            $newPath = $loc . $new_file_name;
            move_uploaded_file($tmp, $newPath);
            $choose = $new_file_name;
        }

        $query_check = "SELECT * FROM users WHERE username = :username AND id != :id";
        $this->db->query($query_check);
        $this->db->bind(':username', $username);
        $this->db->bind(':id', $_SESSION['UID']);
        $row = $this->db->rowCount();
        // username exist?
        if ($row > 0) {
            echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
    This username and email has been used!
    </div>';
            return false;
        }/* else if (!(!(empty($webLink)) && !(empty($webName)))) {
    echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
    The web link and web name required! 
    </div>';
    return false;
} */ else {
            $query = "UPDATE users SET username = :username, user_avatar = :avatar, user_instagram = :instagram, user_address = :loca, user_websiteLink = :webLink, user_websiteName = :webName, user_description = :descrip WHERE id = :id";
            $this->db->query($query);
            $values = [
                'username' => $username,
                'avatar' => $choose,
                'instagram' => $instagram,
                'loca' => $location,
                'webLink' => $webLink,
                'webName' => $webName,
                'descrip' => $desc,
                'id' => $_SESSION['UID']

            ];
            $this->db->bindMultiple(":username,:avatar,:instagram,:loca,:webLink,:webName,:descrip,:id", $values);
            $_SESSION['UN'] = $username;
            // $this->db->bind(':username' => $username)
        }
        return $this->db->getAffectedRow();
    }
}

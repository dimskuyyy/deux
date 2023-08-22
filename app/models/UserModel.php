<?php
class UserModel extends Model
{
    public function cookiesChecker()
    {
        if (isset($_COOKIE['UID']) && isset($_COOKIE['UEM'])) {
            $id = $_COOKIE['UID'];
            $email = $_COOKIE['UEM'];

            // ambil data users by id
            $query = "SELECT * FROM users WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(":id", $id);
            $result = $this->db->getResultSet();
            foreach ($result as $row) {
                if ($email === hash('sha256', $row['email'])) {
                    $_SESSION['login'] = true;
                    $_SESSION['UID'] = $row['id'];
                    $_SESSION['UEM'] = hash('sha256', $row['email']);
                    $_SESSION['UN'] = $row['username'];
                }
            }
        }
    }
    public function getUserData()
    {
        if (isset($_SESSION['UID']) && isset($_SESSION['UEM'])) {
            $id = $_SESSION['UID'];
            $email = $_SESSION['UEM'];

            // get all data :
            $query = "SELECT * FROM users WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $id);
            return $this->db->getResultSet();
        }
    }
    public function getMember($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getResultSet();
    }

    public function logout()
    {
        if (isset($_COOKIE['UID']) || isset($_COOKIE['UEM']) || isset($_COOKIE['KnEtO'])) {
            setcookie('UID', "", time() - 3600, "/");
            setcookie('UEM', "", time() - 3600, "/");
            setcookie('KnEtO', "", time() - 3600, "/");
        }
        session_start();
        // session_write_close();
        $_SESSION = [];
        session_unset();
        session_destroy();
        // setcookie('PHPSESSID', '', time() - 3600, '/');
        // header('Cache-Control: no-cache, no-store, must-revalidate');
        /* header('Pragma: no-cache');
        header('Cache-Control: no-cache, must-revalidate, max_age=0');
        header('Expires: 0'); */
    }
    public function getPost($id)
    {
        $query = "SELECT img_upload.*, users.id, users.username, users.user_avatar FROM img_upload INNER JOIN users ON img_upload.id = users.id WHERE img_upload.id = :id AND (img_upload.img_type = 'vector' OR img_upload.img_type = 'photo') ORDER BY img_upload.img_id DESC";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->getResultSet();
    }

    public function likeList($id)
    {
        $query = "SELECT  likes.*, img_upload.*, users.id, users.username, users.user_avatar  FROM likes JOIN img_upload ON img_upload.img_id = likes.img_id JOIN users ON img_upload.id = users.id WHERE img_upload.id = users.id AND likes.id = :id AND (img_upload.img_type = 'vector' OR img_upload.img_type = 'photo') ORDER BY likes.img_id DESC";
        /**
         * jadi gini :
         * aku mau ngambil data dari image upload yang img id nya tu sama dengan likes id, terus
         */
        $query2 = "SELECT img_upload.img_id, img_upload.id, likes.img_id FROM img_upload JOIN likes ON img_upload.img_id = likes.img_id WHERE img_upload.img_id = likes.img_id ";
        $this->db->query($query);
        // $this->db->query($query2);
        $this->db->bind(':id', $id);
        return $this->db->getResultSet();
    }
}

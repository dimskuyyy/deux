<?php
class LoginModel extends Model
{

    public function loginValidate($method)
    {
        $email = $method['email'];
        // user validator
        $query = "SELECT * FROM users WHERE email = :email";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $password = $method['password'];
        $count = $this->db->getAffectedRow();
        if ($count > 0) {
            $result = $this->db->getResultSet();
            foreach ($result as $row) {
                if (password_verify($password, $row['password'])) {
                    // check remember
                    $_SESSION['login'] = true;
                    $_SESSION['UID'] = $row['id'];
                    $_SESSION['UEM'] = hash('sha256', $row['email']);
                    $_SESSION['UN'] = $row['username'];
                    if (isset($method['remember'])) {
                        // set cookie
                        setcookie('UID', $row['id'], time() + (24 * 60 * 60), "/");
                        setcookie('UEM', hash('sha256', $row['email']), time() + (24 * 60 * 60), "/");
                        setcookie('KnEtO', $row['token'], time() + (24 * 60 * 60), "/");
                    }
                    // set session

                    header('Location: ' . BASEURL . '/home');
                } else {
                    echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        There was an wrong between your email and password
                    </div></div>';
                }
            }
        } else {
            echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        There was an wrong between your email and password
                </div></div>';
        }
    }
    public function statefullCheck()
    {
        if (isset($_COOKIE['UID']) && isset($_COOKIE['UEM'])) {
            $id = $_COOKIE['UID'];
            $email = $_COOKIE['UEM'];

            $query = "SELECT * FROM users WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $id);
            $result = $this->db->getResultSet();

            foreach ($result as $row) {
                if ($email == hash('sha256', $row['email'])) {
                    $_SESSION['login'] = 'true';
                    $_SESSION['UID'] = $row['id'];
                    $_SESSION['UEM'] = hash('sha256', $row['email']);
                }
            }
        }
    }
}

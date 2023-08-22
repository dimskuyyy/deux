<?php

class JoinModel extends Model
{
    public function registration($method)
    {

        // chechker
        if (isset($method['join'])) {
            $username = $method['username'];
            $email = $method['email'];
            $password = $method['password'];
            $confirmPass = $method['confirmPassword'];

            $data['Cusername'] = $this->usernameCheck($username);
            $data['Cemail'] = $this->emailCheck($email);
            // $errors = [];
            if ($data['Cusername'] && $data['Cemail']) {
                echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        This username and email has been used!
                  </div></div>';
                return false;
            } else if ($data['Cusername']) {
                echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        This username and has been used!
                  </div></div>';
                return false;
            } else if ($data['Cemail']) {
                echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        This email and has been used!
                  </div></div>';
                return false;
            } else if ($password != $confirmPass) {
                echo '<div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-danger w-75 position-absolute" role="alert">
                        The Password does not match!
                  </div></div>';
                return false;
            } else {
                if ($this->insertData($username, $email, $password) > 0) {
                    echo '</div><div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-success w-75 position-absolute" role="alert">
                        Registration success, now you can <a href="' . BASEURL . '/login"> login</a>!</div></div>';
                }
            }
        }
    }

    public function usernameCheck($username)
    {
        $query = "SELECT username FROM users WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(":username", $username);
        $row = $this->db->getResultSet();
        if (!$row) {
            // echo "<script>alert('This username has been used');</script>";
            return false;
        } else {
            return true;
        }
    }
    public function emailCheck($email)
    {
        $query = "SELECT email FROM users WHERE email = :email";
        $this->db->query($query);
        $this->db->bind(":email", $email);
        $rows = $this->db->getResultSet();
        if (!$rows) {
            return false;
        } else {
            return true;
        }
    }

    public function insertData($username, $email, $password)
    {
        $token = bin2hex(random_bytes(50));
        $verified = false;
        $query = "INSERT INTO users VALUES
            (
                '', :username, :email, :pass, :verified, :token, :user_avatar, :user_instagram, :user_address, :user_websiteLink, :user_websiteName, :user_description
            )
    ";
        $this->db->query($query);
        $username = stripslashes($username);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $values = [
            'username' => $username,
            'email' => $email,
            'pass' => $password,
            'verified' => $verified,
            'token' => $token,
            'user_avatar' => 'undraw_male_avatar_323b.svg',
            'user_instagram' => '',
            'user_address' => '',
            'user_websiteLink' => '',
            'user_websiteName' => '',
            'user_description' => ''
        ];
        $this->db->bindMultiple(":username,:email,:pass,:verified,:token,:user_avatar,:user_instagram,:user_address,:user_websiteLink,:user_websiteName,:user_description", $values);

        // SEND VERIFICATION LINK :
        require_once 'app/vendor/autoload.php';


        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
            ->setUsername(EMAIL)
            ->setPassword(EMAIL_PASS);

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        $body = '
        
                    <div class="wrapper">
                        <p>
                            Thank you for Sign up in our website, if you want to access all of our feature in our website, you can press the link below :
                        </p>
                        <p>
                            <a href="'.BASEURL.'/home/getValidation/' . $token . '">Verify your email!</a>
                        </p>

                    </div>
            ';

        // Create a message
        $message = (new Swift_Message('Deux - Verify your email!'))
            ->setFrom(EMAIL)
            ->setTo($email)
            ->setBody($body, 'text/html');

        // Send the message
        $result = $mailer->send($message);


        return $this->db->getAffectedRow();
    }
}

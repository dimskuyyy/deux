<?php
class Edit_profile extends Controller
{
    public function index($id)
    {
        // separate id and username - we need id
        $newid = explode('-', $id);
        $newid = reset($newid);

        // make username from $_SESSION['UN']
        $un = str_replace(' ', '-', $_SESSION['UN']);
        if (isset($_POST['change'])) {
            if ($this->model('EditProfile')->updateData($_POST, $_FILES) > 0) {
                echo '<div class="position-relative"><div class=" position-relative w-100 d-flex justify-content-center" style="top:70px;"><div class="alert alert-success w-75 position-absolute" role="alert">
                        Profil Updated, <a href="' . BASEURL . '/member/user/' . $_SESSION['UID'] . '-' . $un . '">Look at my profile</a>!
                        </div></div';
            }
        }

        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        if (isset($_SESSION['login'])) {
            $data['mem'] = $this->model('UserModel')->getMember($id);
            foreach ($data['mem'] as $check) {
                // var_dump($check);die;
                if ($newid == $_SESSION['UID'] && $_SESSION['UEM'] == hash('sha256', $check['email'])) {
                    $this->view('templates/header');
                    $this->view('templates/navigation2', $data);
                    $this->view('edit_profile/index', $data);
                    $this->view('templates/footer');
                } else {
                    header('Location: ' . BASEURL . '/home');
                }
            }
        } else {
            header('Location: ' . BASEURL . '/home');
        }
    }
}

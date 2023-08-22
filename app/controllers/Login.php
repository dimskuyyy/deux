<?php
class Login extends Controller
{
    public function index()
    {
        if (isset($_POST['login'])) {
            $data['user'] = $this->model('loginModel')->LoginValidate($_POST);
        }
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/home');
        } else {
            $data['role'] = "guest";
            $data['user'] = $this->model('UserModel')->getUserData();
            $this->view('templates/header');
            $this->view('templates/navigation2', $data);
            $this->view('login/index');
            $this->view('templates/footer');
        }
    }
}

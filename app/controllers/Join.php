<?php

class Join extends Controller
{
    public function index()
    {
        $data['user'] = $this->model('JoinModel')->registration($_POST);
        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . 'home');
        } else {
            $data['role'] = "guest";
            $data['user'] = $this->model('UserModel')->getUserData();
            $this->view('templates/header');
            $this->view('templates/navigation2', $data);
            $this->view('join/index', $data);
            $this->view('templates/footer');
        }
    }
}

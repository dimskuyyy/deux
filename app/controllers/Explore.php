<?php

class Explore extends Controller
{
    public function index()
    {
        $data['list'] = $this->model('ExploreModel')->getList("photo");
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('explore/index', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }
    public function vector()
    {
        $data['list'] = $this->model('ExploreModel')->getList("vector");
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('explore/vector', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }
    /* public function icon()
    {
        $data['list'] = $this->model('ExploreModel')->getList("icon");
        if ($this->model('UserModel')->cookiesChecker()) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('explore/icon', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    } */
    // public function author()
    // {
    //     if ($this->model('UserModel')->cookiesChecker()) {
    //         $data['role'] = 'member';
    //         $data['user'] = $this->model('UserModel')->getUserData();
    //     }else{
    //         $data['role'] = 'guest';
    //     }
    //     $this->view('templates/header');
    //     $this->view('templates/navigation2',$data);
    //     $this->view('explore/author');
    //     $this->view('templates/footerBar');
    //     $this->view('templates/footer');
    // }
}

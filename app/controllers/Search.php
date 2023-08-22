<?php
class Search extends Controller
{
    public function index()
    {
        $type = $_POST['search_by'];
        $category = $_POST['search'];
        if (isset($type) && isset($category)) {
            header('Location: ' . BASEURL . "/search/" . $type . "/" . $category);
        } else if (!isset($type)) {
            header('Location: ' . BASEURL . "/search/photo/" . $category);
        } else {
            echo "You couldn't load this page";
        }
    }
    public function photo($category)
    {
        $data['list'] = $this->model('SearchModel')->getData("photo", $category);
        $data['more'] = $this->model('SearchModel')->getDataDetail("photo");
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
            $data['like'] = $this->model('FollowLikeModel')->gotLikeAct();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('search/photo', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }
    public function vector($category)
    {
        $data['list'] = $this->model('SearchModel')->getData("vector", $category);
        $data['more'] = $this->model('SearchModel')->getDataDetail("vector");
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
            $data['like'] = $this->model('FollowLikeModel')->gotLikeAct();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('search/vector', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }
    /*  public function icon($category)
    {
        $data['list'] = $this->model('SearchModel')->getData("icon", $category);
        $data['more'] = $this->model('SearchModel')->getDataDetail("icon");
        if ($this->model('UserModel')->cookiesChecker()) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('search/icon', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    } */
    /* public function author()
    {
        // $data['list'] = $this->model('SearchModel')->getData("author", $category);
        // var_dump($data['list']);
        if ($this->model('UserModel')->cookiesChecker()) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
    } */
}

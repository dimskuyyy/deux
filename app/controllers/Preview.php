<?php
class Preview extends Controller
{
    public function index($id)
    {

        $data['preview'] = $this->model('PreviewModel')->getPreviewData($id);
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        $this->view('templates/header');
        $this->view('templates/navigation2', $data);
        $this->view('preview/index', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }
}

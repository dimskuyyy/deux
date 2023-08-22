<?php

class Home extends Controller
{
    public function getValidation($token)
    {
        $data['valid'] = $this->model('HomeModel')->Validasi($token);
        foreach ($data['valid'] as $valid) {
            if ($valid['token'] == $token) {
                $id = $valid['id'];
                // var_dump($valid['verified']);die;
                if ($valid['verified'] == "1") {
                    echo "<script>
                            alert('You are already verified');
                            document.location.href= '".BASEURL."/login';
                        </script>
                        ";
                } else if ($valid['verified'] == "0") {
                    if ($this->model('HomeModel')->verify($valid['token']) > 0) {

                        echo "<script>
                            alert('Your Email has been verified, now you can access all of features in this website');
                            document.location.href= '".BASEURL."/login';
                        </script>";
                    }
                }
            } else {
                echo "<script>
                            alert('Validation');
                            document.location.href= '".BASEURL."/home';
                        </script>
                        ";
            }
        }
    }
    public function index()
    {
        // if () {
        //     # code...
        // }
        $data['image'] = $this->model('HomeModel')->getImage();
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
            $data['like'] = $this->model('FollowLikeModel')->gotLikeAct();
        } else {
            $data['role'] = 'guest';
        }

        $this->view('templates/header');
        $this->view('templates/navigation', $data);
        $this->view('home/index', $data);
        $this->view('templates/footerBar');
        $this->view('templates/footer');
    }

    public function getPreview($id)
    {
        /*  var_dump($this->model('HomeModel')->Preview($id));
        die; */
        header('Content-Type: application/json');
        $this->model('HomeModel')->Preview($id);
        echo json_encode($this->model('HomeModel')->Preview($id));
    }
    public function getRecom($tipe, $category)
    {
        header('Content-Type: application/json');
        echo json_encode($this->model('HomeModel')->Recommend($tipe, $category));
    }

    public function getDataSearch()
    {
        // var_dump($_POST['query']);
        $data['list'] = $this->model('HomeModel')->searchBy($_POST['query']);
        // echo $data['list'];
    }

    public function getDataTest($id){
        header('Content-Type: application/json');
        echo json_encode($this->model('HomeModel')->test($id));
    }
    public function signout()
    {
        $this->model('UserModel')->logout();
        header('Location: ' . BASEURL . '/login');
    }
}

<?php

class Upload extends Controller
{
    public function index()
    {
        $data['ver'] = $this->model('UploadModel')->getUserValidation();
        foreach ($data['ver'] as $key) {

            if ($key == "1") {
                $data['categories'] = $this->model('UploadModel')->getImageCategories();
                $this->model('UserModel')->cookiesChecker();
                if (isset($_SESSION['login'])) {
                    $data['role'] = 'member';
                    $data['user'] = $this->model('UserModel')->getUserData();
                } else {
                    $data['role'] = 'guest';
                }
                $this->view('templates/header');
                $this->view('templates/navigation2', $data);
                $this->view('upload/index', $data);
                // $this->view('templates/footerBar');
                $this->view('templates/footer');

                if (isset($_POST['submit'])) {
                    if ($this->model('UploadModel')->uploadImg($_POST) > 0) {
                        echo "<script>
                        alert('Success');
                    </script>";
                    } else {
                        echo "<script>
                    alert('Gagal');
                </script>";
                    };
                }
            } else {
                $id = $_SESSION['UID'];
                echo "<script>
                alert('Your Account not verified, please check your email and try to verify');
                document.location.href = '".BASEURL."/member/user/" . $id . "';
            </script>";
            }
        }
    }

    
    public function publish()
    {
        if ($this->model('UploadModel')->uploadImg($_POST) > 0) {
            echo "<script>
                alert('Success');
            </script>";
            header("Location:" . BASEURL . "/home");
        } else {
            echo "<script>
                alert('Gagal');
            </script>";
        };
        /* $file=$_FILES['image-file-upload']['name'];
            $type=pathinfo($file['extension']);
                var_dump($type); */
        // var_dump($_POST);
        // var_dump($_FILES);
        // $fileName = $_FILES['image-file-upload']['name'];
        // // $fileName = rand(222, 888) . time() .$fileName. $_FILES['image-file-upload']['type'];
        // $imageSize = getImageSize($_FILES['image-file-upload']['tmp_name']);
        // $oriWidthImage = $imageSize[0];
        // $oriHeightImage = $imageSize[1];
        // echo "$oriWidthImage <br> $oriHeightImage";
    }
}

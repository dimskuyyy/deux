<?php
class Member extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . '/user/');
    }

    public function user($id, $tab = null)
    {
        $newid = explode('-', $id);
        $newid = reset($newid);
        if (empty($id)) {
            header('Location: ' . BASEURL);
        }
        $this->model('UserModel')->cookiesChecker();
        if (isset($_SESSION['login'])) {
            $data['role'] = 'member';
            $data['user'] = $this->model('UserModel')->getUserData();
        } else {
            $data['role'] = 'guest';
        }
        if (isset($_SESSION['UID'])) {

            if ($newid == $_SESSION['UID']) {
                $data['check'] = 'profil';
            } else {
                $data['check'] = 'follow';
            }
        } else {
            $data['check'] = 'follow';
        }

        // $data['getpost'];
        if ($tab == "liked") {
            $data['getpost'] = $this->model('UserModel')->likeList($newid);
            $data['likedstat'] = 'on';
        } else if ($tab == "post_settings") {
            if (isset($_SESSION['UID'])) {
                if ($newid == $_SESSION['UID']) {
                    $data['getpost'] = $this->model('PostSettings')->getAllData($_SESSION['UID']);
                } else {
                    echo "<script>
                        alert('Dude, This is not your account, get the fuck off');
                        document.location.href = '".BASEURL."/member/user/" . $id . "';
                    </script>";
                }
            } else {
                header('Location:' . BASEURL . '/member/user/' . $id);
            }
        } else {
            $data['getpost'] = $this->model('UserModel')->getPost($newid);
            $data['likedstat'] = 'off';
        }

        // $data['likelist'] = $this->model('UserModel')->likeList($id);
        $data['member'] = $this->model('UserModel')->getMember($id);
        $data['like'] = $this->model('FollowLikeModel')->gotLikeAct();
        if (!empty($data['member'])) {
            $this->view('templates/header');
            $this->view('templates/navigation2', $data);
            if ($tab == 'liked') {
                $this->view('member/headpage', $data);
                $this->view('member/liked', $data);
            } else if ($tab == 'post_settings') {
                $this->view('member/post_settings', $data);
                $this->view('templates/footerBar');
            } else {
                $this->view('member/headpage', $data);
                $this->view('member/user', $data);
            }

            $this->view('templates/footer');
        } else {
            $this->view('templates/header');
            $this->view('templates/navigation2', $data);
            $this->view('templates/footer');
            echo "<script>
                    alert('User doesnt exist');
                </script>";
        }
    }

    public function delete($id)
    {
        $usun = str_replace(' ', '-', $_SESSION['UN']);
        $usid = $_SESSION['UID'] . '-' . $usun;
        if ($this->model('PostSettings')->deletePost($id)) {
            echo "<script>
                alert('Postingan terhapus');
                document.location.href = '".BASEURL."/member/user/" . $usid . "/post_settings';
            </script>";
        } else {
            echo "<script>
                alert('Postingan Gagal Dihapus');
                document.location.href = '".BASEURL."/member/user/" . $usid . "/post_settings';
            </script>";
        }
    }

    public function getDataEdit()
    {
        echo json_encode($this->model('PostSettings')->DataEdit($_POST['id']));
    }

    public function ubahData()
    {
        $usun = str_replace(' ', '-', $_SESSION['UN']);
        $usid = $_SESSION['UID'] . '-' . $usun;
        if ($this->model('PostSettings')->UpdatePost($_POST)) {
            echo "<script>
                alert('Postingan Berhasil Diubah');
                document.location.href = '".BASEURL."/member/user/" . $usid . "/post_settings';
            </script>";
        } else {
            echo "<script>
                alert('Postingan Gagal Diubah');
                document.location.href = '".BASEURL."/member/user/" . $usid . "/post_settings';
            </script>";
        }
    }
}

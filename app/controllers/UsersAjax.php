<?php
class UsersAjax extends Controller
{
    public function like($img_id)
    {
        header("Content-Type: application/json");
        $like = $this->model('FollowLikeModel')->Like($img_id);
        // var_dump($like);die;
        if (!$like) {
            echo json_encode(['error' => true]);
            die;
        }
        echo json_encode(['error' => false]);
        die;
    }
    public function unlike($img_id)
    {
        header("Content-Type: application/json");
        $unlike = $this->model('FollowLikeModel')->unlikeAction($img_id);
        if (!$unlike) {
            echo json_encode(['error' => true]);
            die;
        }
        echo json_encode(['error' => false]);
        die;
    }
}

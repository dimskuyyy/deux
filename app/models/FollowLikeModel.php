<?php

class FollowLikeModel extends Model
{
    public function Like($img_id)
    {
        $this->db->query("SELECT img_id FROM likes WHERE id = :id");
        $userId  =  $_SESSION['UID'];
        $this->db->bind(':id', $userId);
        $likedImg = $this->db->getResultSet();
        if ($likedImg) {
            foreach ($likedImg as $img) {
                if ($img['img_id'] === $img_id) return false;
            }
        }
        $this->db->query("INSERT INTO likes VALUES(:img,:id)");
        $values = [
            'img' => $img_id,
            'id' => $userId
        ];
        $this->db->bindMultiple(':img,:id', $values);
        // var_dump($this->db->getAffectedRow());die;
        if (!$this->db->getAffectedRow() > 0) return false;
        return true;
    }

    public function gotLikeAct()
    {
        if (isset($_SESSION['UID'])) {

            $result = [];
            $query = "SELECT img_id FROM likes WHERE id = :iduser";
            $this->db->query($query);
            $this->db->bind(':iduser', $_SESSION['UID']);
            $liked = $this->db->getResultSet();
            foreach ($liked as $like) {
                array_push($result, $like['img_id']);
            }
            // var_dump($result);
            // die;
            return $result;
        }
    }


    // unlike
    public function unlikeAction($img_id)
    {
        $this->db->query("DELETE FROM likes WHERE id=:user AND img_id = :img");
        $this->db->bind(":user", $_SESSION['UID']);
        $this->db->bind(":img", $img_id);
        if (!$this->db->getAffectedRow() > 0) {
            return false;
        } else {
            return true;
        }
    }
}

<?php
class HomeModel extends Model
{

    public function getImage()
    {
        $query = "SELECT img_upload.*, users.id, users.username, users.user_avatar FROM img_upload INNER JOIN users ON img_upload.id = users.id WHERE img_type='photo' OR img_type='vector' ORDER BY img_upload.img_id DESC";
        $this->db->query($query);

        return $this->db->getResultSet();
    }

    public function Preview($id)
    {
        $query = "SELECT img_upload.*, users.id, users.username, users.user_avatar FROM img_upload INNER JOIN users ON img_upload.id = users.id WHERE img_upload.img_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $dataImg = $this->db->getResult();

        $this->db->query("SELECT img_id as jumlah_like FROM likes WHERE img_id = :id");
        $this->db->bind(':id', $id);
        $jumlahLike = count($this->db->getResultSet());
        $dataImg['jumlah_like'] = $jumlahLike;


        if (!isset($_SESSION['UID'])) {
            $dataImg['like'] = false;
        } else {
            $this->db->query("SELECT img_id FROM likes WHERE id = :user AND img_id = :id");
            $values = [
                'user' => $_SESSION['UID'],
                'id' => $id
            ];
            $this->db->bindMultiple(':user,:id', $values);
            if (!$this->db->getResult()) $dataImg['like'] = false;
            else $dataImg['like'] = true;
        }
        return $dataImg;
    }

    public function searchBy($keyword)
    {
        $outputList = '';
        $query = "SELECT DISTINCT img_category FROM img_upload WHERE img_category LIKE :keyword";
        $query = $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        $outputList = '<ul class="list-unstyled" id="srch_ul">';
        /* if ($this->db->rowCounter($query) > 0) {
                while($row =  $this->db->get($query)){
                    $outputList .= '<li>'.$row['img_category'].'</li>';
                }
            }else{
                $outputList .= '<li> Category not found </li>';
            } */
        $row = $this->db->getResultSet();
        if (!is_null($row)) {
            foreach ($row as $list) {
                // var_dump($list);
                $outputList .= '<li id="srch_li" class="py-4 px-4 w-full cursor-pointer hover:bg-base-blue/5 transition-all">' . $list['img_category'] . '</li>';
            }
        } else if (is_null($row)) {
            $outputList .= '<li> Category not found </li>';
        }
        $outputList .= '</ul>';
        echo $outputList;
        // return $row;
    }
    public function test($keyword){
        $query = "SELECT DISTINCT img_category FROM img_upload WHERE img_category LIKE :keyword";
        $query = $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        $row = $this->db->getResultSet();
        return $row;
    }
    public function Validasi($token)
    {
        $query = "SELECT * FROM users WHERE token = :token";
        $this->db->query($query);
        $this->db->bind(":token", $token);
        return $this->db->getResultSet();
    }

    public function verify($token)
    {
        $this->db->query("UPDATE users SET verified = 1 WHERE token =:token");
        // $this->db->bind(":verify",$verify);
        $this->db->bind(":token", $token);
        return $this->db->getAffectedRow();
    }
}

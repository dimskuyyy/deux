<?php
    class PreviewModel extends Model{
        public function getPreviewData($id){
            $query = "SELECT img_upload.*, users.id, users.username, users.user_avatar FROM img_upload INNER JOIN users ON img_upload.id = users.id WHERE img_upload.img_id = :id";
            $this->db->query($query);
            $this->db->bind(':id',$id);
            return $this->db->getResult();
            // var_dump($row); die;
        }
    }
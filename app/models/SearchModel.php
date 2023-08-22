<?php 
    class SearchModel extends Model{
        public function getData($type, $cat){
            $query= "SELECT img_upload.*, users.id, users.username, users.user_avatar FROM img_upload INNER JOIN users ON img_upload.id = users.id WHERE img_type = :img_type AND img_category LIKE :img_category";
            $this->db->query($query);
            $this->db->bind(":img_type",$type);
            $this->db->bind(":img_category","%$cat%");
            return $this->db->getResultSet();
            
        }
        public function getDataDetail($type){
            $query= "SELECT DISTINCT img_category FROM img_upload WHERE img_type = :img_type ORDER BY img_category";
            $this->db->query($query);
            $this->db->bind(":img_type",$type);
            return $this->db->getResultSet();
        }
    }
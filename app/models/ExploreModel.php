<?php
class ExploreModel extends Model{
public function getList($tipe){
    $data = [];
    $hasil;
    $this->db->query("SELECT * FROM img_upload WHERE img_type = :tipe ORDER BY img_category ASC");
    $this->db->bind(':tipe', $tipe);
    $result = $this->db->getResultSet();
    $count = 0;
    $category = '';

    // Group and count 
    foreach($result as $img) {
        if($category !== $img['img_category']) {
            $category = $img['img_category'];
            $count = 0;  
        }
        $data["{$category}"][$count] = $img;
        $count++;
    }
    
    // Cek jika satu dari category yang sama apakah lebih dari 4? jika iya tampilkan datanya, kalau tidak category dianggap null untuk sementara, sehingga para orang yang buat tag categorynya perlu berfikir untuk suka suka hati mau buat category baru
    foreach($data as $dt){
        if (count($dt) >= 4) {
            for ($i=0; $i < count($dt) ; $i++) { 
                $hasil["{$dt[0]['img_category']}"][$i] = $dt[$i];
            }
        }else{
            $hasil["{$dt[0]['img_category']}"] = null;
        }   
    }
    return $hasil;
}
        public function getCountData(){
            
        }

    }
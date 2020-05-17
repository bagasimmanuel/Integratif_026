<?php


    class Donasi_Model extends Model{

        public function insertDonasi($data){
            // var_dump($data);
            $db = static::getDb();
            $donasiID = $this->getLastDonasiID();
            $donasiID = $donasiID+1;
            $nama = $data['nama'];
            $date = date("Y-m-d H:i");
            foreach ($data['donasi'] as $d) :
                try{
                    $sql = "INSERT INTO donasi VALUES ('',:donasiID,:displayName,:kategori,:kuantitas,:date)";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(":donasiID",$donasiID);
                    $stmt->bindParam(":displayName",$nama);
                    $stmt->bindParam(":kategori",$d['0']);
                    $stmt->bindParam(":kuantitas",$d['2']);
                    $stmt->bindParam(":date",$date);
    
                    $stmt->execute();
                }catch (PDOException $e) {
                    echo "Terjadi kegagalan saat menyimpan data";
                }
            endforeach;
            return 1;
        }

        public function getLastDonasiID(){

            $db = static::getDb();

            $sql = "SELECT donasiID FROM donasi ORDER BY ID DESC LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $donasiID = $stmt->fetchColumn();

            return $donasiID;
        }

        public function getAll(){
            $db = static::getDb();
            $sql = "SELECT * FROM donasi JOIN kategori ON donasi.Kategori = kategori.id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getById($id){
            $db = static::getDb();
            $sql = "SELECT * FROM `donasi` JOIN KATEGORI ON donasi.Kategori = kategori.id WHERE `Kategori` = $id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    }
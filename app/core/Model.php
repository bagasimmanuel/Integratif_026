<?php 

    abstract class Model{

        protected function getDb(){
            static $db = null;
          
                $host = DB_HOST;
                $dbname = DB_NAME;
                $username = DB_USER;
                $password = DB_PASS;

            try{
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $db;
        }

    

    }

?>
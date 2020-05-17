<?php
    class Donasi extends Controller{

        public function index(){
         
            $this->view('template/header');
            $this->view('Donasi/index');
            $this->view('template/footer');
            // session_destroy();
            
        }

        public function displayName(){
            if(isset($_POST)){
                $_SESSION['nama'] = $_POST['nama'];
                $_SESSION['donasi'] = array();
                echo $_SESSION['nama'];
            }
            header('Location: ' . BASEURL . '/donasi');
           
        }


        public function tambahDonasi(){

            if(isset($_POST['kategori'])){
                $donasi = array($_POST['kategori'],$_POST['jenis'],$_POST['kuantitas']);
                array_push($_SESSION['donasi'],$donasi);
                header('Location: ' . BASEURL . '/donasi');
            }else{
                $this->view('template/header');
                $this->view('Donasi/tambahDonasi');
                $this->view('template/footer');
            }

        }

        public function kirimDonasi(){
            // die(var_dump($_SESSION));
            if(isset($_SESSION['donasi'])){
                if($this->model('Donasi_Model')->insertDonasi($_SESSION) > 0){
                    unset($_SESSION['donasi']);
                    Flasher::setFlash('berhasil','didonasikan','success');
                    unset($_SESSION['nama']);
                }
            }
            header('Location: ' . BASEURL . '/donasi/index/success');
            exit();
        }

        public function rekap($id = 0){
            
            if($id == 0){
                $data['rekap'] = $this->model('Donasi_Model')->getAll();
            }else{
                $data['rekap'] = $this->model('Donasi_Model')->getById($id);
            }
            $this->view('template/header',$data);
            $this->view('Donasi/rekap',$data);
            $this->view('template/footer',$data);
        }

    }
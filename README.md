# Final Project Pemrograman Integratif - 026

## Struktur Aplikasi
1. App
 * Config
 * Controllers
    * Donasi
 * Core
    * App
    * Controller
    * Flasher
    * Models
 * Models
    * Donasi_Model
 * Views
    * Donasi
    * Template
2. Public
 * CSS
 * Img
 * Js
 * index.php

## Donasi / Index
```
public function index(){
    $this->view('template/header');
    $this->view('Donasi/index');
    $this->view('template/footer');
}
```
Melakukan Load view untuk home page

Menghasilkan View

![View Index](/imgReadMe/indexNama.PNG)

Dilihat dari Gambar diatas terdapat 2 pilihan yaitu Submit Nama dan Lihat rekap

## 1. Submit

Setelah Memasukkan Nama dan menekkan tombol submit maka, view yang sebelumnya dihidden dan ditunjukkan view baru seperti :

![View Index Setelah Input Nama](/imgReadMe/indexDonasi.PNG)

Dengan pilihan Tambah Donasi dan Kirim donasi

### Tambah Donasi
Disini akan dilakukan redirect ke <b> Donasi/tambah Donasi</b>

```
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

```
Dimana disini User akan mendapatkan view seperti di bawah dan kemudian data tersebut dimasukkan kedalam session dengan index <b>['Donasi']</b>

![View Tambah Donasi](/imgReadMe/tambahDonasi.PNG)

Setelah User berhasil memasukkan Jenis Donasi dan Kuantitas maka akan kembali ke Index seperti :

![View Index Donasi Setelah Update](/imgReadMe/indexDonasiAfter.PNG)

User secara bebas menambahkan Jenis Donasi, kemudian setelah itu dapat menuju ke Kirim donasi dimana akan di redirect ke <b> Donasi/KirimDonasi</b> dimana memiliki source code sebagai :

```
public function kirimDonasi(){
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
```

Disini dipanggil Model untuk memasukkan data kedalam Database lalu dilakukan set Flash Message dan di redirect ke home

![Finish Kirim Donasi](/imgReadMe/finishKirimDonasi.PNG)

## 2. Hasil rekap

  Dengan menekan button rekap maka akan di redirect menuju Donasi/rekap dimana memiliki source code sebagai berikut

  ```
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
  ```

  Disini Function rekap menerima suatu Argument untuk menunjukkan data sesuai dengan Jenis Kategori yang diinginkan, saat user pertama kali melihat rekap, maka diberi default value "0" dan menunjukkan seluruh data yang ada di database, Berikut view dari <b>Donasi/rekap</b>

![View Rekap](/imgReadMe/rekap.PNG)

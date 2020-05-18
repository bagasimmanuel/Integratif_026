# Final Project Pemrograman Integratif
## Bagas Immanuel Lodianto - 05311840000026
### Controller utama yang digunakan adalah <b><i>Donasi</i></b>
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


# Database

Pada Aplikasi ini digunakan 2 Tabel yaitu <b>Donasi</b> dan <b>Kategori</b> ada pula isi tabel sebagai berikut

![Tabel Donasi](/imgReadMe/tabelDonasi.PNG)

![Tabel Kategori](/imgReadMe/tabelKategori.PNG)

Dengan ID pada tabel kategori yang merupakan Foreign Key dari tabel Donasi

## Models

Pada Models terdapat beberapa function yang dapat digunakan untuk mengambil dan memasukkan data dari database antara lain : <i> getAll, getByID, insertDonasi </i>
### inserDonasi()
```
public function insertDonasi($data){
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
```
Proses memasukkan data kedalam database dimana <i> getLastDonasiID </i> Merupakan function untuk mendapatkan donasiID terakhir yang ada di Database. Seperti yang bisa dilihat terdapat <b>foreach</b> Hal ini dikarenakan proses menginputkan ke database dibedakan untuk setiap Kategori

### getAll()

```
public function getAll(){
    $db = static::getDb();
    $sql = "SELECT * FROM donasi JOIN kategori ON donasi.Kategori = kategori.id";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```
Merupakan Function untuk mendapatkan data yang ada di DB untuk ditunjukkan ke View
###getByID()
```
public function getById($id){
    $db = static::getDb();
    $sql = "SELECT * FROM `donasi` JOIN KATEGORI ON donasi.Kategori = kategori.id WHERE `Kategori` = $id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```
Untuk mendapatkan data berdasarkan ID kategori, disini akan ditampilkan view sesuai dengan sort rekap yg diinginkan User

## Flash Message
```
class Flasher{

    public static function setFlash($pesan,$aksi,$tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash(){

        if(isset($_SESSION['flash'])){
            echo
            '<div class = "alert alert-'. $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
                Donasi Anda telah <strong> '.$_SESSION['flash']['pesan'] .' </strong> '.$_SESSION['flash']['aksi'].'
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
        unset($_SESSION['flash']);
    }
}
```
Merupakan Function untuk mengirim flash Message ketika suatu donasi berhasil dikirimkan, function <b>Set Flash</b> Sendiri digunakan untuk melakukan setFlash message dimana function <b> flash </b> digunakan untuk mengecheck apakah ada session dengan index ['flash'] 

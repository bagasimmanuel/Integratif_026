<div class = "container mt-5">

    <div class = "row">
        <div class ="col-lg-6">
        <?php Flasher::flash();?>
        <h3> Halo <?= (isset($_SESSION['nama'])) ?  $_SESSION['nama'] :  "Kamu "  ?> Siap Menyumbang?</h3>
        </div>
        <div class="col-lg-6">
            <a class="btn btn-primary  float-right" href="<?=BASEURL?>/Donasi/rekap" role="button" > Lihat Rekap </a>        
        </div>
    </div>
    
    <div class="row" <?= (isset($_SESSION['nama'])) ? "hidden" : "" ?> >
    <div class ="col-lg-12">
        <form action = "<?=BASEURL?>/Donasi/displayName" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Display Name</label>
                <input type="text" class="form-control" id="nama" name = "nama" aria-describedby="emailHelp" placeholder="Masukkan Display Name">
                <small id="emailHelp" class="form-text text-muted">Kami akan mengingatkmu dengan DisplayName mu!</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    <div class="row" <?= isset($_SESSION['nama']) ? "" : "hidden"?>>
        <div class="col-lg-12">
        <h3>Daftar Donasi</h3>
        <table class="table table-hover" <?= isset($_SESSION['nama']) ? "" : "hidden"?>>
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Donasi</th>
                <th scope="col">Value</th>
                </tr>
            </thead>
            <tbody>
                <?php if(isset($_SESSION['donasi'])) : ?>
                <?php $i = 1; foreach($_SESSION['donasi'] as $data) : ?> 
                <tr>
                <td><?=$i?></td>
                <td><?=$data['1']?></td>
                <td><?=$data['2']?></td>
                </tr>
                <?php $i++;?>
                <?php endforeach;?>
                <?php endif;?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <a class="btn btn-primary" href="<?=BASEURL?>/Donasi/tambahDonasi" role="button"  <?= isset($_SESSION['nama']) ? "" : "hidden"?>>Tambah Donasi</a>
        </div>
        <div class="col-lg-2">
            <a class="btn btn-primary" href="<?=BASEURL?>/Donasi/kirimDonasi" role="button"  <?= isset($_SESSION['donasi']) ? "" : "hidden"?>>Kirim Donasi</a>
        </div>
    </div>
</div>

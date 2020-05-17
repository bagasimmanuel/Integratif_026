<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
        <h3>Rekapan</h3>
        </div>
        <div class="col-lg-5">
            Sort Berdasarkan 
            <a href ="<?=BASEURL?>/donasi/rekap/1" class="badge badge-primary float-right mr-3" >Sembako</a>
            <a href ="<?=BASEURL?>/donasi/rekap/2" class="badge badge-success float-right mr-3" >Obat-Obatan</a>
            <a href ="<?=BASEURL?>/donasi/rekap/3" class="badge badge-warning float-right mr-3" >Uang</a>
            <a href ="<?=BASEURL?>/donasi/rekap/4" class="badge badge-danger float-right mr-3" >Pakaian</a>
        </div>
        <div class="col-lg-1">
        <a class="btn btn-primary" href="<?=BASEURL?>/Donasi" role="button" >Kembali</a>
        </div>
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Donasi</th>
                    <th scope="col">Nama Donatur</th>
                    <th scope="col">Jenis Donasi</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal dan Jam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach ($data['rekap'] as $data ) : ?>
                    <tr>
                    <th scope="row"><?= $i ?> </th>
                    <td><?=$data['donasiID']?></td>
                    <td><?=$data['DisplayName']?></td>
                    <td><?=$data['nama']?></td>
                    <td><?=$data['kuantitas']?></td>
                    <td><?=$data['date']?></td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </div>
    </div>



</div>
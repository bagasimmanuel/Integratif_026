<div class = "container mt-5">

    
<div class = "row">
        <div class ="col-lg-6">
            <h3>Tambah Donasi</h3>
            <form action ="<?=BASEURL?>/donasi/tambahDonasi" method = "POST">

            <input type ="hidden" name="id" id="id">

            <div class="form-group">
                <label>Jenis Donasi</label>
                <select class="form-control" id = "kategori" name = "kategori">
                <option value = "1"> Sembako</option>
                <option value = "2"> Obat-Obatan</option>
                <option value = "3"> Uang</option>
                <option value = "4"> Pakaian</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama">Sumbangan Secara Spesifik</label>
                <input type="text" class="form-control" id="jenis" name="jenis" placeholder = "Beras/Baju/Celana">
            </div>
            <div class="form-group">
                <label for="nama">Jumlah</label>
                <input type="text" class="form-control" id="kuantitas" name="kuantitas" placeholder = "Jumlah dalam Kg/Rp">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
</div>



</div>
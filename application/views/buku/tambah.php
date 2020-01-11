<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Buku
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="idbuku">ID Buku</label>
                            <input type="text" name="idbuku" class="form-control" id="idbuku">
                            <small class="form-text text-danger"><?= form_error('idbuku'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul buku</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="judul">Penulis</label>
                            <input type="text" name="penulis" class="form-control" id="penulis">
                            <small class="form-text text-danger"><?= form_error('penulis'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="penerbit">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit">
                            <small class="form-text text-danger"><?= form_error('penerbit'); ?></small>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>
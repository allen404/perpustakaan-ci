<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Anggota
                </div>
                <div class="card-body">
					<form action="" method="post">
							<div class="form-group">
								<label for="id_buku">ID Buku</label>
								<input type="text" name="id_buku" class="form-control" id="id_buku" value="<?= $buku['id_buku']; ?>">
								<small class="form-text text-danger"><?=form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="genre_buku">Genre Buku</label>
								<input type="text" name="genre_buku" class="form-control" id="genre_buku" value="<?= $buku['genre_buku']; ?>">
								<small class="form-text text-danger"><?=form_error('genre_buku');?></small>
							</div>
							<div class="form-group">
								<label for="judul_buku">Judul Buku</label>
								<input type="text" name="judul_buku" class="form-control" id="judul_buku" value="<?= $buku['judul_buku']; ?>">
								<small class="form-text text-danger"><?=form_error('judul_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_penerbit">ID Penerbit</label>
								<input type="text" name="id_penerbit" class="form-control" id="id_penerbit" value="<?= $buku['id_penerbit']; ?>">
								<small class="form-text text-danger"><?=form_error('id_penerbit');?></small>
							</div>
							<div class="form-group">
								<label for="id_penulis">ID Penulis</label>
								<input type="text" name="id_penulis" class="form-control" id="id_penulis" value="<?= $buku['id_penulis']; ?>">
								<small class="form-text text-danger"><?=form_error('id_penulis');?></small>
							</div>
							<div class="form-group">
								<label for="tahun_buku">Tahun Buku</label>
								<input type="number" name="tahun_buku" class="form-control" id="tahun_buku" value="<?= $buku['tahun_buku']; ?>">
								<small class="form-text text-danger"><?=form_error('tahun_buku');?></small>
							</div>
							<div class="form-group">
								<label for="jumlah_buku">Jumlah Buku</label>
								<input type="number" name="jumlah_buku" class="form-control" id="jumlah_buku" value="<?= $buku['jumlah_buku']; ?>">
								<small class="form-text text-danger"><?=form_error('jumlah_buku');?></small>
							</div>
							<button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
						</form>
				</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
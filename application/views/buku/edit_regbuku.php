<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"> Form Tambah Data Rak Buku</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="no_reg">Nomor Registrasi</label>
						<input type="text" name="no_reg" class="form-control" id="no_reg" value="<?= $reg_buku['no_reg'];?>">
						<small class="form-text text-danger"><?=form_error('no_reg');?></small>
					</div>
					<div class="form-group">
						<label for="id_buku">ID Buku</label>
						<input type="text" name="id_buku" class="form-control" id="id_buku"  value="<?= $reg_buku['id_buku'];?>">
						<small class="form-text text-danger"><?=form_error('id_buku');?></small>
					</div>
					<div class="form-group">
						<label for="kode_rak">Kode Rak</label>
						<input type="text" name="kode_rak" class="form-control" id="kode_rak" value="<?= $reg_buku['kode_rak'];?>">
						<small class="form-text text-danger"><?=form_error('kode_rak');?></small>
					</div>
					<div class="form-group">
						<label for="tgl_registrasi">Tanggal Registrasi</label>
						<input type="date" name="tgl_registrasi" class="form-control" id="tgl_registrasi" value="<?= $reg_buku['tgl_registrasi'];?>">
						<small class="form-text text-danger"><?=form_error('tgl_registrasi');?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"> Form Tambah Data Penerbit</div>
			<div class="card-body">
				<form action="<?= base_url();?>admin/input_simpanPenerbit" method="post">
					<div class="form-group">
						<label for="id_penerbit">ID Penerbit</label>
						<input type="text" name="id_penerbit" class="form-control" id="id_penerbit">
						<small class="form-text text-danger"><?=form_error('id_penerbit');?></small>
					</div>
					<div class="form-group">
						<label for="nama_penerbit">Nama Penerbit</label>
						<input type="text" name="nama_penerbit" class="form-control" id="nama_penerbit">
						<small class="form-text text-danger"><?=form_error('nama_penerbit');?></small>
					</div>
					<div class="form-group">
						<label for="alamat_penerbit">Alamat Penerbit</label>
						<input type="text" name="alamat_penerbit" class="form-control" id="alamat_penerbit">
						<small class="form-text text-danger"><?=form_error('alamat_penerbit');?></small>
					</div>
					<div class="form-group">
						<label for="no_telepon">Nomor Telepon</label>
						<input type="text" name="no_telp" class="form-control" id="no_telp">
						<small class="form-text text-danger"><?=form_error('no_telp');?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
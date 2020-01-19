<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"> Form Tambah Data Penulis</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="id_penulis">ID Penulis</label>
						<input type="text" name="id_penulis" class="form-control" id="id_penulis">
						<small class="form-text text-danger"><?=form_error('id_penulis');?></small>
					</div>
					<div class="form-group">
						<label for="nama_penulis">Nama Penulis</label>
						<input type="text" name="nama_penulis" class="form-control" id="nama_penulis">
						<small class="form-text text-danger"><?=form_error('nama_penulis');?></small>
					</div>
					<div class="form-group">
						<label for="alamat_penulis">Alamat Penulis</label>
						<input type="text" name="alamat_penulis" class="form-control" id="alamat_penulis">
						<small class="form-text text-danger"><?=form_error('alamat_penulis');?></small>
					</div>
					<div class="form-group">
						<label for="no_telp">Nomor Telepon</label>
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

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
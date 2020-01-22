<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header"> Form Tambah Data Rak Buku</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="form-group">
						<label for="kode_rak">Kode Rak</label>
						<input type="text" name="kode_rak" class="form-control" id="kode_rak">
						<small class="form-text text-danger"><?=form_error('kode_rak');?></small>
					</div>
					<div class="form-group">
						<label for="lokasi">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" id="lokasi">
						<small class="form-text text-danger"><?=form_error('lokasi');?></small>
					</div>
					<button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
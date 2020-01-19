<div id="ModalFormInputBuku" class="modal fade">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Input Data Buku</h1>
			</div>
			<div class="modal-body">
					<form role="form" action="<?= base_url();?>c_buku/edit_simpan" method="post">
						<input type="hidden" name="id_buku" value="<?= $product['id_buku'];?>">
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="genre_buku">Genre Buku</label> 
								<input type="text" name="genre_buku" class="form-control" id="genre_buku" placeholder="<?= $product['genre_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="judul_buku">Judul Buku</label> 
								<input type="text" name="judul_buku" class="form-control" id="judul_buku" placeholder="<?= $product['judul_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="id_penerbit">ID Penerbit</label> 
								<input type="text" name="id_penerbit" class="form-control" id="id_penerbit" placeholder="<?= $product['id_penerbit']; ?>">
							</div>
							<div class="form-group">
								<label for="id_penulis">ID Penulis</label> 
								<input type="text" name="id_penulis" class="form-control" id="id_penulis" placeholder="<?= $product['id_penulis']; ?>">
							</div>
							<div class="form-group">
								<label for="tahun_buku">Tahun Buku</label> 
								<input type="number" name="tahun_buku" class="form-control" id="tahun_buku" placeholder="<?= $product['tahun_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="jumlah_buku">Jumlah Buku</label> 
								<input type="number" name="jumlah_buku" class="form-control" id="jumlah_buku" placeholder="<?= $product['jumlah_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="foto">Photo</label> 
								<input type="file" name="foto" class="form-control" id="foto">
							</div>
								<div>
								<button type="sumbit" value="upload"> SIMPAN DATA </button>  
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_buku">ID Penerbit</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" placeholder="<?= $product['id_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="id_buku">ID Penulis</label> 
								<input type="text" name="id_penulis" class="form-control" id="id_penulis" placeholder="<?= $product['id_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="tahun_buku">Tahun Buku</label> 
								<input type="number" name="tahun_buku" class="form-control" id="tahun_buku" placeholder="<?= $product['tahun_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('id_buku');?></small>
							</div>
							<div class="form-group">
								<label for="jumlah_buku">Jumlah Buku</label> 
								<input type="number" name="jumlah_buku" class="form-control" id="jumlah_buku" placeholder="<?= $product['jumlah_buku']; ?>">
								<small class="form-text text-danger"><?= form_error('jumlah_buku');?></small>
							</div>
							<div class="form-group">
								<label for="foto">Photo</label> 
								<input type="file" name="foto" class="form-control" id="foto">
								<small class="form-text text-danger"><?= form_error('foto');?></small>
							</div>
								<?php echo form_input('id_buku', $product['id_buku'], array('placeholder'=>'Enter ID Buku')); ?>
								<label> <b> Genre Buku </b> </label>
								<?php echo form_input('genre_buku', $product['genre_buku'], array('placeholder'=>'Enter Genre Buku')); ?> 
								<label> <b> Judul </b> </label> 
								<?php echo form_input('Judul_buku', $product['judul_buku'], array('placeholder'=>'Enter Judul Buku')); ?>
								<label> <b> ID Penerbit </b> </label> 
								<?php echo form_input('id_penerbit', $product['id_penerbit'], array('placeholder'=>'Enter ID Penerbit')); ?>
								<label> <b> ID Penulis </b> </label> 
								<?php echo form_input('id_penulis', $product['id_penulis'], array('placeholder'=>'Enter ID Penulis')); ?>
								<label> <b> Tahun Buku </b> </label> 
								<?php echo form_input('tahun_buku', $product['tahun_buku'], array('placeholder'=>'Enter Tahun Buku')); ?>
								<label> <b> Jumlah Buku </b> </label> 
								<?php echo form_input('jumlah_buku', $product['jumlah_buku'], array('placeholder'=>'Enter Jumlah Buku')); ?>
								<div class="form-group">
									<label for="name">Photo</label>
									<input type="file" name="foto" />
								</div>
								<button type="sumbit" value="upload"> SIMPAN DATA </button>  
							</div>
							<div class="container">
										<?php echo anchor('c_buku','<button type="button" class="kembali"> Kembali </button>'); ?>
							</div>
									<?php echo form_close(); ?>
						</form>
    


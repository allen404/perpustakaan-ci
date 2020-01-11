
	<title> Input Data Peminjaman Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">

	<?php echo form_open('c_pinjam/input_simpan'); ?>
	<form action="c_pinjam/input_simpan" method="post">
		<h2> INPUT DATA PEMINJAMAN BUKU </h2>
		<div class="container">
			<?php echo form_open('c_pinjam/input_simpan'); ?>
			
			<label> <b> No Identitas </b> </label>
			<input type="text" id="no_identitas" placeholder="Enter No Identitas" onkeyup="ajaxSearch()" name="no_identitas" class="form-control" required> 

			<label> <b> ID Buku </b> </label>
			<input type="text" id="id_buku" placeholder="Enter ID Buku" onkeyup="ajaxSearch2()" name="id_buku" class="form-control" required> 

			<label> <b> Tanggal Pinjam </b> </label>
			<input type="date" placeholder="Enter Tanggal Pinjam" name="tgl_pinjam" required> 
			
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
                    <?php echo anchor('c_pinjam','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
	</form>
    <?php echo form_close(); ?>


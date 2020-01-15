<html>
<head>
	<title> Input Data Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_reg/input_simpan'); ?>
	<form action="c_reg/input_simpan/" method="post">
		<h2> INPUT DATA  BUKU </h2>
		<div class="container">
            <?php echo form_open('c_reg/input_simpan/'); ?>
            <label> <b> No Reg  </b> </label> 
			<input type="text" placeholder="Enter No Registrasi" name="no_reg" required> 
			<label> <b> ID Buku </b> </label>
			<input type="text" placeholder="Enter ID Buku" name="id_buku" required> 
			<label> <b> Kode Rak </b> </label>
			<input type="text" placeholder="Enter Kode Rak" name="kode_rak" required>
			<label> <b> Tgl Registrasi </b> </label>
			<input type="date" placeholder="Enter Tanggal Registrasi" name="tgl_registrasi" required>     
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
            <?php echo anchor('c_reg','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
	</form>
    <?php echo form_close(); ?>
</body>
</html>
<html>
<head>
	<title> Input Data Rak Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_rakbuku/input_simpan'); ?>
	<form action="c_rakbuku/input_simpan" method="post">
		<h2> INPUT DATA RAK BUKU </h2>
		<div class="container">
            <?php echo form_open('c_rakbuku/input_simpan'); ?>
            <label> <b> Kode Rak  </b> </label> 
			<input type="text" placeholder="Enter Kode Rak" name="kode_rak" required> 
			<label> <b> Lokasi </b> </label>
			<input type="text" placeholder="Enter Lokasi Rak" name="lokasi" required> 
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
            <?php echo anchor('c_rakbuku','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
	</form>
    <?php echo form_close(); ?>
</body>
</html>
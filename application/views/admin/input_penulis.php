<html>
<head>
	<title> Input Data Penulis </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_penulis/input_simpan'); ?>
	<form action="c_penulis/input_simpan" method="post">
		<h2> INPUT DATA PENULIS </h2>
		<div class="container">
            <?php echo form_open('c_penulis/input_simpan'); ?>
            <label> <b> Id Penulis  </b> </label> 
			<input type="text" placeholder="Enter Id Penulis" name="id_penulis" required> 
			<label> <b> Nama Penulis </b> </label>
			<input type="text" placeholder="Enter Nama Penulis" name="nama_penulis" required> 
            <label> <b> Alamat Penulis </b> </label>
			<input type="text" placeholder="Enter Alamat Penulis" name="alamat_penulis" required> 
            <label> <b> No Telepon</b> </label>
			<input type="text" placeholder="Enter No Telepon Penulis" name="no_telp" required> 
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
            <?php echo anchor('c_penulis','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
	</form>
    <?php echo form_close(); ?>
</body>
</html>
<html>
<head>
	<title> Input Data Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_buku/input_simpan'); ?>
	<form action="c_buku/input_simpan/" method="post">
		<h2> INPUT DATA  BUKU </h2>
		<div class="container">
            <?php echo form_open('c_buku/input_simpan/'); ?>
            <label> <b> ID Buku  </b> </label> 
			<input type="text" placeholder="Enter ID Buku" name="id_buku" required> 
			<label> <b> Genre Buku </b> </label>
			<input type="text" placeholder="Enter Genre Buku" name="genre_buku" required> 
			<label> <b> Judul Buku </b> </label>
			<input type="text" placeholder="Enter Judul Buku" name="judul_buku" required>
			<label> <b> ID Penerbit </b> </label>
			<input type="text" placeholder="Enter ID Penerbit" name="id_penerbit" required>
			<label> <b> ID Penulis </b> </label>
			<input type="text" placeholder="Enter ID Penulis" name="id_penulis" required>
			<label> <b> Tahun Buku </b> </label>
			<input type="text" placeholder="Enter Tahun Buku" name="tahun_buku" required>
			<label> <b> Jumlah Buku </b> </label>
			<input type="text" placeholder="Enter Jumlah buku" name="jumlah_buku" required>  
			<div class="form-group">
				<label for="name">Photo</label>
				<input type="file" name="foto" />
			</div>
			
			<button type="sumbit" value="upload"> SIMPAN DATA </button>  
		</div>
		<div class="container">
            <?php echo anchor('c_buku','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
	</form>
    <?php echo form_close(); ?>
</body>
</html>
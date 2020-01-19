<html>
<head>
	<title> Edit Data Penulis </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_penulis/edit_simpan'); ?>
        <?php echo form_hidden('id',$this->uri->segment(3)); ?>
	<form action="c_penulis/edit_simpan" method="get">
		<h2> INPUT DATA PENULIS </h2>
                <?php echo form_open('c_penulis/edit_simpan'); ?>
                <?php echo form_hidden('id',$this->uri->segment(3)); ?>
		<div class="container">
            <label> <b> Id Penulis </b> </label> 
			<?php echo form_input('id_penulis', $product['id_penulis'], array('placeholder'=>'Enter Id Penulis')); ?>
            <label> <b> Nama Penerbit </b> </label> 
			<?php echo form_input('nama_penulis', $product['nama_penulis'], array('placeholder'=>'Enter Nama Penulis')); ?>
            <label> <b> Alamat </b> </label>
			<?php echo form_input('alamat_penulis', $product['alamat_penulis'], array('placeholder'=>'Enter Alamat Penulis')); ?> 
            <label> <b> No Telepon </b> </label>
			<?php echo form_input('no_telp', $product['no_telp'], array('placeholder'=>'Enter No Telepon Penulis')); ?> 
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
                    <?php echo anchor('c_penerbit','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
                <?php echo form_close(); ?>
	</form>
    
</body>
</html>
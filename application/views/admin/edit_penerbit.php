<html>
<head>
	<title> Edit Data Penerbit </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_penerbit/edit_simpan'); ?>
        <?php echo form_hidden('id',$this->uri->segment(3)); ?>
	<form action="c_penerbit/edit_simpan" method="get">
		<h2> INPUT DATA PENERBIT </h2>
                <?php echo form_open('c_penerbit/edit_simpan'); ?>
                <?php echo form_hidden('id',$this->uri->segment(3)); ?>
		<div class="container">
            <label> <b> Id Penerbit </b> </label> 
			<?php echo form_input('id_penerbit', $product['id_penerbit'], array('placeholder'=>'Enter Id Penerbit')); ?>
            <label> <b> Nama Penerbit </b> </label> 
			<?php echo form_input('nama_penerbit', $product['nama_penerbit'], array('placeholder'=>'Enter Nama Penerbit')); ?>
            <label> <b> Alamat </b> </label>
			<?php echo form_input('alamat_penerbit', $product['alamat_penerbit'], array('placeholder'=>'Enter Alamat Penerbit')); ?> 
            <label> <b> No Telepon </b> </label>
			<?php echo form_input('no_telp', $product['no_telp'], array('placeholder'=>'Enter No Telepon Penerbit')); ?> 
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
                    <?php echo anchor('c_penerbit','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
                <?php echo form_close(); ?>
	</form>
    
</body>
</html>
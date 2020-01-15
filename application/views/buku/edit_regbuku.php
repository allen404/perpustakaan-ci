<html>
<head>
	<title> Edit Registrasi Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_reg/edit_simpan'); ?>
        <?php echo form_hidden('id',$this->uri->segment(3)); ?>
	<form action="c_buku/edit_simpan" method="get">
		<h2> INPUT REGISTRASI BUKU </h2>
                <?php echo form_open('c_reg/edit_simpan'); ?>
                <?php echo form_hidden('id',$this->uri->segment(3)); ?>
		<div class="container">
            <label> <b> No Registrasi </b> </label> 
			<?php echo form_input('no_reg', $product['no_reg'], array('placeholder'=>'Enter No Registrasi')); ?>
            <label> <b> ID Buku </b> </label>
			<?php echo form_input('id_buku', $product['id_buku'], array('placeholder'=>'Enter ID Buku')); ?> 
			 <label> <b> Kode Rak </b> </label> 
			<?php echo form_input('kode_rak', $product['kode_rak'], array('placeholder'=>'Enter Kode Rak')); ?>
			 <label> <b> Tanggal Registrasi </b> </label> 
			<input type="date" <?php echo form_input('tgl_registrasi', $product['tgl_registrasi'], array('placeholder'=>'Enter Tgl Registrasi ')); ?> required>
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
                    <?php echo anchor('c_reg','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
                <?php echo form_close(); ?>
	</form>
    
</body>
</html>

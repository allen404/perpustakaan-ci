<html>
<head>
	<title> Edit Data Rak Buku </title>
	<link href="<?php echo base_url().'assets/css/stylelogin.css'?>" rel="stylesheet">
</head>
<body>
	<?php echo form_open('c_rakbuku/edit_simpan'); ?>
        <?php echo form_hidden('id',$this->uri->segment(3)); ?>
	<form action="c_rakbuku/edit_simpan" method="get">
		<h2> INPUT DATA RAK BUKU </h2>
                <?php echo form_open('c_rakbuku/edit_simpan'); ?>
                <?php echo form_hidden('id',$this->uri->segment(3)); ?>
		<div class="container">
            <label> <b> Kode Rak </b> </label> 
			<?php echo form_input('kode_rak', $product2['kode_rak'], array('placeholder'=>'Enter Kode Rak')); ?>
            <label> <b> Lokasi </b> </label>
			<?php echo form_input('lokasi', $product2['lokasi'], array('placeholder'=>'Enter Lokasi Rak')); ?> 
			<button type="sumbit"> SIMPAN DATA </button>  
		</div>
		<div class="container">
                    <?php echo anchor('c_rakbuku','<button type="button" class="kembali"> Kembali </button>'); ?>
		</div>
                <?php echo form_close(); ?>
	</form>
    
</body>
</html>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  

  <script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">CI-Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        

          <?php if($this->session->userdata('level') === '1'):?>
            <div class="navbar-nav">
          <li class= "active"> <a class="nav-item nav-link" href="<?= base_url(); ?>home">Home
            <span class="sr-only">(current)</span></a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>admin">Daftar Anggota</a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>buku">Daftar Buku</a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>c_pinjam">Daftar Peminjaman</a></li>
          <div class="navbar-nav navbar-right">
          <li><a class="nav-item nav-link" href="<?php echo site_url('user/logout');?>">Sign Out</a></li>
        </div>
       
          <?php elseif($this->session->userdata('level') === '2'):?>
            <div class="navbar-nav">
            <li class= "active"> <a class="nav-item nav-link" href="<?= base_url(); ?>home/user">Home
            <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-item nav-link" href="<?= base_url(); ?>buku">List Buku</a></li>
            <div class="navbar-nav navbar-right">
              <li><a class="nav-item nav-link" href="<?php echo site_url('user/logout');?>">Sign Out</a></li>
            </div>
        </div>
          
          <?php else:?>
            <div class="navbar-nav">
            <li class= "active"> <a class="nav-item nav-link" href="<?php echo site_url('login'); ?>">Login
            <span class="sr-only">(current)</span></a></li>
            </div>
            <?php endif;?>
          
        </div>
      </div>
    </div>
  </nav>

  
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

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CI-Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="collapsingNavbar">

          <?php if($this->session->userdata('level') === '1'):?>
        <ul class="navbar-nav">
          <li class= "active"> <a class="nav-item nav-link" href="<?= base_url(); ?>admin">Home
            <span class="sr-only">(current)</span></a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>admin/list_anggota">Daftar Anggota</a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>buku">Daftar Buku</a></li>
          <li><a class="nav-item nav-link" href="<?= base_url(); ?>c_pinjam">Daftar Peminjaman</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li><a class="nav-item nav-link" href="<?php echo site_url('user/logout');?>">Sign Out</a></li>
        </div>
          </ul>
       
          <?php elseif($this->session->userdata('level') === '2'):?>
            <ul class="navbar-nav">
            <li class= "active"> <a class="nav-item nav-link" href="<?= base_url(); ?>home/user">Home
            <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-item nav-link" href="<?= base_url(); ?>buku">List Buku</a></li>
            <li><a class="nav-item nav-link" href="<?= base_url();?>c_pinjam/index_user">Daftar Peminjaman</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['nama']?> (<?= $_SESSION['no_identitas'] ?>)
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('user/logout');?>">Logout</a>
            </div>
              </li>
            </ul>

            <?php elseif($this->session->userdata('level') === '3'):?>
              <ul class="navbar-nav">
            <li class= "active"> <a class="nav-item nav-link" href="<?= base_url(); ?>home/user">Home
            <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-item nav-link" href="<?= base_url(); ?>buku">List Buku</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guest
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?php echo site_url('user/logout');?>">Logout</a>
            </div>
              </li>
            </ul>
       
          
          <?php else:?>
            <ul class="navbar-nav">
            <li class= "active"> <a class="nav-item nav-link" href="<?php echo site_url('login'); ?>">Login
            <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-item nav-link" href="<?= base_url();?>user/auth_guest">Login Sebagai Tamu</a>
            </ul>
            
            <?php endif;?>
  
      </div>
    </div>
  </nav>

  
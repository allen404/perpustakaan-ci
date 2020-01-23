<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css">
  <script src="<?= base_url();?>assets/js/main.js"></script>
  <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Perpustakaan Ambyar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="collapsingNavbar">

          <?php if($this->session->userdata('level') === '1'):?>
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>admin">Home
          <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>admin/list_anggota">Daftar Anggota</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>c_pinjam">Daftar Peminjaman</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrasi Buku
          </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url();?>c_buku">Daftar Buku</a>
                <a class="dropdown-item" href="<?= base_url();?>admin/penerbit">Daftar Penerbit</a>
                <a class="dropdown-item" href="<?= base_url();?>admin/rakBuku">Daftar Rak Buku</a>
                <a class="dropdown-item" href="<?= base_url();?>admin/regBuku">Daftar Registrasi Buku</a>
                <a class="dropdown-item" href="<?= base_url();?>admin/penulis">Daftar Penulis</a>
            </div>
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

          <?php elseif($this->session->userdata('level') === '2'):?>
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>home">Home
              <li class="nav-item"><a class="nav-link" href="<?= base_url(); ?>c_buku">List Buku</a></li>
              <li class="nav-item"><a class="nav-link" href="<?= base_url();?>c_pinjam/index_user">Daftar Peminjaman</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['nama']?> (<?= $_SESSION['no_identitas'] ?>)
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url();?>Editprofil">Edit Profile</a>
                <a class="dropdown-item" href="<?php echo site_url('user/logout');?>">Logout</a>
            </div>
              </li>
            </ul>

            <?php elseif($this->session->userdata('level') === '3'):?>
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="<?= base_url();?>home">Home
                <li class="nav-item"><a class="nav-link" href="<?= base_url();?>c_buku">List Buku</a></li>
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
            <li class= "nav-item "> <a class="nav-link active" href="<?php echo site_url('login'); ?>">Login
            <span class="sr-only">(current)</span></a></li>
            <li><a class="nav-item nav-link" href="<?= base_url();?>user/auth_guest">Login Sebagai Tamu</a>
            </ul>

            <?php endif;?>

      </div>
    </div>
  </nav>


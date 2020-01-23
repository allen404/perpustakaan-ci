  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">



<div class="jumbotron">
    <h1 class="display-4">Selamat Datang,  <?= $_SESSION['nama'] ?>!</h1>
  <p class="lead">Selamat datang di menu admin, silahkan pilih menu diatas</p>

  <div class="card-deck">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->Buku_model->get_data('buku')->num_rows(); ?></h5>
          <p class="card-text">Jumlah buku yang terdaftar</p>
        </div>
        <div class="card-header"><a style="color: white" href="<?= base_url();?>c_buku">View Details&nbsp;<i class="fas fa-arrow-right"></i></a></div>
      </div>
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->Admin_model->get_data('user')->num_rows();?></h5>
            <p class="card-text">Jumlah anggota yang terdaftar</p>
        </div>
        <div class="card-header"><a style="color: white" href="<?= base_url();?>admin/list_anggota">View Details&nbsp;<i class="fas fa-arrow-right"></i></a></div>
      </div>
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->model_perpus->getPeminjaman(array('status'=> 'kembali'),'peminjaman')->num_rows();?></h5>
            <p class="card-text">Jumlah peminjaman yang sudah kembali</P>
        </div>
      <div class="card-header">
        <a style="color: white" href="<?= base_url();?>c_pinjam">View Details&nbsp;<i class="fas fa-arrow-right"></i></a></div>
      </div>
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"<?php echo $this->model_perpus->getPeminjaman(array('status' => 'perpanjang'),'peminjaman')->num_rows();?>></h5>
            <p class="card-text">Jumlah peminjaman yang belum kembali</p>
        </div>
      <div class="card-header">
          <a style="color:white" href="<?= base_url();?>c_pinjam">View Details&nbsp;<i class="fas fa-arrow-right"></i></a></div>
      </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

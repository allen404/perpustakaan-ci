<div class="jumbotron">
    <h1 class="display-4">Selamat Datang,  <?= $_SESSION['nama'] ?>!</h1>
  <p class="lead">Selamat datang di menu admin, silahkan pilih menu diatas</p>

  <div class="card-deck">
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->Buku_model->get_data('buku')->num_rows(); ?></h5>
          <p class="card-text">Jumlah buku yang terdaftar</p>
        </div>
        <div class="card-header">View Details</div>
      </div>
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->Admin_model->get_data('user')->num_rows();?></h5>
            <p class="card-text">Jumlah anggota yang terdaftar</p>
        </div>
        <div class="card-header">View Details</div>
      </div>
      <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $this->model_perpus->getPeminjaman(array('status'=> 'kembali'),'peminjaman')->num_rows();?></h5>
            <p class="card-text">Jumlah peminjaman yang sudah kembali</P>
        </div>
      <div class="card-header">View Details</div>
      </div>
      <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <h5 class="card-title"<?php echo $this->model_perpus->getPeminjaman(array('status' => 'belum'),'peminjaman')->num_rows();?>></h5>
            <p class="card-text">Jumlah peminjaman yang belum kembali</p>
        </div>
      <div class="card-header">View Details</div>
      </div>
</div>


<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

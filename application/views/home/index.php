<div class="jumbotron">
  <?php if($this->session->userdata('level') === '1'):?>
    <h1 class="display-4">Selamat Datang,  <?= $_SESSION['nama'] ?>!</h1>
  <p class="lead">Selamat datang di menu admin, silahkan pilih menu diatas</p>
  <?php elseif($this->session->userdata('level') === '2'):?>
    <h1 class="display-4">Selamat Datang,  <?= $_SESSION['nama'] ?>!</h1>
    <p class="lead">Selamat datang di menu perpustakaan, silahkan pilih menu diatas</p>
  <hr class="my-4">
  <?php else:?>
    <h1 class="display-4">Selamat Datang !</h1>
    <p class="lead">Selamat datang di perpustakaan, silahkan pilih login atau masuk sebagai tamu</p>
  <?php endif;?>
  <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
  </p>
</div>

<?php if($this->session->userdata('level') === '2'):?>
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-3">
            <i class="glyphicon glyphiconfolder-open"></i>
          </div>
          <div class="col-xs-9 text-right">
            <div class="huge">
              <font size="18"<b><?php echo $this->Buku_model->get_data('buku')->num_rows(); ?></b></font>
            </div>
            <div><b>Jumlah Buku Yang Terdaftar</b></div>
          </div>
        </div>
      </div>
      <a href="<? base_url();?>buku">
        <div class="panel-footer">
          <span class="pull-left">View Details</span>
          <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
  </div>
</div>

<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphiconuser"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<font size="18"><b><?php echo $this->Admin_model->get_data('user')->num_rows(); ?></b></font>
						</div>
						<div><b>Jumlah Anggota yang Terdaftar</b></div>
					</div>
				</div>
			</div>
			<a href="<?php base_url();?>admin">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
  </div>
  <?php endif?>



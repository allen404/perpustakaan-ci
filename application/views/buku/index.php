<div class="container">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php if ($this->session->flashdata('msg')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('msg'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php if($this->session->userdata('level') === '1'):?>
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>buku/tambah" class="btn btn-primary">Tambah
                Data Buku</a>
        </div>
    </div>

    <?php endif?>


    <div class="row">
        <div class="col-md-10">
        <h3 class="mt-3"> Daftar Buku </h3>
        </div>

        <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>

                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Genre</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Buku</th>
                    <?php if($this->session->userdata('level') === '1'):?>
                    <th>Aksi</th>
                    <?php endif?>
                </tr>
            </thead>
            <tbody>
                <?php $i= 1;
                foreach($buku as $buku) : ?>
                <tr>
                    <th><?= ++$start; ?></th>
                    <td><?= $buku['id_buku'];?></td>
                    <td><?= $buku['genre_buku'];?></td>
                    <td><?= $buku['judul_buku'];?></td>
                    <td><?= $buku['id_penerbit'];?></td>
                    <td><?= $buku['id_penulis'];?></td>
                    <td><?= $buku['tahun_buku'];?></td>
                    <td><?= $buku['jumlah_buku'];?></td>
                    <?php if($this->session->userdata('level') === '1'):?>
                    <td>
                        <a href="<?= base_url(); ?>buku/detail/<?= $buku['id_buku']; ?>" class="badge badge-success">detail</a>
                        <a href="<?= base_url(); ?>buku/ubah/<?= $buku['id_buku']; ?>" class="badge badge-warning">edit</a>
                        <a href="<?= base_url(); ?>buku/hapus/<?= $buku['id_buku']; ?>" class="badge badge-danger">hapus</a>
                </td>
                <?php endif?>
                </tr>
                <?php endforeach; ?>
                </table>
                <?= $this->pagination->create_links(); ?>
                </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table').DataTable();
  } );
</script>
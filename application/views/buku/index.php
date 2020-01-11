<div class="container">
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>
    <?php if($this->session->userdata('level') === '1'):?>
    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>buku/tambah" class="btn btn-primary">Tambah
                Data Buku</a>
        </div>
    </div>

    <?php endif?>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data buku.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10"></div>

        <h3 class="mt-3"> Daftar Buku </h3>

        <table class="table">
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
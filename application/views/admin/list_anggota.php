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

    <div class="row mt-3">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>admin/tambah_anggota" class="btn btn-primary">Tambah
                Data Mahasiswa</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10"></div>

        <h3 class="mt-3"> Daftar Mahasiswa </h3>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID User</th>
                    <th>Nomor Identitas</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i= 1;
                foreach( $user as $user) : ?>
                <tr>
                    <th><?= ++$start; ?></th>
                    <td><?= $user['id_user'];?></td>
                    <td><?= $user['no_identitas'];?></td>
                    <td><?= $user['nama'];?></td>
                    <td><?= $user['alamat'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?= $user['level'];?></td>
                    <td>
                        <a href="<?= base_url(); ?>admin/detail/<?= $user['id_user']; ?>" class="badge badge-success">detail</a>
                        <a href="<?= base_url(); ?>admin/ubah/<?= $user['id_user']; ?>" class="badge badge-warning">edit</a>
                        <a href="<?= base_url(); ?>admin/hapus/<?= $user['id_user']; ?>" class="badge badge-danger">hapus</a>
                </td>
                </tr>
                <?php endforeach; ?>


                </table>
                <?= $this->pagination->create_links(); ?>
                </div>
    </div>
</div>
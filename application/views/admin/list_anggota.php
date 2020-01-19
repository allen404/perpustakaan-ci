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
            <a class="btn btn-primary" data-toggle="modal" data-target="#ModalFormInputAnggota">Tambah
                Data Mahasiswa</a>
        </div>
    </div>



    <div class="row">
        <div class="col-md-10"></div>
        <h3 class="mt-3"> Daftar Mahasiswa </h3>

        <table id="table" class="table table-striped table-bordered" style="width:100%">
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
                    <td><?= $user['id_user']?></td>
                    <td><?= $user['no_identitas']?></td>
                    <td><?= $user['nama']?></td>
                    <td><?= $user['alamat']?></td>
                    <td><?= $user['email']?></td>
                    <td><?= $user['level']?></td>
                    <td>
                        <a href="<?= base_url(); ?>admin/detail/<?= $user['id_user'] ?>" class="badge badge-success">detail</a>
                        <a href="<?= base_url(); ?>admin/ubah/<?= $user['id_user'] ?>" class="badge badge-warning" data-toggle="modal" data-target="#ModalFormEditAnggota">edit</a>
                        <a href="<?= base_url(); ?>admin/hapus/<?= $user['id_user'] ?>" class="badge badge-danger">hapus</a>
                </td>
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


<div id = "ModalFormEditAnggota" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Edit Data Anggota</h1>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('admin/ubah');?>" method="post">
                    <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"  value="<?= $user['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                            <input type="text" name="no_identitas" class="form-control" id="no_identitas" value="<?= $user['no_identitas']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $user['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="level">Status (1 = Admin), (2 = Anggota Perpustakaan)</label>
                            <input type="text" name="level" class="form-control" id="level" value="<?= $user['level']; ?>">
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id = "ModalFormInputAnggota" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title">Input Data Anggota</h1>
        </div>
        <div class="modal-body">
            <form role="form" action="<?php echo base_url('admin/tambah_anggota');?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                            <input type="text" name="no_identitas" class="form-control" id="no_identitas">
                            <small class="form-text text-danger"><?= form_error('no_identitas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <small class="form-text text-danger"><?= form_error('alamat');?></small>
                        </div>
                        <div class="form-group">
                            <label for="level">Status User</label>
                            <select class="form-control" id="level" name="level">
                                <option value="1">Admin</option>
                                <option value="2">Anggota Perpustakaan</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
                    
            


<script type="text/javascript">
  $(document).ready( function () {
      $('#table').DataTable();
  } );
</script>
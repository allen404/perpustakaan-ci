<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Anggota
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama"  value="<?= $user['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_identitas">Nomor Identitas</label>
                            <input type="text" name="no_identitas" class="form-control" id="no_identitas" value="<?= $user['no_identitas']; ?>">
                            <small class="form-text text-danger"><?= form_error('no_identitas'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            <small class="form-text text-danger"><?= form_error('password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $user['alamat']; ?>">
                            <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="level">Status (1 = Admin), (2 = Anggota Perpustakaan)</label>
                            <input type="text" name="level" class="form-control" id="level" value="<?= $user['level']; ?>">
                            <small class="form-text text-danger"><?= form_error('level'); ?></small>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
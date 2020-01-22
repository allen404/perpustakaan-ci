<div class="container">
            <div class="card">
                <div class="card-header">
                    Detail Data Anggota
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $user['email']; ?></h6>
                    <p class="card-text">Nomor Identitas: <?= $user['no_identitas']; ?></p>
                    <p class="card-text">Alamat: <?= $user['alamat']; ?></p>
                    <p class="card-text">Level User: <?= $user['level']; ?></p>
                    <a href="<?= base_url(); ?>admin/list_anggota" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
<div class="container" style="margin-top: 20px">

<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash');?>"></div>
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
    <div class="row">
        <div class="col-md-12">
            <h2 ><?php echo $judul; ?></h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <!-- Tombol untuk memicu modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalForm">
                    + Tambah Data Peminjaman
                </button>
                <hr>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam (ID)</th>
                    <th>Judul Buku (ID)</th>
                    <th>Tanggal Pinjam </th>
                    <th>Tanggal Kembali</th>
                    <th>Lama Pinjam </th>
                    <th>Denda</th>
                    <th style="width:125px;">Status</th>

                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        foreach ($peminjaman as $p)
                        {
                            $i++;
                            $tgl_kembali = $p->tgl_pinjam;
                            $kembali = $p->tgl_pinjam;
                            $cari_hari = abs(strtotime($kembali) - strtotime($tgl_kembali));
                            $hitung_hari = floor($cari_hari/(60*60*24));


                        ?>
                        <form method="post" action="<?php echo base_url('c_pinjam/kembali/'.$p->id_pinjam."/".$p->id_buku) ?>">

                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p->nama; echo ' ('.$p->no_identitas.')'; ?></td>
                                <td><?php echo $p->judul_buku; echo ' ('.$p->id_buku.')'; ?></td>
                                <td><?php echo $p->tgl_pinjam; ?></td>
                                <td><?php echo $p->tgl_kembali; ?></td>
                                <td><?php echo $p->lama_pinjam; ?> </td>
                                <td> <?php echo $p->denda; ?> </td>
                                <td>
                                    <a href="<?php echo base_url('c_pinjam/kembali/'.$p->id_pinjam.'/'.$p->tgl_pinjam) ?>" class="badge badge-warning"> K </a>
                                    <a href="<?php echo base_url('c_pinjam/perpanjang/'.$p->id_pinjam) ?>" "<?php if($p->status==="kembali"){echo "disabled";} ?>" class="badge badge-primary" title="Perpanjang" onclick="return confirm('Perpanjang dengan denda yang telah ditentukan?')">P</a>
                                    <?php echo anchor('c_pinjam/delete/'.$p->id_pinjam,'<button type="button" class="badge badge-danger"> HAPUS </button>'); ?>
                                </td>
                            </tr>
                            <input type="hidden" name="denda">
                        </form>
                        <?php
                            }

                        ?>

              </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="labelModalKu">Tambah Data Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Tutup</span>
                </button>

            </div>

            <!-- Modal Body -->

            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="c_pinjam/input_simpan" method="post">
                <div class="form-group">
                        <label for="no_identitas">NOMOR IDENTITAS</label>
                        <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Masukkan No. Identitas" required/>
                    </div>
                    <div class="form-group">
                        <label for="id_buku">ID BUKU</label>
                        <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Masukkan ID Buku" required/>
                    </div>
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" placeholder="Masukkan Tanggal Pinjam" required/>
                    </div>

                    <div class="modal-footer">
                        <form action="c_pinjam/input_simpan" method="post">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary submitBtn"> Simpan Data </button>
                        </form>
                    </div>
                </form>
            </div>


            <!-- Modal Footer -->

        </div>
    </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
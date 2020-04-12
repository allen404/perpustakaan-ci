<div class="container" style="margin-top: 20px">
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
            <h2 style="text-align: left;margin-bottom: 30px; color:black;"> Data Rak Buku </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <?php echo anchor('admin/inputrakbuku','<button type="button" class="btn btn-primary"> + Tambah Data Rak Buku </button>'); ?>
                <hr>
                <tr>
                    <th>No </th>
                    <th>Kode Rak</th>
                    <th>Lokasi Rak</th>
               <th style="width:125px;">Action</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        foreach ($rak_buku as $rak)
                        {
                            $i++;
                    ?>
                            <tr>

                                <td><?php echo $i; ?> </td>
                                <td><?= $rak['kode_rak']?></td>
                                <td><?= $rak['lokasi'] ?></td>
                                <td align="center">
                                    <a href="<?= base_url();?>admin/editRakBuku/<?= $rak['kode_rak']?>" class="btn btn-warning">Edit</a>
                                    <a href="<?= base_url();?>admin/hapusRakBuku/<?= $rak['kode_rak']?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>

              </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>


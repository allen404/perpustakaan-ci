<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: left;margin-bottom: 30px; color:black;"> <b><?php echo $judul; ?></b> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              <a href="<?= base_url()?>Admin/tambahRegBuku" class="btn btn-primary">Tambah
                Registrasi Buku</a>
                <hr>
                <tr>
                    <th>No </th>
                    <th>Nomor Registrasi </th>
                    <th>ID Buku</th>
                    <th>Kode Rak</th>
                    <th>Tgl Registrasi</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        foreach ($reg_buku as $bk)
                        { 
                            $i++;
                    ?>
                            <tr> 
                                <td><?php echo $i; ?> </td>
                                <td><?= $bk['no_reg']?></td>
                                <td><?= $bk['id_buku']?></td>
                                <td><?= $bk['kode_rak']?></td>
                                <td><?= $bk['tgl_registrasi']?></td>
                                <td align="center">
                                    <a href="<?= base_url();?>admin/editRegBuku/<?=$bk['no_reg']?>" class="btn btn-warning">EDIT</a>
                                    <a href="<?= base_url();?>admin/deleteRegBuku/<?=$bk['no_reg']?>" class="btn btn-danger">HAPUS</a>
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

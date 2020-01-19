<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px; color:blue;"> <b><?php echo $judul; ?></b> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
              <a href="<?= base_url()?>admin/tambahPenulis" class="btn btn-primary">Tambah
                Data Penulis</a>
                <hr>
                <tr>
                    <th>No </th>
                    <th>Id Penulis</th>
                    <th>Nama Penulis</th>
                    <th>Alamat Penulis</th>
                    <th>No Telepon</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        foreach ($penulis as $penulis)
                        { 
                            $i++;
                    ?>
                            <tr> 
                                <td><?php echo $i; ?> </td>
                                <td><?= $penulis['id_penulis']?></td>
                                <td><?= $penulis['nama_penulis']?></td>
                                <td><?= $penulis['alamat_penulis']?></td>
                                <td><?= $penulis['no_telp']?></td>
                                <td align="center">
                                    <a href="<?= base_url();?>admin/editPenulis/<?=$penulis['id_penulis']?>" class="btn btn-warning">EDIT</a>
                                    <a href="<?= base_url();?>admin/hapusPenulis/<?=$penulis['id_penulis']?>" class="btn btn-danger">HAPUS</a>
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

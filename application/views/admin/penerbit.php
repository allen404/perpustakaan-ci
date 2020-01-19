<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: left;margin-bottom: 30px; color:black;"> <?php echo $judul; ?> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <a href="<?= base_url(); ?>admin/inputPenerbit" class="btn btn-primary">Input Data Penerbit</a>
                <hr>
                <tr>
                    <th>No </th>
                    <th>Id Penerbit</th>
                    <th>Nama Penerbit</th>
                    <th>Alamat Penerbit</th>
                    <th>No Telepon</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        foreach ($penerbit as $penerbit)
                        { 
                            $i++;
                    ?>
                            <tr> 
                                <td><?php echo $i; ?> </td>
                                <td><?= $penerbit['id_penerbit']?></td>
                                <td><?= $penerbit['nama_penerbit']?></td>
                                <td><?= $penerbit['alamat_penerbit']?></td>
                                <td><?= $penerbit['no_telp']?></td>
                                <td align="center">
                                    <a href="<?=base_url();?>admin/edit/<?=$penerbit['id_penerbit']?>" class="btn btn-warning">Edit</a>
                                    <a href="<?=base_url();?>admin/delete/<?=$penerbit['id_penerbit']?>" class="btn btn-danger">Hapus</a>
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

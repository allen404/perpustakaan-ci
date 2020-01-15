<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px; color:blue;"> <b><?php echo $judul; ?></b> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                    <a href="<?= base_url(); ?>c_buku/input" class="btn btn-primary">Input Data Buku</a>
                <hr>
                <tr>
                    <th>No </th>
                    <th>Gambar Buku </th>
                    <th>ID Buku </th>
                    <th>Genre Buku</th>
                    <th>Judul Buku</th>
                    <th>ID Penerbit</th>
                    <th>ID Penulis</th>
                    <th>Tahun Buku</th>
                    <th>Jumlah Buku</th>
               <th style="width:125px;">Action
                  </p></th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }

                        foreach ($buku as $bk)
                        { 
                            $i++;
                    ?>
                            <tr> 
                                <td><?php echo $i; ?> </td>
                                <td>
                            <img src="<?php echo base_url('upload/product/'.$bk->foto) ?>" width="64" /> 
                                </td>
                                <td><?php echo "$bk->id_buku" ?></td> 
                                <td><?php echo "$bk->genre_buku" ?></td>
                                <td><?php echo "$bk->judul_buku" ?></td>
                                <td><?php echo "$bk->id_penerbit" ?></td>
                                <td><?php echo "$bk->id_penulis" ?></td>
                                <td><?php echo "$bk->tahun_buku" ?></td>
                                <td><?php echo "$bk->jumlah_buku" ?></td>
                                <td align="center">
                                    <?php echo anchor('c_buku/edit/'.$bk->id_buku,'<button type="button" class="btn btn-warning"> EDIT </button>'); ?>
                                    <?php echo anchor('c_buku/delete/'.$bk->id_buku,'<button type="button" class="btn btn-danger"> HAPUS </button>'); ?>
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

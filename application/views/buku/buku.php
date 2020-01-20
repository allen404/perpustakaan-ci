<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: left;margin-bottom: 30px; color:black;">Data Buku</h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
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
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }

                        foreach ($buku as $buku)
                        { 
                            $i++;
                    ?>
                            <tr> 
                                <td><?php echo $i; ?> </td>
                                <td>
                            <img src="<?php echo base_url('upload/buku/', $buku['foto']) ?>" width="64" /> 
                                </td>
                                <td><?= $buku['id_buku']?></td> 
                                <td><?= $buku['genre_buku']?></td> 
                                <td><?= $buku['judul_buku']?></td> 
                                <td><?= $buku['id_penerbit']?></td> 
                                <td><?= $buku['id_penulis']?></td> 
                                <td><?= $buku['tahun_buku']?></td> 
                                <td><?= $buku['jumlah_buku']?></td> 
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

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
            <h2 style="text-align: left;margin-bottom: 30px; color:black;">Data Buku</h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                    <a href="<?= base_url(); ?>c_buku/input" class="btn btn-primary">Input Data Buku</a>
                <hr>
                <tr>
                    <th>No </th>
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

                        foreach ($buku as $buku)
                        {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?= $buku['id_buku']?></td>
                                <td><?= $buku['genre_buku']?></td>
                                <td><?= $buku['judul_buku']?></td>
                                <td><?= $buku['id_penerbit']?></td>
                                <td><?= $buku['id_penulis']?></td>
                                <td><?= $buku['tahun_buku']?></td>
                                <td><?= $buku['jumlah_buku']?></td>
                                <td align="center">
                                    <a href="<?=base_url();?>c_buku/edit/<?= $buku['id_buku'] ?>" type="button" class="btn btn-warning"> EDIT </a>
                                    <a href="<?= base_url();?>c_buku/delete/<?= $buku['id_buku'] ?>" type="button" class="btn btn-danger"> HAPUS </a>
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

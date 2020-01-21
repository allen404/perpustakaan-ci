<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px; color:blue;"> <b><?php echo $judul; ?></b> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <?php echo anchor('c_perpus/input','INPUT DATA PEMINJAMAN'); ?>
                <?php $this->load->view('c_perpus'); ?>
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
                            $cari_hari = abs(strtotime($p->tgl_pinjam) - strtotime($p->tgl_kembali));
                            $hitung_hari = floor($cari_hari/(60*60*24));
                             
                            if($hitung_hari > 7){
                                $telat = $hitung_hari - 7;
                                $denda = 500 * $telat;
                            }else{
                                $telat = 0;
                                $denda = 0;
                            }
                        ?>
                        <form method="post" action="<?php echo base_url('c_perpus/kembali/'.$p->id_pinjam."/".$p->id_buku) ?>">
                            
                            <tr> 
                            <td><?php echo $i; ?></td>
                                <td><?php echo $p->nama; echo ' ('.$p->no_identitas.')'; ?></td>
                                <td><?php echo $p->judul_buku; echo ' ('.$p->id_buku.')'; ?></td>
                                <td><?php echo $p->tgl_pinjam; ?></td>
                                <td><?php echo $p->tgl_kembali; ?></td>
                                <td><?php echo $hitung_hari; ?> </td>
                                <td> <?php echo $p->denda; ?> </td>
                                <td>
                                    <a href = "<?php base_url(); ?> c_perpus/kembali/ <?php $p->id_pinjam; ?>" class="btn btn-success"> K </a>
                                    <a href="<?php echo base_url('c_perpus/perpanjang/'.$p->id_pinjam) ?>" "<?php if($p->status==="kembali"){echo "disabled";} ?>" class="btn btn-primary" title="Perpanjang" onclick="return confirm('Perpanjang dengan denda yang telah ditentukan?')">P</a>
                                    <?php echo anchor('c_perpus/delete/'.$p->id_pinjam,'<button type="button" class="btn btn-danger"> HAPUS </button>'); ?>
                                </td>
                            </tr>
                            <input type="hidden" name="denda" value="<?php if($telat>7){echo ($telat-7)*500;}else{echo "";} ?> ">
                        </form>
                        <?php 
                            }
                        
                        ?>

              </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
      $('#table_id').DataTable();
  } );
</script>
</body>
</html>


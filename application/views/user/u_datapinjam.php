<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap4.min.css'?>" rel="stylesheet">
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
                            $tgl_kembali = date('d-m-Y');
                            $kembali = $p->tgl_pinjam;
                            $cari_hari = abs(strtotime($kembali) - strtotime($tgl_kembali));
                            $hitung_hari = floor($cari_hari/(60*60*24));

                        ?>
                           <tr> 
                                <td><?php echo $i; ?></td>
                                <td><?php echo $p->no_identitas; ?></td>
                                <td><?php echo $p->id_buku; ?></td>
                                <td><?php echo $p->tgl_pinjam ?></td>
                                <td><?php echo $p->tgl_kembali; ?></td>
                                <td><?php echo $hitung_hari; ?> </td>
                                <td><?php echo $p->denda; ?> </td>
                                <td><?php echo $p->status; ?></td>
                            </tr>
                        <?php 
                            }
                        
                        ?>

              </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>
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


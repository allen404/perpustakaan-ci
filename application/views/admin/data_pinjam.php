<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 ><?php echo $judul; ?></h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <?php echo anchor('c_pinjam/input','<button type="button" class="btn btn-primary"> + Tambah Data Peminjaman </button>'); ?>
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
                        foreach ($user as $u)
                        {
                            
                        }
                        foreach ($buku as $bk)
                        {
                            $judul = $bk->judul_buku;
                        }
                        foreach ($peminjaman as $p) 
                        {
                            $i++;
                            $tgl_kembali = date('d-m-Y');
                            $kembali = $p->tgl_pinjam;
                            $cari_hari = abs(strtotime($kembali) - strtotime($tgl_kembali));
                            $hitung_hari = floor($cari_hari/(60*60*24));
                        ?>
                        <form method="post" action="<?php echo base_url('c_pinjam/kembali/'.$p->id_pinjam."/".$p->id_buku) ?>">
                            
                            <tr> 
                                <td><?php echo $i; ?></td>
                                <td><?php echo $nama_user($p->no_identitas); ?></td>
                                <td><?php echo $judul($p->id_buku); ?></td>
                                <td><?php echo $p->tgl_pinjam ?></td>
                                <td><?php echo $p->tgl_kembali; ?></td>
                                <td><?php echo $hitung_hari; ?> </td>
                                <td> <?php echo $p->denda; ?> </td>
                                <td>
                                    <a href="<?php echo base_url('index.php/c_pinjam/kembali/'.$p->id_pinjam.'/'.$p->tgl_pinjam) ?>" class="badge badge-warning"> K </a>
                                    <a href="<?php echo base_url('index.php/c_pinjam/perpanjang/'.$p->id_pinjam) ?>" "<?php if($p->status==="kembali"){echo "disabled";} ?>" class="badge badge-primary" title="Perpanjang" onclick="return confirm('Perpanjang dengan denda yang telah ditentukan?')">P</a>
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

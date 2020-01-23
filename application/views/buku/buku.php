<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: left;margin-bottom: 30px; color:black;">Data Buku</h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
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
                    <th>Lokasi</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                        $offset = "";
                        if ($offset == "") { $i = 0; } else { $i = $offset; }
                        $query = $this->db->query("SELECT b.id_buku, b.judul_buku, b.genre_buku, d.nama_penerbit, e.nama_penulis, b.tahun_buku, b.jumlah_buku, c.lokasi FROM reg_buku a, buku b, rak_buku c, penerbit d, penulis e WHERE a.id_buku = b.id_buku and a.kode_rak = c.kode_rak AND b.id_penerbit = d.id_penerbit AND b.id_penulis = e.id_penulis");
                        foreach ($query->result() as $buku)
                        {
                            $i++;
                    ?>
                            <tr>
                                <td><?php echo $i; ?> </td>
                                <td><?php echo $buku->id_buku;?></td>
                                <td><?php echo $buku->judul_buku?></td>
                                <td><?php echo $buku->genre_buku?></td>
                                <td><?php echo $buku->nama_penerbit?></td>
                                <td><?php echo $buku->nama_penulis?></td>
                                <td><?php echo $buku->tahun_buku?></td>
                                <td><?php echo $buku->jumlah_buku?></td>
                                <td><?php echo $buku->lokasi?></td>
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

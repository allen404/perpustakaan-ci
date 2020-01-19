<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center;margin-bottom: 30px; color:blue;"> <b><?php echo $judul; ?></b> </h2>
            <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                    <a href="<?= base_url(); ?>c_buku/input" class="btn btn-primary" data-toggle="modal" data-target="#ModalFormInputBuku">Input Data Buku</a>
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
                                <td align="center">
                                    <a href="<?php echo base_url('c_buku/edit/'); ?><?= $buku['id_buku'] ?>" type="button" class="openModalFormEditBuku btn btn-warning" data-toggle="modal" data-target="#ModalFormEditBuku"> EDIT </a>
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

<div id ="ModalFormInputBuku" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Input Data Buku</h1>
            </div>
            <div class="modal-body">
                <form role="form" action="<?= base_url();?>c_buku/input_simpan" method="post">
                        <div class="form-group">
                            <label for="id_buku">ID Buku</label>
                            <input type="text" name="id_buku" class="form-control" id="id_buku">
                        </div>
                        <div class="form-group">
                            <label for="genre_buku">Genre Buku</label>
                            <input type="text" name="genre_buku" class="form-control" id="genre_buku">
                        </div>
                        <div class="form-group">
                            <label for="judul_buku">Judul Buku</label>
                            <input type="text" name="judul_buku" class="form-control" id="judul_buku">
                        </div>
                        <div class="form-group">
                            <label for="id_penerbit">ID Penerbit</label>
                            <input type="text" name="id_penerbit" class="form-control" id="id_penerbit">
                        </div>
                        <div class="form-group">
                            <label for="id_penulis">ID Penulis</label>
                            <input type="text" name="id_penulis" class="form-control" id="id_penulis">
                        </div>
                        <div class="form-group">
                            <label for="tahun_buku">Tahun Diterbitkan</label>
                            <input type="text" name="tahun_buku" class="form-control" id="tahun_buku">
                        </div>
                        <div class="form-group">
                            <label for="id_buku">Jumlah Buku</label>
                            <input type="text" name="jumlah_buku" class="form-control" id="jumlah_buku">
                        </div>
                        <div class="form-group">
                            <label for="foto">Photo</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                        </div>

                        <button type="submit" value="upload" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<div id="ModalFormEditBuku" class="modal fade">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Edit Data Buku</h1>
			</div>
			<div class="modal-body">
					<form role="form" action="<?= base_url();?>c_buku/edit_simpan" method="post">
						<input type="hidden" name="id_buku" value="<?= $buku['id_buku'];?>">
							<div class="form-group">
								<label for="id_buku">ID Buku</label> 
								<input type="text" name="id_buku" class="form-control" id="id_buku" value="<?= $buku['id_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="genre_buku">Genre Buku</label> 
								<input type="text" name="genre_buku" class="form-control" id="genre_buku" value="<?= $buku['genre_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="judul_buku">Judul Buku</label> 
								<input type="text" name="judul_buku" class="form-control" id="judul_buku" value="<?= $buku['judul_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="id_penerbit">ID Penerbit</label> 
								<input type="text" name="id_penerbit" class="form-control" id="id_penerbit" value="<?= $buku['id_penerbit']; ?>">
							</div>
							<div class="form-group">
								<label for="id_penulis">ID Penulis</label> 
								<input type="text" name="id_penulis" class="form-control" id="id_penulis" value="<?= $buku['id_penulis']; ?>">
							</div>
							<div class="form-group">
								<label for="tahun_buku">Tahun Buku</label> 
								<input type="number" name="tahun_buku" class="form-control" id="tahun_buku" value="<?= $buku['tahun_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="jumlah_buku">Jumlah Buku</label> 
								<input type="number" name="jumlah_buku" class="form-control" id="jumlah_buku" value="<?= $buku['jumlah_buku']; ?>">
							</div>
							<div class="form-group">
								<label for="foto">Photo</label> 
								<input type="file" name="foto" class="form-control" id="foto">
							</div>
								<div>
								<button type="sumbit" value="upload" class="btn btn-primary"> SIMPAN DATA </button>  
							</div>
						</form>
					</div>
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

<div class="col-md-12">
          <div class="card card-secondary">
		  	<div class="card-header">
              <h3 class="card-title">Tambah Data Rekam Medis</h3>
							

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            
          </div>
          <div class="card-body">
		  						<form action="" method="POST">
											<div class="form-group">
											<label for="id_rm">ID </label>
											<input type="text" name="id_rm" value="<?php echo $id_unik; ?>" class="form-control" id="id_pasien" readonly>
											</div>
											<div class="form-group">
												<label for="pasien">Pasien</label>
												<select class="form-control select2bs4" name="pasien" id="pasien">
													<?php
													foreach ($pasien as $value) {
															echo "<option value='$value->id_pasien'> $value->nama</option>";
													}
													?>
												</select>
												
											</div>
											<div class="form-group">
												<label for="tanggal_terinfeksi">Tanggal Terinfeksi Penyakit</label>
												<input type="date" id="tanggal_terinfeksi" class="form-control" name="tanggal_terinfeksi">
											</div>
											<div class="form-group">
												<label for="penyakit">Jenis Penyakit</label>
												<select class="form-control select2bs4" name="penyakit" id="penyakit">
													<?php
													foreach ($penyakit as $value) {
															echo "<option value='$value->id_penyakit'>$value->nama_penyakit</option>";
													}
													?>
												</select>
												
											</div>
											<div class="form-group">
												<label for="status">Status</label>
												<select name="status" class="form-control" id="status">
													<option value="Dalam Perawatan">Dalam Perawatan</option>
													<option value="Sembuh">Sembuh</option>
											</select>
											</div>
											<div class="form-group">
												<label for="tanggal_sembuh">Tanggal Dinyatakan Sembuh</label>
												<input type="date" id="tanggal_sembuh" class="form-control" name="tanggal_sembuh">
											</div>
											
											<div class="form-group">
												<label for="keterangan">Keterangan Lengkap</label>
												<input type="text" id="keterangan" class="form-control" name="keterangan">
											</div>
											<div class="form-group">
												<label for="user">Petugas</label>
												<select class="form-control select2bs4" name="user" id="user">
													<?php
													foreach ($user as $value) {
															echo "<option value='$value->id_user'>$value->username</option>";
													}
													?>
												</select>
												
											</div>
								<div class="col-12">
									<input type="submit" value="Tambah Data" class="btn btn-success float-right">
									</div>
							</form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
		<div class="col-12">
          <div class="card">
		  <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header">
			
              <h3 class="card-title">Data Rekam Medis Pasien Penyakit Menular</h3>
			  
            </div>
			
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID </th>
                  <th>NIK Pasien</th>
				  <th>Nama Pasien</th>
				  <th>Tanggal Terinfeksi</th>
				  <th>Status</th>
				  <th>Penyakit </th>
				  <th>Tanggal Sembuh</th>
				  <th>Keterangan </th>
				  <th>Nama Petugas </th>
				  <th>Aksi </th>

                  
                </tr>
                </thead>
				<tbody>
				<?php foreach ($rm as $row) : ?>
                <tr>
                  <td> 
					<?= $row['id_rm']; ?>
				 </td>
                  <td>
				  	<?= $row['nik']; ?>
				  </td>
				  <td>
				  	<?= $row['nama']; ?>
				  </td>
				  <td>
				  	<?= $row['tanggal_terinfeksi']; ?>
				  </td>
				  <td>
				  	<?= $row['status']; ?>
				  </td>
				  <td>
				  	<?= $row['nama_penyakit']; ?>
				  </td>
				  <td>
				  	<?= $row['tanggal_sembuh']; ?>
				  </td>
				  <td>
				 	 <?= $row['keterangan']; ?>
				  </td>
				  <td>
				  	<?= $row['username']; ?>
				  </td>
				<td width="250">
				<a onclick="return confirm('yakin?');" href="<?php echo site_url('medis/hapus/' . $row['id_rm']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
					
				</td>
                </tr>
				<?php endforeach; ?>
				</tbody>
              </table>
            </div>
            <!-- /.card-body -->
			</div>

			
          <!-- /.card -->
        </div>
        <!-- /.col -->

		

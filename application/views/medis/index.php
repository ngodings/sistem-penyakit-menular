	<div class="card">
		<div class="card-header">
			
              <h3 class="card-title">Import Data  Rekam Medis Pasien</h3>
			  
        </div>
		<div class="card-body">
		<?php if(!empty($this->session->flashdata('status'))){ ?>
			<div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
			<?php } ?>
			<form action="<?= base_url('ImportController/import_excel'); ?>" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Pilih File Excel</label>
					<input type="file" name="fileExcel">
				</div>
				<div>
					<button class='btn btn-success' type="submit">
						<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			    		Import		
					</button>
				</div>
			</form>
			<br>
			
			<a class='btn btn-success' href="https://docs.google.com/spreadsheets/d/1D4TY22ZAD1vCbCPzekTq6lfu3fjIqz09rEX9A4ncu1s/edit?usp=sharing">format import</a>
		</div>

	</div>
	
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
												</br>
												<select class="form-control select2bs4" name="pasien" id="pasien">
													<?php
													foreach ($pasien as $value) {
															echo "<option value='$value->id_pasien'>$value->nik - $value->nama</option>";
													}
													?>
												</select>
												
											</div>
											
											<div class="form-group">
												<label for="tanggal_terinfeksi">Tanggal Mulai Kasus</label>
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
													<option value="Sembuh">Sembuh</option>
													<option value="Dalam Perawatan">Dalam Perawatan</option>
													<option value="Meninggal">Meninggal</option>
													
												</select>
											</div>
											<div class="form-group">
												<label for="tanggal_sembuh">Tanggal Selesai Kasus</label>
												<input type="date" id="tanggal_sembuh" class="form-control" name="tanggal_sembuh">
											</div>
											
											<div class="form-group">
												<label for="keterangan">Keterangan Lengkap</label>
												<input type="text" id="keterangan" class="form-control" name="keterangan">
											</div>
											<div class="form-group">
												<label for="user">Petugas</label>
												 <select name="user" id="user" class="form-control custom-select" disabled>
													<option value="<?= $petugas->id_user ?>" selected><?= $petugas->username ?></option>
												 </select> 
										<!-- <input type="text" name="user" value="<?= $petugas->id_user ?>" class="form-control" id="user" readonly><?= $petugas->username ?> -->
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
				<!-- <tr>
					<td>Minimum age:</td>
					<td><input type="text" id="min" name="min"></td>
				</tr>
				<tr>
					<td>Maximum age:</td>
					<td><input type="text" id="max" name="max"></td>
				</tr> -->
				<br>
			</br>
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>NIK Pasien</th>
				  <th>Nama Pasien</th>
				  <th>Alamat</th>
				  <th>Tanggal Mulai Kasus</th>
				  <th>Status</th>
				  <th>Penyakit </th>
				  <th>Tanggal Selesai Kasus</th>
				  <th>Keterangan </th>
				  <th>Nama Petugas </th>
				  <th>Aksi </th>

                  
                </tr>
                </thead>
				<tbody>
				<?php foreach ($rm as $row) : ?>
                <tr>
                  
                  <td>
				  	<?= $row['nik']; ?>
				  </td>
				  <td>
				  	<?= $row['nama']; ?>
				  </td>
				  <td>
				  	<?= $row['alamat']; ?>
				  </td>
				  <td>
				  	<?= $row['tanggal_terinfeksi']; ?>
				  </td>
				  <td>
				  	<?php if ($row['status'] == 'Dalam Perawatan') {?>
					  <a class= "badge badge-warning"> <?= $row['status'];?> </a>
					  <?php } else if ($row['status'] == 'Sembuh') {?>
					  <a class= "badge badge-success"> <?= $row['status'];?> </a>
					  <?php } else { ?>
					  <a class= "badge badge-danger"> <?= $row['status'];?> </a>
					  <?php }?>
				  </td>
				  <td>
				  	<?= $row['nama_penyakit']; ?>
				  </td>
				  <td>
				  <?php if ($row['tanggal_sembuh'] == '0000-00-00') {?>
					  <a class= "badge badge-danger"> belum selesai </a>
					  <?php } else { ?>
					   <?= $row['tanggal_sembuh'];?> 
					  <?php }?>
				  	
				  </td>
				  <td>
				 	 <?= $row['keterangan']; ?>
				  </td>
				  <td>
				  	<?= $row['username']; ?>
				  </td>
				<td width="250">
				<a href="<?php echo site_url('medis/ubah/' . $row['id_rm']) ?>" class="btn btn-small" id="edit-rm"><i class="fas fa-edit"></i> Edit</a>
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

		

		

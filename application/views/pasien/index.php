<div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Pasien</h3>
							

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
							<form action="" method="POST">
											<div class="form-group">
												<label for="id_pasien">ID </label>
												<input type="text" name="id_pasien" value="<?php echo $id_unik; ?>" class="form-control" id="id_pasien" readonly>
											</div>
											<div class="form-group">
												<label for="nik">NIK Pasien</label>
												<input type="text" id="nik" class="form-control" name="nik">
											</div>
											<div class="form-group">
												<label for="nama">Nama Pasien</label>
												<input type="text" id="nama" class="form-control" name="nama">
											</div>
											<div class="form-group">
												<label for="tanggal_lahir">Tanggal Lahir Pasien</label>
												<input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir">
											</div>
											<div class="form-group">
												<label for="jk">Jenis Kelamin</label>
												<select name="jk" class="form-control" id="jk">
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
											</select>
											</div>
											<div class="form-group">
												<label for="kecamatan">Kecamatan</label>
												<select class="form-control" name="kecamatan" id="kecamatan">
													<?php
													foreach ($hasil as $value) {
															echo "<option value='$value->id_kec'>$value->nama_kecamatan</option>";
													}
													?>
												</select>
												
											</div>
											<div class="form-group">
												<label for="kelurahan">Kelurahan</label>
												<select class="form-control" name="kelurahan" id="kelurahan">
													<!--  akan diload menggunakan ajax, dan ditampilkan disini -->
												</select>
											</div>
											<div class="form-group">
												<label for="alamat">Alamat Lengkap</label>
												<input type="text" id="alamat" class="form-control" name="alamat">
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
              <h3 class="card-title">Data Pasien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIK</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
				  <th>Kecamatan</th>
				  <th>Kelurahan</th>
				  <th>Alamat Lengkap</th>
                  <th width="250">Aksi</th>
                </tr>
                </thead>
                <tbody>
								<?php foreach ($pasien as $row) : ?>
                <tr>
                  <td><?= $row['nik']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['tanggal_lahir']; ?></td>
                  <td><?= $row['jk']; ?> </td>
									<td><?= $row['nama_kecamatan']; ?> </td>
									<td><?= $row['nama_kelurahan']; ?> </td>
									<td><?= $row['alamat']; ?> </td>
                  <td width="250">	
									
									<a href="<?php echo site_url('pasien/ubah/' . $row['id_pasien']) ?>" class="btn btn-small" id="edit-pasien"><i class="fas fa-edit"></i> Edit</a>
									<a href="<?php echo site_url('pasien/hapus/' . $row['id_pasien']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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
				<script>

					$("#kecamatan").change(function(){

							// variabel dari nilai combo box kecamatan
							var id_kec = $("#kecamatan").val();

							// Menggunakan ajax untuk mengirim dan dan menerima data dari server
							$.ajax({
									url : "<?php echo base_url();?>/pasien/get_kelurahan",
									method : "POST",
									data : {id_kec:id_kec},
									async : false,
									dataType : 'json',
									success: function(data){
											var html = '';
											var i;

											for(i=0; i<data.length; i++){
													html += '<option value='+data[i].id_kel+'>'+data[i].nama_kelurahan+'</option>';
											}
											$('#kelurahan').html(html);

									}
							});


							// Untuk sunting
							$('#edit-data').on('show.bs.modal', function (event) {
								var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
								var modal          = $(this)

								// Isi nilai pada field
								modal.find('#id_pasien').attr("value",div.data('id_pasien'));
								modal.find('#nama').attr("value",div.data('nama'));
								modal.find('#nik').attr("value",div.data('nik'));
								modal.find('#tanggal_lahir').attr("value",div.data('tanggal_lahir'));
								modal.find('#jk').attr("value",div.data('jk'));
								modal.find('#nama_kecamatan').attr("value",div.data('nama_kecamatan'));
								modal.find('#nama_kelurahan').attr("value",div.data('nama_kelurahan'));
								modal.find('#alamat').attr("value",div.data('alamat'));
							});
					});

				
					
					</script>
									
			
			

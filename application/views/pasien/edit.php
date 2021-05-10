						<div class="card-body">
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>
						
							<form action="" method="POST" id="edit-pasien">
							
											<div class="form-group">
												<label for="id_pasien">ID </label>
												<input type="text" name="id_pasien" class="form-control" id="id_pasien" value="<?= $pasien['id_pasien']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="nik">NIK Pasien</label>
												<input type="text" id="nik" class="form-control" name="nik" value="<?= $pasien['nik']; ?>">
											</div>
											<div class="form-group">
												<label for="nama">Nama Pasien</label>
												<input type="text" id="nama" class="form-control" name="nama" value="<?= $pasien['nama']; ?>">
											</div>
											<div class="form-group">
												<label for="tanggal_lahir">Tanggal Lahir Pasien</label>
												<input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" value="<?= $pasien['tanggal_lahir']; ?>">
											</div>
											<div class="form-group">
												<label for="jk">Jenis Kelamin</label>
												<select name="jk" class="form-control" id="jk">
												<option value="<?= $pasien['jk']?>"><?= $pasien['jk']?></option>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
											</select>
											</div>
											<div class="form-group">
												<label for="kecamatan">Kecamatan</label>
												<select class="form-control" name="kecamatan" id="kecamatan" >
													<option value="<?= $pasien['id_kec'] ?>"><?= $pasien['nama_kecamatan']?></option>
													<?php
                                                    foreach ($hasil as $value) {
                                                        echo "<option value='$value->id_kec'>$value->nama_kecamatan</option>";
                                                    }
                                                    ?>
												</select>
											</div>
											<div class="form-group">
												<label for="kelurahan">Kelurahan</label>
												<div 
													id="kelurahan_pasien" 
													data-id_kelurahan="<?= $pasien['id_kel'] ?>" 
													data-nama_kelurahan="<?= $pasien['nama_kelurahan'] ?>"></div>
												<select class="form-control" name="kelurahan" id="kelurahan" >
													<!--  akan diload menggunakan ajax, dan ditampilkan disini -->

												</select>
											</div>
											<div class="form-group">
												<label for="alamat">Alamat Lengkap</label>
												<input type="text" id="alamat" class="form-control" name="alamat" value="<?= $pasien['alamat']; ?>">
											</div>
								<div class="col-12">
											<input type="submit" value="Edit Data" class="btn btn-success float-right">
									</div>
									
							</form>
            </div>
            <!-- /.card-body -->

			<script>

					 $("#kecamatan").change(function(){

							// variabel dari nilai combo box kecamatan
							var id_kec = $("#kecamatan").val();

							// Menggunakan ajax untuk mengirim dan dan menerima data dari server
							$.ajax({
									url : "<?php echo base_url();?>/pasien/get_kelurahan",
									method : "POST",
									data : {id_kec: id_kec},
									async : false,
									dataType : 'json',
									success: function(data){
											let id_kel_terpilih = $('#kelurahan_pasien').data('id_kelurahan');
											let nama_kel_terpilih = $('#kelurahan_pasien').data('nama_kelurahan');
											var html = '<option value='+ id_kel_terpilih +'>'+ nama_kel_terpilih +'</option>';
											var i;

											for(i=0; i<data.length; i++){
													html += '<option value='+data[i].id_kel+'>'+data[i].nama_kelurahan+'</option>';
											}
											$('#kelurahan').html(html);

									}
							});


							// Untuk sunting
							
					 });

				
					
					</script>

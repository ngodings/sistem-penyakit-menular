						<div class="card-body">
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>
						
							<form action="" method="POST" id="edit-pasien">
							
											<div class="form-group">
												<label for="id_pasien">ID </label>
												<input type="text" name="id_pasien" class="form-control" id="id_pasien" value="<?php echo $data['id_pasien'] ?>" readonly>
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

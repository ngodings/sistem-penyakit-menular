<div class="card-body">
						<?php if (validation_errors()) : ?>
							<div class="alert alert-danger" role="alert">
								<?= validation_errors(); ?>
							</div>
						<?php endif; ?>
						
							<form action="" method="POST" id="edit-medis">
							
											<div class="form-group">
												<label for="id_rm">ID </label>
												<input type="text" name="id_rm" class="form-control" id="id_rm" value="<?= $rm['id_rm']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="pasien">Nama Pasien </label>
												<input type="text" name="pasien" class="form-control" id="pasien" value="<?= $rm['nama']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="tanggal_terinfeksi">Tanggal Mulai Kasus</label>
												<input type="date" id="tanggal_terinfeksi" class="form-control" name="tanggal_terinfeksi" value="<?= $rm['tanggal_terinfeksi']; ?>">
											</div>
											<div class="form-group">
												<label for="penyakit">ID </label>
												<input type="text" name="penyakit" class="form-control" id="penyakit" value="<?= $rm['nama_penyakit']; ?>" readonly>
											</div>
											<div class="form-group">
												<label for="status">Status</label>
												<select name="status" class="form-control" id="status" value="<?= $rm['status']; ?>">
													<option value="Dalam Perawatan">Dalam Perawatan</option>
													<option value="Sembuh">Sembuh</option>
													<option value="Meninggal">Meninggal</option>
											</select>
											</div>
											<div class="form-group">
												<label for="tanggal_sembuh">Tanggal Selesai Kasus/label>
												<input type="date" id="tanggal_sembuh" class="form-control" name="tanggal_sembuh" value="<?= $rm['tanggal_sembuh']; ?>">
											</div>
											
											<div class="form-group">
												<label for="keterangan">Keterangan Lengkap</label>
												<input type="text" id="keterangan" class="form-control" name="keterangan" value="<?= $rm['keterangan']; ?>">
											</div>
											
								<div class="col-12">
											<input type="submit" value="Edit Data" class="btn btn-success float-right">
									</div>
									
							</form>
            </div>
            <!-- /.card-body -->

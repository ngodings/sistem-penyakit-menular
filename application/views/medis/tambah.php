<div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Rekam Medis Pasien</h3>
							

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
															echo "<option value='$value->id_pasien'>$value->nama</option>";
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
											<?= $this->session->flashdata('pesan'); ?>
									</div>
							</form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>

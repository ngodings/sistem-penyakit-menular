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
                <label for="inputEstimatedBudget">Estimated budget</label>
                <input type="number" id="inputEstimatedBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Total amount spent</label>
                <input type="number" id="inputSpentBudget" class="form-control">
              </div>
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
								<select class="form-control" name="kecamatan" id="kecamatan">
									<?php
									foreach ($hasil as $value) {
											echo "<option value='$value->id_kec'>$value->nama</option>";
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Pasien</th>
                  <th>Nama Pasien</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th width="250">Aksi</th>
                </tr>
                </thead>
                <tbody>
								<?php foreach ($pasien as $row) : ?>
                <tr>
                  <td><?= $row['id_pasien']; ?></td>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['tanggal_lahir']; ?></td>
                  <td><?= $row['jk']; ?> </td>
                  <td>	<a href="<?php echo site_url('pasien/hapus/' . $row['id_pasien']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a></td>
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
													html += '<option value='+data[i].id_kel+'>'+data[i].nama+'</option>';
											}
											$('#kelurahan').html(html);

									}
							});
					});

				
					
					</script>
									
			
			

<div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Penyakit</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
			<?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
			<form action="" method="POST">
              <div class="form-group">
			  	<label for="id_penyakit">ID </label>
                <input type="text" name="id_penyakit" value="<?php echo $id_unik; ?>" class="form-control" id="id_penyakit" readonly>
              </div>
              <div class="form-group">
                <label for="nama_penyakit">Nama Penyakit Menular</label>
                <input type="text" id="nama_penyakit" class="form-control" name="nama_penyakit">
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
			
              <h3 class="card-title">Data Penyakit</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Penyakit</th>
                  <th>Nama Penyakit</th>
				  <th>Aksi</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php foreach ($penyakit as $row) : ?>
                <tr>
                  <td> 
					  <?= $row['id_penyakit']; ?>
				 </td>
                  
                  <td>
				  <?= $row['nama_penyakit']; ?>
				  </td>
				<td width="250">
						<a 
                            href="javascript:;"
                            data-id="<?php echo $row['id_penyakit'] ?>"
                            data-toggle="modal" data-target="#edit-data">
                            <button  data-toggle="modal" id="tombol-ubah" data-target="#edit-data" data-nama="<?php echo $row['nama_penyakit'] ?>" data-id="<?php echo $row['id_penyakit'] ?>" class="btn btn-info">Ubah</button>
                        </a>
					
                  	<a href="<?php echo site_url('penyakit/hapus/' . $row['id_penyakit']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
				</td>
                </tr>
				<?php endforeach; ?>
				</tbody>
              </table>
            </div>
            <!-- /.card-body -->

			<!-- Modal Ubah -->
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
						</div>
						<form class="form-horizontal"  action="<?php echo base_url('penyakit/ubah')?>" method="post" enctype="multipart/form-data" role="form">
						<div class="modal-body">
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">ID</label>
									<div class="col-lg-10">
									<input type="text" class="form-control" id="id_penyakit" name="id_penyakit" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-lg-2 col-sm-2 control-label">Nama</label>
									<div class="col-lg-10">
									<input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Nama">
									</div>
								</div>
								
						</div>
						
							<div class="modal-footer">
								<button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
								<button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END Modal Ubah -->
			<script>
			$(document).ready(function() {
				// Untuk sunting
				console.log("Hello, WOrld")
				$('#edit-data').on('show.bs.modal', function (event) {
					var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
					id_penyakit = div.data('id');
					nama_penyakit = div.data('nama');
					console.log("id penyakit :" + id_penyakit)
					console.log("nama penyakit : " + nama_penyakit)
					// console.log(modal.find('#id_penyakit').attr("value"))
					// console.log(div)
					// console.log(modal)
            		// mengambil nilai data-id yang di click
					// Isi nilai pada field
					// console.log($('input#id_penyakit').val('Uji coba'))
					$('input#id_penyakit').val(div.data('id'));
					$('input#nama_penyakit').val(div.data('nama'));
				});
			});
		</script>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->

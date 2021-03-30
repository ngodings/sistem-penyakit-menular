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
					<a href="<?php echo site_url('' . $row['id_penyakit']) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                  	<a href="<?php echo site_url('' . $row['id_penyakit']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
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

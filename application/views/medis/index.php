<div class="col-md-12">
          <div class="card card-secondary">
            
          </div>
          <!-- /.card -->
        </div>
      </div>
		<div class="col-12">
          <div class="card">
		  <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header">
			
              <h3 class="card-title">Data Rekam Medis Pasien Penyakit Menular</h3>
			  <a href="<?php echo base_url('Medis/tambah') ?>" class="btn btn-success float-right"> Tambah Data</a>
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
					<a href="<?php echo site_url('medis/hapus/' . $row['id_rm']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
						
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


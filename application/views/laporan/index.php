<div class="col-36">
          <div class="card">
		  <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header">
			
              <h3 class="card-title">Laporan Rekam Medis Pasien Penyakit Menular</h3>
			  
            </div>
			
            <!-- /.card-header -->
            <div class="card-body">
				<form >
						<h5>Cari data pada data tertentu: </h5>
						<label for="penyakit_menular" >Jenis Penyakit</label>
								<select class="form-control " name="penyakit_menular" id="penyakit_menular">
									<?php
										foreach ($penyakit as $p) {
											echo "<option value='$p->id_penyakit'>$p->nama_penyakit</option>";
												}
										?>
								</select>
								<label for="status">Status</label>
												<select name="status" class="form-control" id="status">
													<option value="Sembuh">Sembuh</option>
													<option value="Dalam Perawatan">Dalam Perawatan</option>
													<option value="Meninggal">Meninggal</option>
													
												</select>

							<!-- <label for="jenis_kelamin"> Jenis Kelamin </label>
							
							<select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
								<option value="Laki-laki">Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
							</select> -->

							
												<!-- <label for="kecamatan">Kecamatan</label>
												<select class="form-control" name="kecamatan" id="kecamatan">
													<?php
													foreach ($kec as $value) {
															echo "<option value='$value->id_kec'>$value->nama_kecamatan</option>";
													}
													?>
												</select>
												
											
											
												<label for="kelurahan">Kelurahan</label>
												<select class="form-control" name="kelurahan" id="kelurahan">
													
												</select>  -->
											
							<label for="tgl1">Tanggal Mulai : </label>
							
							<input type="date" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Mulai" value="" required>
							
							<label for="tgl2">Tanggal Akhir : </label>
							
							<input type="date" class="form-control" id="tgl2" name="tgl2" placeholder="Tanggal Akhir" value="" required>
							
							
								<br>
							<button type="button" class="btn btn-success float-right" name="cari" id="cari" > Cari</button>
							
						</form>
						<br>
						<br>
						<table id="tabelFilter" class="table table-bordered table-striped" >
				
							<thead>
								<tr>
									<td>NIK</td>
									<td>Nama </td>
									<td>Kecamatan</td>
									<td>Kelurahan</td>
									<td>Penyakit</td>
									<td>Status</td>
								</tr>
							</thead>
							<tbody>
							</tbody>
					</table>
            	</div>
				</div>
          <!-- /.card -->
        </div>
      </div>


<!-- BATAS SUCI
<div class="col-36">
          <div class="card">
		  <?= $this->session->flashdata('pesan'); ?>
            <div class="card-header">
			
              <h3 class="card-title">Laporan Data Akumulasi Penyebaran Penyakit Menular</h3>
			  
            </div>
			
            <div class="card-body">
				<form >
						<h5>Cari data pada parameter tertentu: </h5>
						<label for="penyakits" >Jenis Penyakit</label>
								<select class="form-control " name="penyakits" id="penyakits">
									<?php
										foreach ($penyakit as $p) {
											echo "<option value='$p->id_penyakit'>$p->nama_penyakit</option>";
												}
										?>
								</select>

							<label for="tahun1">Tanggal Mulai : </label>
							
							<input type="date" class="form-control" id="tahun1" name="tahun1" placeholder="Tanggal Mulai" value="" required>
							
							<label for="tahun2">Tanggal Akhir : </label>
							
							<input type="date" class="form-control" id="tahun2" name="tahun2" placeholder="Tanggal Akhir" value="" required>
							
							<label for="jk"> Jenis Kelamin </label>
							
								<select name="jk" class="form-control" id="jk">
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							
						
							
								<br>
							<button type="button" class="btn btn-success float-right" name="submit" id="submit" > Cari</button>
							
						</form>
						<br>
						<br>
						<table id="tabelku" class="table table-bordered table-striped" >
				
							<thead>
								<tr><td>Kecamatan</td><td>Total </td><td>Sembuh</td><td>Meninggal</td><td>Aktif (Dalam Perawatan)</td></tr>
							</thead>
							<tbody>
							</tbody>
					</table>
            	</div> -->
            <!-- /.card-body -->
			</div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url()?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url()?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?= base_url()?>template/dist/js/adminlte.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>template/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>template/dist/js/pages/dashboard3.js"></script>

<!-- DataTables -->
<script src="<?= base_url()?>template/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url()?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Select2 -->
<script src="<?= base_url()?>template/plugins/select2/js/select2.full.min.js"></script>

<!-- Custom scripts for export-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		
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
		});

		$('#submit').click(function(){
			
			
			var penyakit = $('#penyakits').val()
			var tahun1 = $('#tahun1').val()
			var tahun2 = $('#tahun2').val()
			var	jk = $('#jk').val()
			console.log(penyakit)
			var url_filter = `http://localhost:81/spm-new/laporan/tabelkuFilter/${penyakit}/${tahun1}/${tahun2}/${jk}`
			
			
			$('#tabelku').DataTable({
				
			
				dom: 'Bfrtip',
				buttons: [{
				extend: 'excelHtml5',
				header: true
				}],
	
		
				"ajax": {
					url : url_filter,
					type : 'GET'
				},
			});
		});

		$('#cari').click(function(){
			
			
			var penyakit = $('#penyakit_menular').val()
			var status = $('#status').val()
			var	jenis_kelamin = $('#jenis_kelamin').val()
			var kecamatan = $('#kecamatan').val()
			var kelurahan = $('#kelurahan').val()
			var tgl1 = $('#tgl1').val()
			var tgl2 = $('#tgl2').val()
			
			//console.log(penyakit)
			// if (penyakit == NULL){

			// }
			var url = `http://localhost:81/spm-new/laporan/myTabelFilter/${penyakit}/${status}/${tgl1}/${tgl2}`
			
			
			$('#tabelFilter').DataTable({
				
			
				dom: 'Bfrtip',
				buttons: [{
				extend: 'excelHtml5',
				header: true
				}],
	
		
				"ajax": {
					url : url,
					type : 'GET'
				},
			});
		});
		
	
	});
	</script>

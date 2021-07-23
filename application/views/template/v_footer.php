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

<!-- OPTIONAL SCRIPTS -->
<script src="<?= base_url()?>template/plugins/chart.js/Chart.min.js"></script>
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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.js" data-semver="1.9.4" data-require="datatables@*"></script>

<script>
		
  $(document).ready(function(){

		
			var table = $('#datatables').DataTable({
			
			dom: 'Bfrtip',
		
      buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],

			
			
			});
			
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
		

		




	//Initialize Select2 Elements
	$('.select2').select2()

	//Initialize Select2 Elements
	$('.select2bs4').select2({
		theme: 'bootstrap4'
	});

	

  });
</script>

	<script>
			$(document).ready(function() {
				// Untuk sunting
				//console.log("Hello, WOrld")
				$('#edit-data').on('show.bs.modal', function (event) {
					console.log("Hello, WOrld")
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
</body>
</html>

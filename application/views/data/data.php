
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Peta Penyakit Menular - Dinas Kesehatan Surakarta</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url()?>template/front/assets/img/favicon.png" rel="icon">
  <link href="<?= base_url()?>template/front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url()?>template/front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url()?>template/front/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url()?>template/front/assets/css/style.css" rel="stylesheet">
  
  <!-- map -->
  <link href="<?php echo base_url("assets/leaflet/leaflet.css"); ?>" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	

	<script src="http://code.jquery.com/jquery-2.0.3.min.js" data-semver="2.0.3" data-require="jquery"></script>
	<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables_themeroller.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table_jui.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_table.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
	<link href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/demo_page.css" rel="stylesheet" data-semver="1.9.4" data-require="datatables@*" />
	<link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
  

  <!-- =======================================================
  * Template Name: Medicio - v2.1.1
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<style type="text/css">
	.user{
		padding:5px;
		margin-bottom: 5px;
	}
	#peta { 
		height: 480px; 
	}
</style>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <i class="icofont-clock-time"></i> Senin - Jum'at, 8AM to 10PM
      </div>
      <div class="d-flex align-items-center">
        <i class="icofont-phone"></i> Call us - (0271) 642020
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo mr-auto"><img src="<?= base_url()?>template/front/assets/img/logo-dinkes.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
		<li class="active"><a href="<?= base_url('peta'); ?>">Beranda</a></li>
		<li class="drop-down" id="penyakit"><a href="">Data Penyakit</a>
          <ul>
					<?php
                                foreach ($value as $item){
                                  if($item['id_penyakit']){
                                ?>
																				<li><a href="<?= base_url() . 'peta/data_penyakit/' . $item['id_penyakit'] ?>" value="<?php echo $item['id_penyakit'];?>"><?php echo $item['nama_penyakit'];?></a></li>
                                        
                               
        
                                <?php
                                    }
                                }
                                ?>
          </ul>
        </li>

        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(<?= base_url()?>template/front/assets/img/covid.gif)">
          <div class="container">
            <h2><span>Data Penyakit <?= $penyakit->nama_penyakit ?> di Kota Surakarta</span></h2>
            
          </div>
        </div>

  
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
  </section><!-- End Hero -->
<main id="main">

	<!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
		
        <div class="row no-gutters">
		<div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-laboratory"></i>
              <span data-toggle="counter-up"><?= $all_data; ?></span>
              <p><strong>Total Konfirmasi</strong> </p>
              
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-award"></i>
              <span data-toggle="counter-up"><?= $sembuh; ?></span>
              <p><strong>Sembuh</strong></p> 
            </div>
          </div>
          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-patient-bed"></i>
              <span data-toggle="counter-up"><?= $dalam_perawatan; ?></span>
              <p><strong>Kasus Aktif (Dalam Perawatan)</strong> </p>
            </div>
          </div>
		  <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="icofont-doctor-alt"></i>
              <span data-toggle="counter-up"><?= $meninggal; ?></span>
              <p><strong>Meninggal</strong> </p>
            </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
	<!-- ======= covid Section ======= -->
    <section id="covid" class="covid">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
		<h2>Peta Sebaran Penyakit <?= $penyakit->nama_penyakit ?> Kota Surakarta </h2>
          <p>Data berikut merupakan akumulasi data pasien <?= $penyakit->nama_penyakit ?> di Kota Surakarta </p>
		  
        </div>
				<ul>
					<li> Data yang diambil adalah akumulasi data yang masuk di sistem hingga sekarang</li>
					<li> Seluruh data ditulis/ dihitung berdasarkan status terakhir pasien</li>
					<li> Data Total Terkonfirmasi dapat berubah menyesuaikan status terakhir pasien</li>
					<li> Klik bagian peta untuk melihat detail informasi</li>
              
        </ul>
						<br>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
			
				<form>
				<h6>Cari data pada kisaran tertentu: </h6>
					<label for="tahun_awal">Tanggal Mulai : </label>
					<input type="date" class="form-group" id="tahun_awal" name="tahun_awal" placeholder="Tanggal Mulai" value="" required>
					
					<label for="tahun_akhir">Tanggal Akhir: </label>
					<input type="date" class="form-group" id="tahun_akhir" name="tahun_akhir" placeholder="Tanggal Akhir" value="" required>
					<button type="button" name="search" id="search" >Cari</button>
					
				</form>
			<div class="col-md-12">
	  			<div id="peta"></div>
     	 	</div>
        </div>

      </div>
    </section><!-- End Departments Section onClick="window.location.reload();" -->
	<!-- ======= tabel Section ======= -->
    <section id="tabel" class="tabel">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
		<h2>Tabel Sebaran Penyakit <?= $penyakit->nama_penyakit ?> Kota Surakarta </h2>
          <p>Data berikut merupakan akumulasi data pasien <?= $penyakit->nama_penyakit ?> di Kota Surakarta </p>
		  
		<br>
		<br>	
       
		<table id="tabelku" class="table table-bordered table-striped" data-aos="fade-up">
		
			<thead>
				<tr><td>Kecamatan</td><td>Total </td><td>Sembuh</td><td>Meninggal</td><td>Aktif (Dalam Perawatan)</td></tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<br>
		<br>
		<!-- <form >
				<h5>Cari data pada parameter tertentu: </h5>
					<label for="tahun1">Tanggal Mulai : </label>
					&nbsp;
					<input type="date" class="form-group" id="tahun1" name="tahun1" placeholder="Tanggal Mulai" value="" required>
					&nbsp;
					<label for="tahun2">Tanggal Akhir : </label>
					&nbsp;
					<input type="date" class="form-group" id="tahun2" name="tahun2" placeholder="Tanggal Akhir" value="" required>
					&nbsp;
					<label for="jk"> Jenis Kelamin </label>
					&nbsp;
						<select name="jk" class="form-group" id="jk">
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
						&nbsp;
					<button type="button" class="form-group" name="submit" id="submit" > Cari</button>
					
				</form> -->
				<!-- <table id="tabelku-filter" class="table table-bordered table-striped" data-aos="fade-up">
		
			<thead>
				<tr><td>Kecamatan</td><td>Total </td><td>Sembuh</td><td>Meninggal</td><td>Aktif (Dalam Perawatan)</td></tr>
			</thead>
			<tbody>
			</tbody>
		</table> -->
			
       

      </div>
    </section><!-- End Departments Section onClick="window.location.reload();" -->
	<!-- ======= tabel Section ======= -->
    <section id="tabel" class="tabel">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
		<h2>Tabel Sebaran Penyakit <?= $penyakit->nama_penyakit ?> di seluruh Kelurahan Kota Surakarta</h2>
          <p>Data berikut merupakan akumulasi data pasien <?= $penyakit->nama_penyakit ?> </p>
		  
		<br>
		<br>	
       
		<table id="tabelku-detail" class="table table-bordered table-striped" data-aos="fade-up">
			<thead>
				<tr><td>Kelurahan</td><td>Total </td><td>Sembuh</td><td>Meninggal</td><td>Aktif (Dalam Perawatan)</td></tr>
			</thead>
			<tbody>
			</tbody>
		</table>
			
       

      </div>
    </section><!-- End Departments Section onClick="window.location.reload();" -->

</main><!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
			<h3>Dinas Kesehatan Surakarta</h3>
              <p>
								Jln.Jendral Sudirman No:2;<br>
								Telp. (0271) 632202 Fax. (0271) 632202<br>
								SURAKARTA 57111<br>
								Hubungi kami: dinaskesehatan@surakarta.go.id
              </p>
              <div class="social-links mt-3">
                <a href="https://twitter.com/DkkSurakarta" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.facebook.com/dinkessurakarta" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/dinkessurakarta/" class="instagram"><i class="bx bxl-instagram"></i></a>
                
              </div>
            </div>
          </div>

          
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Medicio</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medicio-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url()?>template/front/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url()?>template/front/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url()?>template/front/assets/js/main.js"></script>

  <script src="<?php echo base_url("assets/leaflet/leaflet.js"); ?>"></script>
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
		//penyakit = '<?= $penyakit->id_penyakit ?>'
		
		
		//let url = `http://localhost:81/spm-new/peta/tabelku/${penyakit}`
		let url = '<?= site_url('peta/tabelku/').$penyakit->id_penyakit  ?>'
		
    	$('#tabelku').DataTable({
			
		
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
	let url1 = '<?= site_url('peta/myTabel/').$penyakit->id_penyakit  ?>'
		
    	$('#tabelku-detail').DataTable({
			
		
			dom: 'Bfrtip',
			buttons: [{
			extend: 'excelHtml5',
			header: true
			}],
  
    
			"ajax": {
				url : url1,
				type : 'GET'
			},
    });

	$('#submit').click(function(){
		
		// var url = "<?= site_url('peta/tabelkuFilter/').$penyakit->id_penyakit ?>"
		// var tahun1 = $('#tahun1').val()
		// var	tahun2 = $('#tahun2').val()
		// var	jk = $('#jk').val()
		// var url_filter = url +'/'+tahun_awal+'/'+tahun_akhir+'/'+jk
		var penyakit = '<?= $penyakit->id_penyakit ?>'
		var tahun1 = $('#tahun1').val()
		var tahun2 = $('#tahun2').val()
		var	jk = $('#jk').val()
		var url_filter = `http://localhost:81/spm-new/peta/tabelkuFilter/${penyakit}/${tahun1}/${tahun2}/${jk}`
		
		
		$('#tabelku-filter').DataTable({
			
		
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
	
	});
	
	//menampilkan map
	var map = L.map('peta').setView([-7.5595759, 110.8541984], 13);
	var base_url ="<?= base_url() ?>";
	

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	//marker manual
	var myFeatureGroup = L.featureGroup().addTo(map).on("click", groupClick);
	var bangunanMarker;

	
	  
	function groupClick(event){
		
		alert("Clicked on marker" + event.layer.id);

	}
	//menggunakan geojson untuk menandai suatu daerah
	$.getJSON(base_url+"assets/geojson/solo.geojson", function(data){
		//untuk konfigurasi tampilan map mark atau multi polygon
		getLayer = L.geoJson(data, {
			style: function(feature, layer) {

				//membedakan multi polygon
				var id = feature.properties.id;
				if (id == 1){
					return { //daerah satu
						
							fillOpacity: 0.1,
							weight: 1,
							opacity: 1,
							color: "#f44242"
						};
				}else if(id == 2){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#6d96f7"
						};

				}else if(id == 3){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#faebd7"
						};
				}else if(id == 4){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#deb887"
						};
				}else if(id == 5){
					return { //daerah dua
							fillOpacity: 0.5,
							weight: 1,
							opacity: 1,
							color: "#ff7f50"
						};
					}

				
			},
			//untuk setiap bidang menambahkan layer
			onEachFeature: function(feature, layer){
				// mendapatkan kode
		
				var id_kec = parseFloat(feature.properties.id_kec);

				penyakit = '<?= $penyakit->nama_penyakit ?>'
			
				$.getJSON(`http://localhost:81/api-spm/api/countPenyakit?id_kec=${id_kec}&penyakit=${penyakit}`, function(data){
				var info_bidang ="<h4 style='text-align:center'> Akumulasi Data Pasien "+penyakit+" </br> </h4>"+"<h6 style='text-align:center'> </h6>";
				info_bidang+="<h5 style='text-align:center'>Data Kecamatan " + data.nama_kecamatan + "</h5>"
				info_bidang+="<hr size = '1px'> "
				info_bidang+="<h6>Jumlah Pasien di seluruh Kasus : " + data.data_all + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Aktif : " + data.data_aktif + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Sembuh : " + data.data_sembuh + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Meninggal : " + data.data_die + "</h6>"
				info_bidang+="<hr size = '1px'> "
				//dalam perawatan
				info_bidang+="<h6>Data Pasien Terkonfirmasi: Dirawat (Kasus Aktif) <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_lansia + "<br>"
				info_bidang+="<hr size = '1px'> "
				//sembuh
				info_bidang+="<br><h6>Data Pasien Terkonfirmasi: Sembuh <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_lansia + "<br>"
				//meninggal
				info_bidang+="<hr size = '1px'> "
				info_bidang+="<br><h6>Data Pasien Terkonfirmasi: Meninggal <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_lansia + "<br>"
				
				info_bidang+="<a href='<?=base_url()?>peta/detail_penyakit/'"+id_kec+"/"+penyakit+"'></a>";
				info_bidang+=`<div style='width:100%;text-align:center;margin-top:10px;'><a href='<?=base_url()?>peta/detail_penyakit/${id_kec}/<?= $penyakit->id_penyakit ?>'> Detail </a></div>`;
			
			
			
				layer.bindPopup(info_bidang, {
					maxHeight : 360,
					maxWidth : 460,
					closeButton : true,
					offset : L.point(0, -20)
				});

				layer.on('click', function(){
					layer.openPopup();
				});

			});
			$('#search').click(function(){	
				tahun_awal = $('#tahun_awal').val()
				tahun_akhir = $('#tahun_akhir').val()
				
				penyakit = '<?= $penyakit->nama_penyakit ?>'
				$.getJSON(`http://localhost:81/api-spm/api/countPenyakit?id_kec=${id_kec}&penyakit=${penyakit}&tahun_awal=${tahun_awal}&tahun_akhir=${tahun_akhir}`, function(data){
				var info_bidang ="<h4 style='text-align:center'> Akumulasi Data Pasien "+penyakit+" </br> </h4>"+"<h6 style='text-align:center'> ( " +tahun_awal + " hingga "+tahun_akhir +" )</h6>";
				info_bidang+="<h5 style='text-align:center'>Data Kecamatan " + data.nama_kecamatan + "</h5>"
				info_bidang+="<hr size = '1px'> "
				info_bidang+="<h6>Jumlah Pasien di seluruh Kasus : " + data.data_all + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Aktif : " + data.data_aktif + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Sembuh : " + data.data_sembuh + "</h6>"
				info_bidang+="<h6>Jumlah Pasien Meninggal : " + data.data_die + "</h6>"
				info_bidang+="<hr size = '1px'> "
				//dalam perawatan
				info_bidang+="<h6>Data Pasien Terkonfirmasi: Dirawat (Kasus Aktif) <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_aktif_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_aktif_lansia + "<br>"
				info_bidang+="<hr size = '1px'> "
				//sembuh
				info_bidang+="<br><h6>Data Pasien Terkonfirmasi: Sembuh <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_sembuh_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_sembuh_lansia + "<br>"
				//meninggal
				info_bidang+="<hr size = '1px'> "
				info_bidang+="<br><h6>Data Pasien Terkonfirmasi: Meninggal <br></h6> "
				
				info_bidang+="<b>Balita ( 0-5 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_balita + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_balita + "<br>"
				info_bidang+="<b>Anak-anak ( 6-12 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_anak + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_anak + "<br>"
				info_bidang+="<b>Remaja ( 13-24 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_remaja + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_remaja + "<br>"
				info_bidang+="<b>Dewasa ( 25-45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_dewasa + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_dewasa + "<br>"
				info_bidang+="<b>Lansia( >45 tahun) </b><br> "
				info_bidang+="Perempuan : " + data.pr_die_lansia + "<br>"
				info_bidang+="Laki-laki : " + data.lk_die_lansia + "<br>"
				
				
			
				layer.bindPopup(info_bidang, {
					maxHeight : 360,
					maxWidth : 460,
					closeButton : true,
					offset : L.point(0, -20)
				});

				layer.on('click', function(){
					layer.openPopup();
				});

			});
				})

				

				
			}

		}).addTo(map);
    });




	

	
    
  </script>
  

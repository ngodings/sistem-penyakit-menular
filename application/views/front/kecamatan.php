
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
	#solo { 
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
          <li class="active"><a href="">Beranda</a></li>
          <li><a href="#covid">COVID-19</a></li>
          <li><a href="#tbc">TBC</a></li>
          <li><a href="#ims">IMS</a></li>
          <li><a href="#diare">Diare</a></li>
		  <li><a href="#dbd">DBD</a></li>
          <!-- <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Deep Drop Down</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
          </ul>
        </li> -->
          <li><a href="#contact">Contact</a></li>

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
        <div class="carousel-item active" style="background-image: url(<?= base_url()?>template/front/assets/img/slide/slide-2.jpg)">
          <div class="container">
            <h2> <span>Data Penyakit Menular </span></h2>
            
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
	<!-- ======= covid Section ======= -->
    <section id="covid" class="covid">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Penyakit COVID-19</h2>
          <p>Berikut </p>
		  
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
			<div class="col-md-12">
	  			<div id="solo"></div>
     	 	</div>
        </div>

      </div>
    </section><!-- End Departments Section -->

</main><!-- End #main -->


<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Medicio</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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



  <script type="text/javascript">
		var map = L.map('solo').setView([-7.5595759, 110.8541984], 13);
		var base_url ="<?= base_url() ?>";
		var id_kecamatan ="<?=$id_kec?>";
		

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		$.getJSON(base_url+"assets/geojson/solo.geojson", function(data){
		//untuk konfigurasi tampilan map mark atau multi polygon
		getLayer = L.geoJson(data, {
			style: function(feature, layer) {
				

				//membedakan multi polygon
				var id_kec = feature.properties.id_kec;
				if (id_kec == id_kecamatan){
					return{
						fillOpacity: 0.8,
						fillColor: "",
						weight: 1,
						opacity: 1,
						color: "#ff3333"

					};

				}else {
					return { //daerah dua
							fillOpacity: 0.0,
							weight: 1,
							opacity: 1,
							color: "#6d96f7"
						};

				}
				

				
			}
			// //untuk setiap bidang menambahkan layer
			// onEachFeature: function(feature, layer){
			// 	// mendapatkan kode
			// 	var id_kec = feature.properties.id_kec;
			// 	var long = parseFloat(feature.properties.longitude);
			// 	var latt = parseFloat(feature.properties.latitude);
			// 	//untuk memfokuskan daerah
			// 	if (id_kec == id_kec){
			// 		map.flyTo([long, latt], 14, {
			// 			animate: true,
			// 			duration: 2
			// 		});

			// 		//membuat tanda marker agar dapat di tengah plotygon
			// 		var center = getCenteroid(feature.geometry.coordinates[0]);
			// 		L.marker([center[1],center[0]]).addTo(map);
			// 		//dibalik jadi 0 latitude
			// 	}
				
			// }

		}).addTo(map);
	}); 
	
	//agar marker di tengah polygon
	var getCenteroid = function (coord)
	{
		var center = coord.reduce(function (x,y){
			return [x[0] + y[0]/coord.length, x[1] + y[1]/coord.length]
		}, [0,0])
		return center;
	}

	</script>
  
  


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

      <a href="" class="logo mr-auto"><img src="<?= base_url()?>template/front/assets/img/logo-dinkes.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo mr-auto"><a href="index.html">Medicio</a></h1> -->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
				<li class="active"><a href="<?= base_url('peta'); ?>">Beranda</a></li>
          <li><a href="<?= base_url('peta/data'); ?>">COVID-19</a></li>
          <li><a href="<?= base_url('peta/tbc'); ?>">TBC</a></li>
          <li><a href="<?= base_url('peta/ims'); ?>">IMS</a></li>
          <li><a href="<?= base_url('peta/diare'); ?>">Diare</a></li>
		  		<li><a href="<?= base_url('peta/dbd'); ?>">DBD</a></li>
         
        </ul>
      </nav><!-- .nav-menu -->

      <!-- <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a> -->

    </div>
  </header><!-- End Header -->

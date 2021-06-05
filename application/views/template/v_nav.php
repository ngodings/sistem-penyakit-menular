<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url()?>template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?= base_url ('home')?>" class="nav-link">
              <i class="nav-icon fas fa-globe"></i>
              <p>
                View Maps
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          
          <li class="nav-header">Data Penting</li>
          <li class="nav-item">
            <a href="<?= base_url('Pasien') ?>" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Pasien
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Penyakit') ?>" class="nav-link">
              <i class="nav-icon far fa-file"></i>
              <p>
                Penyakit
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Medis') ?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Rekam Medik
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
			<div class="col-lg-6">

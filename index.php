<?php

/** Import module */
session_start();
include_once 'util/ConnectionUtil.php';
include_once 'entity/Dosen.php';
include_once 'entity/Detail.php';
include_once 'entity/Prodi.php';
include_once 'entity/Matkul.php';
include_once 'entity/Jadwal.php';
include_once 'entity/JadwalHasAsisten.php';
include_once 'entity/Semester.php';
include_once 'entity/Ruangan.php';
include_once 'entity/Asisten.php';
include_once 'entity/Role.php';

include_once 'dao/DosenDaoImpl.php';
include_once 'dao/DetailDaoImpl.php';
include_once 'dao/ProdiDaoImpl.php';
include_once 'dao/SemesterDaoImpl.php';
include_once 'dao/JadwalDaoImpl.php';
include_once 'dao/JadwalHasAsistenDaoImpl.php';
include_once 'dao/RoleDaoImpl.php';

include_once 'controller/DosenController.php';
include_once 'controller/DetailController.php';
include_once 'controller/ProdiController.php';
include_once 'controller/SemesterController.php';
include_once 'controller/JadwalController.php';
include_once 'controller/JadwalHasAsistenController.php';



/** If user hasn't login, then web_is_logged = false */
if (!isset($_SESSION['web_is_logged'])) {
    $_SESSION['web_is_logged'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Attendance Website</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php
    /** If user has login, then web_is_logged = true */
    if ($_SESSION['web_is_logged']) {
    ?>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="?webmenu=home" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="?webmenu=logout" class="nav-link">Logout</a>
            </li>
        </ul>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>

            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index.php" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="IT Maranatha" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">IT Maranatha</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $_SESSION['web_full_name']; ?></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./index.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Home</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="?webmenu=form" class="nav-link active">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Form
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="display: none;">
                            <li class="nav-item">
                                <a href="?webmenu=form" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Form Detail</p>
                                </a>
                            </li>
                            <?php
                            if ($_SESSION['web_role'] == 1) {
                                ?>
                                <li class="nav-item">
                                    <a href="?webmenu=dosen-form" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Dosen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?webmenu=prodi-form" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Prodi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?webmenu=semester-form" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Semester</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?webmenu=jadwal-form" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Form Jadwal</p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview" style="display: none;">
                            <?php
                            if ($_SESSION['web_role'] == 1) {
                                ?>
                                <li class="nav-item">
                                    <a href="?webmenu=dosen" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dosen</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?webmenu=prodi" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Prodi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="?webmenu=semester" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Semester</p>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a href="?webmenu=jadwal" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Jadwal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="?webmenu=asisten" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Asisten</p>
                                </a>
                            </li>
                        </ul>
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
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <?php
            $menu = filter_input(INPUT_GET, 'webmenu');
            switch ($menu) {
                case 'home':
                    $detailController = new DetailController();
                    $detailController->index();
                    break;
                case 'form':
                    $detailController = new DetailController();
                    $detailController->addDetail();
                    break;
                case 'dosen':
                    $dosenController = new DosenController();
                    $dosenController->tampilDosen();
                    break;
                case 'prodi':
                    $prodiController = new ProdiController();
                    $prodiController->index();
                    break;
                case 'semester':
                    $semesterController = new SemesterController();
                    $semesterController->index();
                    break;
                case 'jadwal':
                    $jadwalController = new JadwalController();
                    $jadwalController->index();
                    break;
                case 'asisten':
                    $jadwalHasAsistenController = new JadwalHasAsistenController();
                    $jadwalHasAsistenController->index();
                    break;
                case 'dosen-form':
                    $dosenController = new DosenController();
                    $dosenController->addDosen();
                    break;
                case 'prodi-form':
                    $prodiController = new ProdiController();
                    $prodiController->addProdi();
                    break;
                case 'semester-form':
                    $semesterController = new SemesterController();
                    $semesterController->addSemester();
                    break;
                case 'jadwal-form':
                    $jadwalController = new JadwalController();
                    $jadwalController->addJadwal();
                    break;
                case 'logout';
                    session_unset();
                    session_destroy();
                    header('location:index.php');
                    break;
                default;
                    $detailController = new DetailController();
                    $detailController->index();
            }
            } else {
                $dosenController = new DosenController();
                $dosenController->index();
            }
            ?>
            <!-- <div class="container-fluid"> -->
            <!-- <div class="row"> -->
            <!-- <div class="col-lg-6"> -->
            <!-- /.card -->
            <!-- </div> -->
            <!-- /.col-md-6 -->
            <!-- </div> -->
            <!-- /.row -->
            <!-- </div> -->
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <!-- <aside class="control-sidebar control-sidebar-dark"> -->
    <!-- Control sidebar content goes here -->
    <!-- </aside> -->
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <!-- <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="#">itmaranatha.com</a>.</strong>
      All rights reserved.
    </footer> -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>
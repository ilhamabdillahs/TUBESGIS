<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <!-- Meta, title, CSS, favicons, etc. -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>Penginapan KOTA PALU </title>

   <!-- Bootstrap -->
   <link href="assets/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link href="assets/gentelella-master/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <!-- NProgress -->
   <link href="assets/gentelella-master/vendors/nprogress/nprogress.css" rel="stylesheet">
   <!-- iCheck -->
   <link href="assets/gentelella-master/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
   <!-- bootstrap-wysiwyg -->
   <link href="assets/gentelella-master/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
   <!-- Select2 -->
   <link href="assets/gentelella-master/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
   <!-- Switchery -->
   <link href="assets/gentelella-master/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
   <!-- starrr -->
   <link href="assets/gentelella-master/vendors/starrr/dist/starrr.css" rel="stylesheet">
   <!-- bootstrap-daterangepicker -->
   <link href="assets/gentelella-master/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
   

   <!-- Custom Theme Style -->
   <link href="assets/gentelella-master/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
   <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                  <a href="indexadmin.php" class="site_title"><img src="img/mountains.png" width="40" height="40"><span>  PENGINAPAN</span></a>
               </div>

               <div class="clearfix"></div>
 

               <br />

               <!-- sidebar menu -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                     <ul class="nav side-menu">
                        <li><a href="indexadmin.php"><i class="fa fa-home"></i>Home</a></li>
                        <hr>
                        <li><a><i class="fa fa-bar-chart-o"></i>Penginapan<span class="fa fa-chevron-down"></span></a>
                           <ul class="nav child_menu">
                              <li><a href="pemetaan.php">Pemetaan</a></li>
                              <li><a href="tambah_kec.php">Tambah Kecamatan</a></li>
                              <li><a href="tambah_peng.php">Tambah Penginapan</a></li>
                              <li><a href="data_penginapan.php">Data Penginapan</a></li>
                           </ul>
                        </li>
                        <hr>
                        <li><a href="login.php"><img src="img/logout.png" alt="" width="25" height="25"> LogOut</a></li>
                     </ul>
                  </div>
               </div>
               <!-- /sidebar menu -->
            </div>
         </div>

         <!-- top navigation -->
         <div class="top_nav">
            <div class="nav_menu">
               <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
         </div>
         <!-- /top navigation -->

<!-- ====== library leaflet ====== -->
<link rel="stylesheet" href="assets/leaflet/leaflet.css">
    <script src="assets/leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.css">
    <script src="assets/leaflet/leaflet-panel-layers/src/leaflet-panel-layers.js"></script>
    <!-- leaflet draw -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw-src.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
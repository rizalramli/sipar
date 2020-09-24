<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Blank Page</title>
    <!-- Bootstrap core CSS-->
    <link href="backend/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="backend/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="backend/template/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="backend/template/css/sb-admin.css" rel="stylesheet">
    <link href="backend/template/css/bootstrap-imageupload.css" rel="stylesheet">
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
      </ul>

    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li <?php if($_GET['/'] == "dashboard"){echo "class='nav-item active'";}
          else {echo"class='nav-item'";}
          ?>>
          <a class="nav-link" href="?/=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li <?php if($_GET['/'] == "wisata_tampil"){echo "class='nav-item active'";}
          else if($_GET['/'] == "wisata_input"){echo "class='nav-item active'";}
          else if($_GET['/'] == "wisata_edit"){echo "class='nav-item active'";}
          else if($_GET['/'] == "akomodasi"){echo "class='nav-item active'";}
          else {echo"class='nav-item'";}
          ?>>
          <a class="nav-link" href="?/=wisata_tampil">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Wisata</span></a>
          </li>
          <li <?php if($_GET['/'] == "kuliner_tampil"){echo "class='nav-item active'";}
            else if($_GET['/'] == "kuliner_input"){echo "class='nav-item active'";}
            else if($_GET['/'] == "kuliner_edit"){echo "class='nav-item active'";}
            else if($_GET['/'] == "menu_kuliner"){echo "class='nav-item active'";}
            else {echo"class='nav-item'";}
            ?>>
            <a class="nav-link" href="?/=kuliner_tampil">
              <i class="fas fa-fw fa fa-utensils"></i>
              <span>Kuliner</span></a>
            </li>
            <li <?php if($_GET['/'] == "event_tampil"){echo "class='nav-item active'";}
              else if($_GET['/'] == "event_input"){echo "class='nav-item active'";}
              else if($_GET['/'] == "eventEdit"){echo "class='nav-item active'";}
              else {echo"class='nav-item'";}
              ?>>
              <a class="nav-link" href="?/=event_tampil">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Event</span></a>
              </li>
              <li <?php if($_GET['/'] == "jadwal_transportasiTampil"){echo "class='nav-item active'";}
                else if($_GET['/'] == "jadwal_transportasiInput"){echo "class='nav-item active'";}
                else if($_GET['/'] == "jadwalEdit"){echo "class='nav-item active'";}
                else {echo"class='nav-item'";}
                ?>>
                <a class="nav-link" href="?/=jadwal_transportasiTampil">
                  <i class="fas fa-fw fa-table"></i>
                  <span>Jadwal Transportasi</span></a>
                </li>
                <li <?php if($_GET['/'] == "paket_wisataTampil"){echo "class='nav-item active'";}
                  else if($_GET['/'] == "paket_wisataInput"){echo "class='nav-item active'";}
                  else if($_GET['/'] == "paket_wisataEdit"){echo "class='nav-item active'";}
                  else {echo"class='nav-item'";}
                  ?>>
                  <a class="nav-link" href="?/=paket_wisataTampil">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Paket Wisata</span></a>
                  </li>
                  <li <?php if($_GET['/'] == "kategoriWisata_tampil"){echo "class='nav-item dropdown active'";}
                    else if($_GET['/'] == "kategoriWisata_input"){echo "class='nav-item dropdown active'";}
                    else if($_GET['/'] == "kategoriWisata_edit"){echo "class='nav-item dropdown active'";}
                    else if($_GET['/'] == "kategoriKuliner_tampil"){echo "class='nav-item dropdown active'";}
                    else if($_GET['/'] == "kategoriKulinerInput"){echo "class='nav-item dropdown active'";}
                    else if($_GET['/'] == "kategori_kulinerEdit"){echo "class='nav-item dropdown active'";}
                    else {echo"class='nav-item dropdown'";}
                    ?>>
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-fw fa-folder"></i>
                      <span>Kategori</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                      <a class="dropdown-item" href="?/=kategoriWisata_tampil">Kategori Wisata</a>
                      <a class="dropdown-item" href="?/=kategoriKuliner_tampil">Kategori Kuliner</a>
                    </div>
                  </li>
                  <li <?php if($_GET['/'] == "tentang_tampil"){echo "class='nav-item active'";}
                    else if($_GET['/'] == "Tentang_input"){echo "class='nav-item active'";}
                    else if($_GET['/'] == "Tentang_edit"){echo "class='nav-item active'";}
                    else {echo"class='nav-item'";}
                    ?>>
                    <a class="nav-link" href="?/=tentang_tampil">
                      <i class="fas fa-fw fa-chart-area"></i>
                      <span>Tentang</span></a>
                    </li>
                    <li <?php if($_GET['/'] == "userTampil"){echo "class='nav-item active'";}
                      else if($_GET['/'] == "inputUser"){echo "class='nav-item active'";}
                      else if($_GET['/'] == "User_edit"){echo "class='nav-item active'";}
                      else {echo"class='nav-item'";}
                      ?>>
                      <a class="nav-link" href="?/=userTampil">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>User</span></a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" href="?/=kategori_wisatax">
                          <i class="fas fa-fw fa-chart-area"></i>
                          <span>XKategori</span></a>
                        </li> -->
                        <li <?php if($_GET['/'] == "bantuanTampil"){echo "class='nav-item active'";}
                          else {echo"class='nav-item'";}
                          ?>>
                          <a class="nav-link" href="?/=bantuanTampil">
                            <i class="fas fa-fw fa-chart-area"></i>
                            <span>Bantuan</span></a>
                          </li>
                        </ul>
                        <div id="content-wrapper">
                          <div class="container-fluid">
                            <?php
                            error_reporting(0);
                            require 'koneksi/koneksi.php';
                            if($_GET['/']){
                            include 'backend/'.$_GET['/'].'.php';
                            include 'backend/wisata/'.$_GET['/'].'.php';
                            include 'backend/kuliner/'.$_GET['/'].'.php';
                            include 'backend/event/'.$_GET['/'].'.php';
                            include 'backend/jadwal_transportasi/'.$_GET['/'].'.php';
                            include 'backend/paket_wisata/'.$_GET['/'].'.php';
                            include 'backend/kategori_wisata/'.$_GET['/'].'.php';
                            include 'backend/kategori_kuliner/'.$_GET['/'].'.php';
                            include 'backend/tentang/'.$_GET['/'].'.php';
                            include 'backend/user/'.$_GET['/'].'.php';
                            include 'backend/xmodal_kategori/'.$_GET['/'].'.php';
                            }
                            ?>
                          </div>
                          <!-- /.container-fluid -->
                          <!-- Sticky Footer -->
                        </div>
                        <!-- /.content-wrapper -->
                      </div>
                      <!-- /#wrapper -->
                      <!-- Scroll to Top Button-->
                      <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                      </a>
                      <!-- Logout Modal-->
                      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                              <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Bootstrap core JavaScript-->
                      <script src="backend/template/vendor/jquery/jquery.min.js"></script>
                      <script src="backend/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                      <!-- Core plugin JavaScript-->
                      <script src="backend/template/vendor/jquery-easing/jquery.easing.min.js"></script>
                      <!-- Custom scripts for all pages-->
                      <script src="backend/template/js/sb-admin.min.js"></script>
                      <script src="backend/template/vendor/datatables/jquery.dataTables.js"></script>
                      <script src="backend/template/vendor/datatables/dataTables.bootstrap4.js"></script>
                      <script src="backend/template/js/demo/datatables-demo.js"></script>
                    </body>
                  </html>
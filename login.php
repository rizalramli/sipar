<?php
include 'koneksi/koneksi.php';

session_start();
 
// menghubungkan dengan koneksi
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

$data2 = mysqli_fetch_array($data);

 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
  $_SESSION['username'] = "login";
  header("location:backend.php?/=dashboard");
}else{
  header("location:login.php");
}
}
 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="backend/template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="font-awesome/fontawesome-all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="backend/template/css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-light">
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputText" name="username" class="form-control" placeholder="Masukan Username" required="required" autofocus="autofocus">
                <label for="inputText">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div><br>
            <button type="submit" name="login" class="btn btn-primary btn-block mb-2">Login</button>
            <a class="btn btn-danger btn-block" href="index.php"><i class="fa fa-undo-alt"></i> Kembali</a>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="backend/template/vendor/jquery/jquery.min.js"></script>
    <script src="backend/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="backend/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>
</html>
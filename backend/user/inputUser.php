<?php 
if (isset($_POST['simpan'])) {
$username = $_POST['user1'];
$password = $_POST['psw'];
$query=mysqli_query($koneksi,"INSERT INTO user VALUES ('','$username','$password')" );

if ($query == true) {
  echo "<script>window.location = 'backend.php?/=userTampil'</script>";
}
}
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input User</li>
</ol>  
<a href="?/=userTampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Username</b></label>
      <input type="text" name="user1" class="form-control" id="inputText" placeholder="Masukkan Username" required >
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Password</b></label>
      <input type="text" name="psw" class="form-control" id="inputText" placeholder="Masukkan Password" required >
    </div>
  </div>
    
 
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>


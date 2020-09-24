<?php 
if(isset($_POST['simpan'])){
  $nama1 = $_POST['nama1'];
  $email = $_POST['email'];
  $des = $_POST['des'];
$query = mysqli_query($koneksi, " INSERT INTO pesan_bantuan VALUES ('','$nama1','$email', '$des') ");
if($query){
  echo "<script>window.location = 'backend.php?/=bantuanTampil'</script>";
        }
}


 ?>
 <ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input Bantuan</li>
</ol>  
<a href="?/=bantuanTampil"><button class="btn btn-success"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>nama</b></label>
      <input type="text" name="nama1" class="form-control" id="inputText" placeholder="masukan nama anda" required="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>email</b></label>
      <input type="text" name="email" class="form-control" id="inputText" placeholder="" required >
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputText"><b>Deskripsi</b></label>
      <textarea class="form-control" name="des" placeholder="Masukan deskripsi . . . . " id="exampleFormControlTextarea1" rows="7" required ></textarea>
    </div>
  </div>
  
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form><br>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
    <script src="backend/template/js/bootstrap.min.js"></script>
    <script src="backend/template/js/bootstrap-imageupload.js"></script>

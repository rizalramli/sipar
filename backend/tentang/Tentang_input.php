<!-- Breadcrumbs-->
<?php
if (isset($_POST['simpan'])){
  $tentang = $_POST['tentang'];
  $deskrip = $_POST['deskrip'];

  $query = mysqli_query($koneksi,"INSERT INTO tentang VALUES ('','$tentang','$deskrip')");
  if($query){
        echo "<script>window.location = 'backend.php?/=Tentang_tampil'</script>";
        }

} 
?> 
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tentang</li>
</ol>  
<a href="?/=Tentang_tampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Nama</b></label>
      <input type="text" name="tentang" class="form-control" id="inputText" required >
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Deskripsi</b></label>
      <input type="text" name="deskrip" class="form-control" id="inputText" placeholder="Masukan kategori wisata" required >
    </div>
  </div>
    
 
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
    <script src="backend/template/js/bootstrap.min.js"></script>
    <script src="backend/template/js/bootstrap-imageupload.js"></script>

   

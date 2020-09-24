<?php
if (isset($_POST['simpan'])) {
  $kode = $_POST['kodee'];
  $kategori = ucwords($_POST['kategorii']);

  $query = mysqli_query($koneksi,"INSERT INTO kategori_kuliner (id_kategoriKuliner,nama_kategori) VALUES ('$kode','$kategori')");
   if($query){
        echo "<script>window.location = 'backend.php?/=kategoriKuliner_tampil'</script>";
        }
}

?>

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input Kuliner</li>
</ol>  
<a href="?/=kategoriKuliner_tampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kode</b></label>
      <input type="text" name="kodee" class="form-control" id="inputText" placeholder="Masukan kategori kuliner" value="<?php echo kode('id_kategoriKuliner','kategori_kuliner',3,'KK') ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kategori Kuliner</b></label>
      <input type="text" name="kategorii" class="form-control" id="inputText" placeholder="Masukan kategori wisata">
    </div>
  </div>
    
 
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
    <script src="backend/template/js/bootstrap.min.js"></script>
    <script src="backend/template/js/bootstrap-imageupload.js"></script>

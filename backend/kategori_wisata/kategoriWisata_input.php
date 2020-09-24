<!-- Breadcrumbs-->

<?php
if (isset($_POST['simpan'])) {
  $kode = $_POST['kode'];
  $kategori = ucwords($_POST['kategori']);

  $query = mysqli_query($koneksi,"INSERT INTO kategori_wisata (id_kategoriWisata,nama_kategori) VALUES ('$kode','$kategori') ");
   if($query){
        echo "<script>window.location = 'backend.php?/=kategoriWisata_tampil'</script>";
        }
}

?>

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input Wisata</li>
</ol>  
<a href="?/=kategoriWisata_tampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kode</b></label>
      <input type="text" name="kode" class="form-control" id="inputText" placeholder="Masukan kategori wisata" value="<?php echo kode('id_kategoriWisata','kategori_wisata',3,'KW') ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kategori Wisata</b></label>
      <input type="text" name="kategori" class="form-control" id="inputText" placeholder="Masukan kategori wisata" required >
    </div>
  </div>
    
 
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
    <script src="backend/template/js/bootstrap.min.js"></script>
    <script src="backend/template/js/bootstrap-imageupload.js"></script>

   

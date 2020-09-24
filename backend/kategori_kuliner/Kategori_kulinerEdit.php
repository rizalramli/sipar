<?php
  $id=$_GET['id'];
  $query=mysqli_query($koneksi,"SELECT * FROM kategori_kuliner WHERE id_kategoriKuliner='$id'");
  $data=mysqli_fetch_array($query);

if (isset($_POST['update'])){
  $kode = $_POST['kodeee'];
  $kategori = ucwords($_POST['kategoriii']);

  $query3 = mysqli_query($koneksi, "UPDATE kategori_kuliner SET id_kategoriKuliner='$kode', nama_kategori='$kategori' WHERE id_kategoriKuliner='$id'");
   if($query3){
        echo "<script>window.location = 'backend.php?/=kategoriKuliner_tampil'</script>";
        }
}

?>



<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Kuliner</li>
</ol>  
<a href="?/=kategoriKuliner_tampil"><button class="btn btn-success"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kode</b></label>
      <input type="text" name="kodeee" class="form-control" id="inputText" placeholder="Masukan kategori kuliner" value="<?= $data[0] ?>" readonly >
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kategori Wisata</b></label>
      <input type="text" name="kategoriii" class="form-control" id="inputText" placeholder="Masukan kategori kuliner" value=" <?= $data[1] ?>">
    </div>
  </div>
    
 
  <button type="submit" name="update" class="btn btn-primary">Simpan</button>
</form>

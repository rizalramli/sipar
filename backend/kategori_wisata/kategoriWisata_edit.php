<?php
	$id=$_GET['id'];
	$query=mysqli_query($koneksi,"SELECT * FROM kategori_wisata WHERE id_kategoriWisata='$id'");
	$data=mysqli_fetch_array($query);

if (isset($_POST['update'])){
	$kode = $_POST['kode'];
	$kategori = ucwords($_POST['kategori']);

	$query2 = mysqli_query($koneksi, "UPDATE kategori_wisata SET id_kategoriWisata='$kode', nama_kategori='$kategori' WHERE id_kategoriWisata='$id'");
	 if($query2){
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
      <input type="text" name="kode" class="form-control" id="inputText" placeholder="Masukan kategori wisata" value="<?= $data['id_kategoriWisata'] ?>" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Kategori Wisata</b></label>
      <input type="text" name="kategori" class="form-control" id="inputText" placeholder="Masukan kategori wisata" value=" <?= $data['nama_kategori'] ?>">
    </div>
  </div>
    
 
  <button type="submit" name="update" class="btn btn-primary">Simpan</button>
</form>

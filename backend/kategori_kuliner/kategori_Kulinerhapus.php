
<?php 
$id = $_GET['id'];
$query=mysqli_query($koneksi, "DELETE FROM kategori_kuliner WHERE id_kategoriKuliner='$id'");
	if ($query){
		    echo "<script>window.location = 'backend.php?/=kategoriKuliner_tampil'</script>";
        }


 ?>

<?php
$id=$_GET['id'];
$query=mysqli_query($koneksi," DELETE FROM kategori_wisata WHERE id_kategoriWisata='$id'");

 if($query){
        echo "<script>window.location = 'backend.php?/=kategoriWisata_tampil'</script>";
    }
?>
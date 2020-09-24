<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tentang WHERE id_tentang= '$id'");
if($query){
		echo "<script>window.location = 'backend.php?/=Tentang_tampil'</script>";
        }

 ?>

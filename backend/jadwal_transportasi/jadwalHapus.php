<?php
$id = $_GET['id'];
$query=mysqli_query($koneksi, "DELETE FROM jadwal_transportasi WHERE id_jadwal='$id'");
	if ($query){
		    echo "<script>window.location = 'backend.php?/=jadwal_transportasiTampil'</script>";
        }  

	


?>

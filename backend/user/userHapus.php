<?php
$id = $_GET['id'];
$query=mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id'");
	if ($query){
		    echo "<script>window.location = 'backend.php?/=userTampil'</script>";
        }  

?>

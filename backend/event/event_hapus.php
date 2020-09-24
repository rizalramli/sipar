<?php
$id=$_GET['id'];
$query=mysqli_query($koneksi," DELETE FROM event WHERE id_event='$id'");

 if($query){
        echo "<script>window.location = 'backend.php?/=event_tampil'</script>";
    }
?>
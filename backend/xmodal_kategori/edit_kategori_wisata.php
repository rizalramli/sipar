<?php
	include '../../koneksi/koneksi.php';
	$id = $_POST['id'];
	$query = mysqli_query($koneksi,"SELECT * FROM kategori_wisata WHERE id_kategoriWisata='$id'");
	foreach($query as $data){
?>
<div class="form-row">
	<div class="col-md-6 form-group">
	  <label for="inputID">ID Kategori Wisata</label>
	  <input type="text" name="id" id="inputID" class="form-control" value="<?php echo $data['id_kategoriWisata'] ?>" readonly>
	</div>
	<div class="col-md-6 form-group">
	  <label for="inputNama">Nama Kategori Wisata</label>
	  <input type="text" name="nama" id="inputNama" class="form-control" value="<?php echo $data['nama_kategori'] ?>">
	</div>
</div>

<?php } ?>
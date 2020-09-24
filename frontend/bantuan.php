<?php 
if (isset($_POST['simpan'])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$pesan = $_POST['pesan'];

	$query = mysqli_query($koneksi,"INSERT INTO pesan_bantuan VALUES ('','$nama','$email','$pesan')");
	if ($query) {
        echo "<script>window.location = '?halaman=bantuan'</script>";
	}
}
 ?>
<div class="jarak-content">
	<h2 class="text-center">Contact Us</h2>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<form method="POST" action="">
				  <div class="form-group">
				    <label for="inputnama">Nama*</label>
				    <input type="text" class="form-control" name="nama" id="inputnama" placeholder="name@example.com">
				  </div>
				  <div class="form-group">
				    <label for="inputemail">Email*</label>
				    <input type="email" class="form-control" name="email" id="inputemail" placeholder="name@example.com">
				  </div>
				  <div class="form-group">
				    <label for="textarea">Pesan*</label>
				    <textarea class="form-control" id="textarea" name="pesan" rows="6"></textarea>
				  </div>
				  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>


<?php
if (isset($_POST['simpan'])) {
$id = $_POST['id_paket'];
$nama = ucwords($_POST['nama']); // awal kata huruf kapital
$harga = $_POST['harga'];
//gambar profil
$gbr = $_FILES['gbr']['name'];
$file_tmp = $_FILES['gbr']['tmp_name'];
//gambar_detail
move_uploaded_file($file_tmp, "asset/img/paket_wisata/".$gbr);
$query = mysqli_query($koneksi,"INSERT INTO paket_wisata VALUES('$id','$nama','$gbr','$harga')");
if($query){
echo "<script>window.location = 'backend.php?/=paket_wisataTampil'</script>";
}else{
echo 'Gagal Insert';
}
}
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input Event</li>
</ol>
<a href="?/=paket_wisataTampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>
<form action="" method="post" enctype="multipart/form-data"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Nama Paket</b></label>
      <input type="hidden" name="id_paket" value="<?php echo kode('id_paket','paket_wisata',3,'PW') ?>">
      <input type="text" name="nama" class="form-control" id="inputText" placeholder="Masukan nama" required >
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Tanggal Event</b></label>
      <input type="text" name="harga" class="form-control">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <div class="imageupload">
        <label for="inputText"><b>Gambar Profil</b></label>
        
        <div class="file-tab panel-body">
          <div class="btn btn-warning btn-file">
            <span>Browse</span>
            <input type="file" name="gbr">
          </div>
          <button type="button" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </div>
    <div class="form-group col-md-6 mt-4">
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </div>
  </div>
  
</form><br>
<script src="backend/template/js/jquery-1.12.4.min.js"></script>
<script src="backend/template/js/bootstrap.min.js"></script>
<script src="backend/template/js/bootstrap-imageupload.js"></script>
<script>
var $imageupload = $('.imageupload');
$imageupload.imageupload();
</script>
<script language="javascript" type="text/javascript">
window.onload = function () {
var fileUpload = document.getElementById("fileupload");
fileUpload.onchange = function () {
if (typeof (FileReader) != "undefined") {
var dvPreview = document.getElementById("dvPreview");
dvPreview.innerHTML = "";
var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
for (var i = 0; i < fileUpload.files.length; i++) {
var file = fileUpload.files[i];
if (regex.test(file.name.toLowerCase())) {
var reader = new FileReader();
reader.onload = function (e) {
var img = document.createElement("IMG");
img.height = "150";
img.width = "219";
img.src = e.target.result;
dvPreview.appendChild(img);
}
reader.readAsDataURL(file);
} else {
alert(file.name + " is not a valid image file.");
dvPreview.innerHTML = "";
return false;
}
}
} else {
alert("This browser does not support HTML5 FileReader.");
}
}
};
</script>

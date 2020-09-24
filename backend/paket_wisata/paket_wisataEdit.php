<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM paket_wisata WHERE id_paket='$id'");
$data = mysqli_fetch_array($query);
if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $gbr = $_FILES['gbr']['name'];
$file_tmp = $_FILES['gbr']['tmp_name'];
//gambar_detail
move_uploaded_file($file_tmp, "asset/img/paket_wisata/".$gbr);
if ($gbr == "") {
  $query2 = mysqli_query($koneksi,"UPDATE paket_wisata SET nama='$nama',harga='$harga' WHERE id_paket='$id'");
  if ($query2) {
  echo "<script>window.location = 'backend.php?/=paket_wisataTampil'</script>";
  }
} 
else {
  $query2 = mysqli_query($koneksi,"UPDATE paket_wisata SET nama='$nama',gambar_profil='$gbr',harga='$harga' WHERE id_paket='$id'");
  if ($query2) {
  echo "<script>window.location = 'backend.php?/=paket_wisataTampil'</script>";
  }
}
}
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Paket Wisata</li>
</ol>  
<a href="?/=paket_wisataTampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post" enctype="multipart/form-data"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>nama event</b></label>
      <input type="text" name="nama" value="<?php echo $data['nama'] ?>" class="form-control" id="inputText" placeholder="Masukan nama">
    </div>
    <div class="form-group col-md-6">
         <label for="inputText"><b>Harga</b></label>
      <input type="text" name="harga" value="<?php echo $data['harga'] ?>" class="form-control">
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
  <button type="submit" name="update" class="btn btn-primary">Simpan</button>
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
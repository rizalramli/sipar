<?php 
$id=$_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tempat_kuliner INNER JOIN kategori_kuliner ON kategori_kuliner.id_kategoriKuliner=tempat_kuliner.id_kategoriKuliner WHERE id_tempat='$id'");
$data=mysqli_fetch_array($query);
$tampung = $data['nama_kategori'];
$query2 = mysqli_query($koneksi,"SELECT * FROM kategori_kuliner WHERE nama_kategori NOT IN ('$tampung') ORDER BY id_kategoriKuliner ASC");
if (isset($_POST['simpan'])) {
  $nama = ucwords($_POST['nama']); // awal kata huruf kapital
  $kategori = $_POST['kategori'];
  $lokasi = ucwords($_POST['lokasi']);
  $deskripsi = $_POST['deskripsi'];
  //gambar profil
  $gambar_profil = $_FILES['gprofil']['name'];
  $file_tmp = $_FILES['gprofil']['tmp_name'];  
  //gambar_detail

   $total = count($_FILES['upload']['name']);
    for($i=0; $i<$total; $i++) {
      $tmpFilePath = $_FILES['upload']['tmp_name'][$i];
      if ($tmpFilePath != ""){
        //Setup our new file path
        $filename[] = $_FILES['upload']['name'][$i];
        $newFilePath = "asset/img/gdetail_kuliner/".$_FILES['upload']['name'][$i];
        //Upload the file into the temp dir
        move_uploaded_file($tmpFilePath, $newFilePath);
      }
    }
    $images = implode(",",$filename);

        move_uploaded_file($file_tmp, "asset/img/gprofil_kuliner/".$gambar_profil);
        if ($gambar_profil =="" && $images== "") {
          $query3 = mysqli_query($koneksi,"UPDATE tempat_kuliner SET nama='$nama',id_kategoriKuliner='$kategori',lokasi='$lokasi',deskripsi='$deskripsi' WHERE id_tempat='$id'");
            if ($query3) {
            echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";
            } else {
              echo "gagal insert";
            }
        } else if ($gambar_profil == "") {
          $query3 = mysqli_query($koneksi,"UPDATE tempat_kuliner SET nama='$nama',id_kategoriKuliner='$kategori',lokasi='$lokasi',gambar_detail='$images',deskripsi='$deskripsi' WHERE id_tempat='$id'");
            if ($query3) {
            echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";
            } else {
              echo "gagal insert";
            }
        } else if ($images =="") {
          $query3 = mysqli_query($koneksi,"UPDATE tempat_kuliner SET nama='$nama',id_kategoriKuliner='$kategori',lokasi='$lokasi',gambar_profil='$gambar_profil',deskripsi='$deskripsi' WHERE id_tempat='$id'");
            if ($query3) {
            echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";
            } else {
              echo "gagal insert";
            }
        } else {
          $query3 = mysqli_query($koneksi,"UPDATE tempat_kuliner SET nama='$nama',id_kategoriKuliner='$kategori',lokasi='$lokasi',gambar_profil='$gambar_profil',gambar_detail='$images',deskripsi='$deskripsi' WHERE id_tempat='$id'");
            if ($query3) {
            echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";
            } else {
              echo "gagal insert";
            }
        }
               
}
 ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Kuliner</li>
</ol>  
<a href="?/=kuliner_tampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post" enctype="multipart/form-data"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Nama</b></label>
      <input type="text" name="nama" class="form-control" id="inputText" placeholder="Masukan nama" value="<?php echo $data['nama'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState"><b>Kategori Kuliner</b></label>
      <select id="inputState" name="kategori" class="form-control">
      <option value="<?php echo $data['id_kategoriKuliner']; ?>"><?php echo $data['nama_kategori']; selected ?></option>
      <?php foreach ($query2 as $datas){ ?>
      <option value="<?php echo $datas['id_kategoriKuliner']; ?>"><?php echo $datas['nama_kategori'] ?></option>
      <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Lokasi</b></label>
      <input type="text" name="lokasi" class="form-control" id="inputText" placeholder="Masukan nama" value="<?php echo $data['lokasi'] ?>">
    </div>
    
    <div class="form-group col-md-6">
      <div class="imageupload">
        <label for="inputText"><b>Gambar Profil </b><span style="font-size: 12px; color:red;">*foto 800x600px</span></label>
        
        <div class="file-tab panel-body">
          <div class="btn btn-warning btn-file">
            <span>Browse</span>
            <input type="file" name="gprofil">
          </div>
          <button type="button" class="btn btn-danger">Hapus</button>
        </div>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputText"><b>Gambar Detail</b><h6 style="font-size: 12px; color:red;">*minimal 6 foto 800x600px</h6></label>
      <input class="form-control" name="upload[]" id="fileupload" type="file" multiple="multiple" />
      <br>
      <div id="dvPreview">
      </div>
      <hr />
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputText"><b>Deskripsi</b></label>
      <textarea class="form-control" name="deskripsi" placeholder="Masukan deskripsi . . . . " id="exampleFormControlTextarea1" rows="7"><?php echo $data['deskripsi'] ?></textarea>
    </div>
  </div>
  
  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
</form><br>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
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

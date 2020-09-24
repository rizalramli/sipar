<?php 
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = ucwords($_POST['nama']);
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
        $query = mysqli_query($koneksi,"INSERT INTO tempat_kuliner VALUES('$id','$kategori','$nama','$lokasi','$gambar_profil','$images','$deskripsi')");
        if($query){
        echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";
        }else{
          echo 'Gagal Insert';
        }
 } 
?>

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input Wisata</li>
</ol>  
<a href="?/=kuliner_tampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post" enctype="multipart/form-data"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Nama</b></label>
      <input type="hidden" name="id" value="<?php echo kode('id_tempat','tempat_kuliner',3,'K') ?>">
      <input type="text" name="nama" class="form-control" id="inputText" placeholder="Masukan nama" required >
    </div>
    <div class="form-group col-md-6">
      <label for="inputState"><b>Kategori Wisata</b></label>
      <select id="inputState" name="kategori" class="form-control" required >
        <?php
        $query = mysqli_query($koneksi,"SELECT * FROM kategori_kuliner ORDER BY id_kategoriKuliner ASC");
        foreach ($query as $data) {
        ?>
            <option value="<?php echo $data['id_kategoriKuliner'] ?>"><?php echo $data['nama_kategori'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Lokasi</b></label>
      <input type="text" name="lokasi" class="form-control" id="inputText" placeholder="Masukan lokasi" required >
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
      <textarea class="form-control" name="deskripsi" placeholder="Masukan deskripsi . . . . " id="exampleFormControlTextarea1" rows="7" required ></textarea>
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

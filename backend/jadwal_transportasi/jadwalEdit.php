<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM jadwal_transportasi WHERE id_jadwal='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
$kategori = $_POST['kategori'];
$nama_kendaraan = ucwords($_POST['nama_kendaraan']);
$berangkat_dari = ucwords($_POST['berangkat_dari']);
$jam_berangkat = $_POST['jam_berangkat'];
$tujuan = ucwords($_POST['tujuan']);
$pemberhentian = ucwords($_POST['pemberhentian']);
$jam_sampai = $_POST['jam_sampai'];

    $query3= mysqli_query($koneksi,"UPDATE jadwal_transportasi SET jenis_kendaraan ='$kategori', nama_kendaraan='$nama_kendaraan', dari='$berangkat_dari',jam_berangkat='$jam_berangkat', tujuan='$tujuan', pemberhentian='$pemberhentian', jam_sampai='$jam_sampai' WHERE id_jadwal ='$id'");
    if($query3){
        echo "<script>window.location = 'backend.php?/=jadwal_transportasiTampil'</script>";
        } 
  }

 ?>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Jadwal Transportasi</li>
</ol>  
<a href="?/=jadwal_transportasiTampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>


<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputState"><b>Jenis Kendaraan</b></label>
      <select id="inputState" name="kategori" class="form-control" required >
            <option value="Bus" <?php $data['jenis_kendaraan'] == 'Bus' ? print "selected" : ""; ?>>Bus</option>
      <option value="Kereta Api" <?php $data['jenis_kendaraan'] == 'Kereta Api' ? print "selected" : ""; ?>>Kereta Api</option>
      <option value="Pesawat" <?php $data['jenis_kendaraan'] == 'Pesawat' ? print "selected" : ""; ?>>Pesawat</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Nama Kendaraan</b></label>
      <input type="text" name="nama_kendaraan" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['nama_kendaraan'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Berangkat Dari</b></label>
      <input type="text" name="berangkat_dari" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['dari'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Jam Berangkat</b></label>
      <input type="time" name="jam_berangkat" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['jam_berangkat'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Tujuan</b></label>
      <input type="text" name="tujuan" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['tujuan'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Pemberhentian</b></label>
      <input type="text" name="pemberhentian" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['pemberhentian'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Jam Sampai</b></label>
      <input type="time" name="jam_sampai" class="form-control" id="inputText" placeholder="" required value="<?php echo $data['jam_sampai'] ?>">
    </div>
  </div>
    
 
  <button type="submit" name="update" class="btn btn-primary">Simpan</button>
</form>





    <script src="backend/template/js/jquery-1.12.4.min.js"></script>
    <script src="backend/template/js/bootstrap.min.js"></script>
    <script src="backend/template/js/bootstrap-imageupload.js"></script>

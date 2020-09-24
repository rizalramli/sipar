<?php
  include '../../koneksi/koneksi.php';
  $id = $_POST['id'];
  $query = mysqli_query($koneksi,"SELECT * FROM akomodasi WHERE id_akomodasi='$id'");
  foreach($query as $data){
?>
<div class="form-row">
  <div class="col-md-6 form-group">
    <label for="inputID">ID Tempat</label>
    <input type="text" name="id_wisata" id="inputID" class="form-control" value="<?php echo $data['id_wisata'] ?>" readonly>
    <input type="hidden" name="ids" id="inputID" class="form-control" value="<?php echo $id ?>" readonly>
  </div>
  <div class="col-md-6 form-group">
    
    <label for="inputK">Kategori</label>
    <select name="titik_awal" id="inputK" class="form-control text-center">
      <option value="Terminal" <?php $data['titik_awal'] == 'Terminal' ? print "selected" : ""; ?>>Terminal</option>
      <option value="Stasiun" <?php $data['titik_awal'] == 'Stasiun' ? print "selected" : ""; ?>>Stasiun</option>
      <option value="Bandara" <?php $data['titik_awal'] == 'Bandara' ? print "selected" : ""; ?>>Bandara</option>
    </select>
  </div>
  <div class="col-md-6 form-group">
    <label for="inputID">Kendaraan</label>
    <input type="text" name="kendaraan" id="inputID" class="form-control" value="<?php echo $data['kendaraan'] ?>">
  </div>
  <div class="col-md-6 form-group">
    <label for="inputID">Harga</label>
    <input type="text" name="harga" id="inputID" class="form-control" value="<?php echo $data['harga'] ?>">
  </div>
  <div class="col-md-6 form-group">
    <label for="inputID">Dari</label>
    <input type="text" name="dari" id="inputID" class="form-control" value="<?php echo $data['dari'] ?>">
  </div>
  <div class="col-md-6 form-group">
    <label for="inputID">Ke</label>
    <input type="text" name="ke" id="inputID" class="form-control" value="<?php echo $data['ke'] ?>">
  </div>
</div>
<?php } ?>
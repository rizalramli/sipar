<?php
	include '../../koneksi/koneksi.php';
	$id = $_POST['id'];
	$query = mysqli_query($koneksi,"SELECT * FROM menu_kuliner WHERE id_menu='$id'");
	foreach($query as $data){
?>
<div class="form-row">
            <div class="col-md-6 form-group">
              <label for="inputID">ID Tempat</label>
              <input type="text" name="id_tempat" id="inputID" class="form-control" value="<?php echo $data['id_tempat'] ?>" readonly>

              <input type="hidden" name="ids" id="inputID" class="form-control" value="<?php echo $id ?>" readonly>
            </div> 
            <div class="col-md-6 form-group">
              
              <label for="inputK">Kategori</label>
              <select name="kategori" id="inputK" class="form-control text-center">
              	<option value="Makanan" <?php $data['kategori'] == 'Makanan' ? print "selected" : ""; ?>>Makanan</option>
                        <option value="Minuman" <?php $data['kategori'] == 'Minuman' ? print "selected" : ""; ?>>Minuman</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="inputNama">Nama</label>
              <input type="text" name="nama" id="inputNama" class="form-control" value="<?php echo $data['nama'] ?>">
            </div>
            <div class="col-md-6 form-group">
              <label for="inputH">Harga</label>
              <input type="text" name="harga" id="inputH" class="form-control" value="<?php echo $data['harga'] ?>">
            </div>
          </div>

<?php } ?>
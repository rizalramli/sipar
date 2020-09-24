<?php 
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
	$ids = $_POST['ids'];
	$nama = $_POST['nama'];
	$kategori = $_POST['kategori'];
	$harga = $_POST['harga'];
	$query = mysqli_query($koneksi,"INSERT INTO menu_kuliner VALUES ('','$ids','$nama','$kategori','$harga')");
	if ($query) {
            echo "<script>window.location = 'backend.php?/=menu_kuliner&id=$ids'</script>";

	}
}
if (isset($_POST['edit'])) {
  $id_tempat = $_POST['id_tempat'];
  $ids = $_POST['ids'];
  $kategori = $_POST['kategori'];
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $query_edit = mysqli_query($koneksi,"UPDATE menu_kuliner SET kategori='$kategori',nama='$nama',harga='$harga' WHERE id_menu='$ids'");
  if ($query_edit) {
        echo "<script>window.location = 'backend.php?/=menu_kuliner&id=$id_tempat'</script>";
  }
}
if (isset($_GET['hapus'])) {
	$id_hapus = $_GET['hapus'];
	$id_tempat = $_GET['q'];
	$query2 = mysqli_query($koneksi,"DELETE FROM menu_kuliner WHERE id_menu='$id_hapus'");
	if ($query2) {
            echo "<script>window.location = 'backend.php?/=menu_kuliner&id=$id_tempat'</script>";
	}
}
?>
<script src="backend/template/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".klik-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "backend/kuliner/edit_menu_kuliner.php",
                type: "POST",
                data : {id: m,},
                success: function (ajaxData){
                    $("#edit-ajax").html(ajaxData);
                }
            });
        });
    });
</script>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kuliner / Menu Kuliner</li>
</ol>
		<button style="margin-left:10px;margin-bottom: 10px;" class="btn btn-secondary" data-target="#modaltambah" data-toggle="modal">Tambah Menu</button>
		<div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $query = mysqli_query($koneksi,"SELECT menu_kuliner.id_menu,menu_kuliner.id_tempat,menu_kuliner.nama AS nama_menu,menu_kuliner.kategori,menu_kuliner.harga,tempat_kuliner.nama as nama_tempat FROM menu_kuliner JOIN tempat_kuliner ON menu_kuliner.id_tempat=tempat_kuliner.id_tempat WHERE menu_kuliner.id_tempat='$id'");
                    foreach ($query as $data ) {
                     ?>
                    <tr>
                    	<td><?php echo $no++; ?></td>
                    	<td><?php echo $data['nama_menu'] ?></td>
                    	<td><?php echo $data['kategori'] ?></td>
                    	<td><?php echo $data['harga'] ?></td>
                    	<td>
            		<a href="#" class="btn btn-outline-primary klik-edit" id="<?php echo $data['id_menu'] ?>" data-toggle="modal" data-target="#modaledit"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-outline-danger" href="?/=menu_kuliner&hapus=<?php echo $data['id_menu']."&q=".$data['id_tempat'] ?>"><i class="fa fa-trash"></i></a>
                    	</td>
                    </tr>
                    <?php 
                    } 
                    ?> 
                  </tbody>
                </table>
              </div>

<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form action="?/=menu_kuliner" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="inputID">ID Tempat</label>
              <input type="text" name="ids" id="inputID" class="form-control" value="<?php echo $id ?>" readonly>
            </div> 
            <div class="col-md-6 form-group">
              
              <label for="inputK">Kategori</label>
              <select name="kategori" id="inputK" class="form-control text-center">
              	<option value="Makanan">Makanan</option>
              	<option value="Minuman">Minuman</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="inputNama">Nama</label>
              <input type="text" name="nama" id="inputNama" class="form-control">
            </div>
            <div class="col-md-6 form-group">
              <label for="inputH">Harga</label>
              <input type="text" name="harga" id="inputH" class="form-control">
            </div>
          </div>
        </div>
        <div class="modal-footer">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

    <div class="modal fade" id="modaledit">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form action="?/=menu_kuliner" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" id="edit-ajax">
          
        </div>
        <div class="modal-footer">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>

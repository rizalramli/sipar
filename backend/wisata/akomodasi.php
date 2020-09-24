<?php 
$id = $_GET['id'];
if (isset($_POST['simpan'])) {
  $id_wisata = $_POST['id_wisata'];
  $titik_awal = $_POST['titik_awal'];
  $kendaraan = $_POST['kendaraan'];
  $harga = $_POST['harga'];
  $dari = ucwords($_POST['dari']);
  $ke = ucwords($_POST['ke']);
  $query = mysqli_query($koneksi,"INSERT INTO akomodasi VALUES ('','$id_wisata','$titik_awal','$kendaraan','$harga','$dari','$ke')");
  if ($query) {
            echo "<script>window.location = 'backend.php?/=akomodasi&id=$id_wisata'</script>";
  }
}
if (isset($_POST['edit'])) {
  $ids = $_POST['ids'];
  $id_wisata = $_POST['id_wisata'];
  $titik_awal = $_POST['titik_awal'];
  $kendaraan = $_POST['kendaraan'];
  $harga = $_POST['harga'];
  $dari = ucwords($_POST['dari']);
  $ke = ucwords($_POST['ke']);
  $query_edit = mysqli_query($koneksi,"UPDATE akomodasi SET titik_awal='$titik_awal',kendaraan='$kendaraan',harga='$harga',dari='$dari',ke='$ke' WHERE id_akomodasi='$ids'");
  if ($query_edit) {
            echo "<script>window.location = 'backend.php?/=akomodasi&id=$id_wisata'</script>";
  }
}
if (isset($_GET['hapus'])) {
  $id_hapus = $_GET['hapus'];
  $id_wisata = $_GET['w'];
  $query_hapus = mysqli_query($koneksi,"DELETE FROM akomodasi WHERE id_akomodasi='$id_hapus'");
  if ($query_hapus) {
            echo "<script>window.location = 'backend.php?/=akomodasi&id=$id_wisata'</script>";
  }
}
 ?>
 <script src="backend/template/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".klik-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "backend/wisata/edit_akomodasi.php",
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
  <li class="breadcrumb-item active">Wisata / Akomodasi</li>
</ol>
		<button style="margin-left:10px;margin-bottom: 10px;" class="btn btn-secondary" data-target="#modaltambah" data-toggle="modal">Tambah</button>
		<div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Kendaraan</th>
                      <th>Titik Awal</th>
                      <th>Dari</th>
                      <th>Menuju</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $query = mysqli_query($koneksi,"SELECT * FROM akomodasi WHERE id_wisata='$id'");
                    foreach ($query as $data ) {
                     ?>
                    <tr>
                    	<td><?php echo $no++; ?></td>
                      <td><?php echo $data['kendaraan'] ?></td>
                    	<td><?php echo $data['titik_awal'] ?></td>
                      <td><?php echo $data['dari'] ?></td>
                    	<td><?php echo $data['ke'] ?></td>
                      <td><?php echo $data['harga'] ?></td>
                    	<td>
            		<a href="#" class="btn btn-outline-primary klik-edit" id="<?php echo $data['id_akomodasi'] ?>" data-toggle="modal" data-target="#modaledit"><i class="fa fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-outline-danger" href="?/=akomodasi&hapus=<?php echo $data['id_akomodasi']."&w=".$data['id_wisata'] ?>"><i class="fa fa-trash"></i></a>


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
      <form action="?/=akomodasi" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="inputID">ID Wisata</label>
              <input type="text" name="id_wisata" id="inputID" class="form-control" value="<?php echo $id ?>" readonly>
            </div> 
            <div class="col-md-6 form-group">
              
              <label for="inputK">Titik Awal</label>
              <select name="titik_awal" id="inputK" class="form-control text-center">
                <option value="Terminal">Terminal</option>
                <option value="Stasiun">Stasiun</option>
                <option value="Bandara">Bandara</option>
              </select>
            </div>
            <div class="col-md-6 form-group">
              <label for="inputNama">Kendaraan</label>
              <input type="text" name="kendaraan" id="inputNama" class="form-control">
            </div>
            <div class="col-md-6 form-group">
              <label for="inputH">Harga</label>
              <input type="text" name="harga" id="inputH" class="form-control">
            </div>
            <div class="col-md-6 form-group">
              <label for="inputH">Dari</label>
              <input type="text" name="dari" id="inputH" class="form-control">
            </div>
            <div class="col-md-6 form-group">
              <label for="inputH">Ke</label>
              <input type="text" name="ke" id="inputH" class="form-control">
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
      <form action="?/=akomodasi" method="POST">
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

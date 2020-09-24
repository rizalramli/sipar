<?php
if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = ucwords($_POST['nama']);
  $query = mysqli_query($koneksi,"INSERT INTO kategori_wisata (id_kategoriWisata,nama_kategori) VALUES ('$id','$nama')");
  if ($query) {
        echo "<script>window.location = 'backend.php?/=kategori_wisatax'</script>";
  }
}
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $nama = ucwords($_POST['nama']);
  $query_edit = mysqli_query($koneksi,"UPDATE kategori_wisata SET nama_kategori='$nama' WHERE id_kategoriWisata='$id'");
  if ($query_edit) {
        echo "<script>window.location = 'backend.php?/=kategori_wisatax'</script>";
  }
}
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $query_hapus = mysqli_query($koneksi,"DELETE FROM kategori_wisata WHERE id_kategoriWisata='$id'");
  if ($query_hapus) {
        echo "<script>window.location = 'backend.php?/=kategori_wisatax'</script>";
  }
}
  ?>
<!-- Breadcrumbs-->
<script src="backend/template/js/ajax.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(".klik-edit").click(function(e) {
            var m = $(this).attr("id");
            $.ajax({
                url: "backend/xmodal_kategori/edit_kategori_wisata.php",
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
  <li class="breadcrumb-item active">Tampil Wisata</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Wisata</div>
            <div class="card-body">
              <button style="margin-left:10px;margin-bottom: 10px;" class="btn btn-secondary" data-target="#modaltambah" data-toggle="modal">Tambah Data</button>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM kategori_wisata");
                    foreach ($query as $data ) {
                     ?>
                    
                    <tr>
                      <td width=""><?php echo $data['id_kategoriWisata']; ?></td>
                      <td width=""><?php echo $data['nama_kategori']; ?></td>
                      <td style="text-align: center;" width="">
                        <a href="#" class="btn btn-outline-primary klik-edit" id="<?php echo $data['id_kategoriWisata'] ?>" data-toggle="modal" data-target="#modaledit"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" style="margin-top: 5px;" class="btn btn-outline-danger" href="?/=kategori_wisatax&hapus=<?php echo $data['id_kategoriWisata'] ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 

<div class="modal fade" id="modaltambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form action="?/=kategori_wisatax" method="POST">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-row">
            <div class="col-md-6 form-group">
              <label for="inputID">ID Kategori Wisata</label>
              <input type="text" name="id" id="inputID" class="form-control" value="<?php echo kode('id_kategoriWisata','kategori_wisata',3,'KW'); ?>" readonly>
            </div> 
            <div class="col-md-6 form-group">
              <label for="inputNama">Nama Kategori Wisata</label>
              <input type="text" name="nama" id="inputNama" class="form-control">
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
      <form action="?/=kategori_wisatax" method="POST">
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

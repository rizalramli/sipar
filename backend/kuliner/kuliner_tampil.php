<?php 
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $query = mysqli_query($koneksi,"DELETE FROM tempat_kuliner WHERE id_tempat='$id'");
}
if ($query) {
        echo "<script>window.location = 'backend.php?/=kuliner_tampil'</script>";  
}
 ?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kuliner</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Kuliner</div>
            <div class="card-body">
              <a href="?/=kuliner_input"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Foto</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $query = mysqli_query($koneksi,"SELECT * FROM tempat_kuliner INNER JOIN kategori_kuliner ON kategori_kuliner.id_kategoriKuliner=tempat_kuliner.id_kategoriKuliner ORDER BY id_tempat ASC ");
                    foreach ($query as $data ) {
                     ?>
                    
                    <tr>
                      <td width="2%"><?php echo $no++."." ?></td>
                      <td width="10%"><?php echo $data['nama']; ?></td>
                      <td width="10%"><?php echo $data['nama_kategori']; ?></td>
                      <td width="20%"><img width="245" height="150" src="asset/img/gprofil_kuliner/<?php echo $data['gambar_profil'] ?>" alt=""></td>
                      <td width="25%"><?php echo substr($data['deskripsi'],0,40)." ..."; ?></td>
                      <td style="text-align: center;" width="20%">
                        <a class="btn btn-outline-secondary" href="?/=menu_kuliner&id=<?php echo $data['id_tempat']; ?>"><i class="fa fa-utensils"></i></a>
                        <a href="?/=kuliner_edit&id=<?php echo $data['id_tempat']; ?>" class="btn btn-outline-primary" href=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-outline-danger" href="?/=kuliner_tampil&hapus=<?php echo $data['id_tempat'] ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php 
                    } 
                    ?> 
                  </tbody>
                </table>
              </div>
            </div>
          </div> 
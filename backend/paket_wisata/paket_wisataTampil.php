<?php 
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $query = mysqli_query($koneksi,"DELETE FROM paket_wisata WHERE id_paket='$id'");
}
if ($query) {
        echo "<script>window.location = 'backend.php?/=paket_wisataTampil'</script>";  
}
 ?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil Paket Wisata</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Paket Wisata</div>
            <div class="card-body">
              <a href="?/=paket_wisataInput"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Foto</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $query = mysqli_query($koneksi,"SELECT * FROM paket_wisata");
                    foreach ($query as $data ) {
                     ?>
                    
                    <tr>
                      <td width="2%"><?php echo $no++."." ?></td>
                      <td width="10%"><?php echo $data['nama']; ?></td>
                      <td style="text-align: center;" width="20%"><img style="max-height: 100px; max-width: 100px"; src="asset/img/paket_wisata/<?php echo $data['gambar_profil']; ?>" alt=""></td>
                      <td width="10%"><?php echo $data['harga']; ?></td>
                      <td style="text-align: center;" width="20%">
                        <a href="?/=paket_wisataEdit&id=<?php echo $data['id_paket']; ?>" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" style="margin-top: 5px;" class="btn btn-outline-danger" href="?/=paket_wisataTampil&hapus=<?php echo $data['id_paket'] ?>"><i class="fa fa-trash"></i></a>
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

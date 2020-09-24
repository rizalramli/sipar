<?php 
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $query = mysqli_query($koneksi,"DELETE FROM wisata WHERE id_wisata='$id'");
}
if ($query) {
        echo "<script>window.location = 'backend.php?/=wisata_tampil'</script>";  
}
 ?>

<!-- Breadcrumbs-->
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
              <a href="?/=wisata_input"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
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
                    $query = mysqli_query($koneksi,"SELECT * FROM wisata INNER JOIN kategori_wisata ON kategori_wisata.id_kategoriWisata=wisata.id_kategoriWisata ORDER BY id_wisata ASC ");
                    foreach ($query as $data ) {
                     ?>
                    
                    <tr>
                      <td width="2%"><?php echo $no++."." ?></td>
                      <td width="10%"><?php echo $data['nama']; ?></td>
                      <td width="10%"><?php echo $data['nama_kategori']; ?></td>
                      <td width="20%"><img width="245" height="150" src="asset/img/gprofil_wisata/<?php echo $data['gambar_profil'] ?>" alt=""></td>
                      <td width="25%"><?php echo substr($data['deskripsi'],0,40)." ..."; ?></td>
                      <td style="text-align: center;" width="20%">
                        <a class="btn btn-outline-secondary" href="?/=akomodasi&id=<?php echo $data['id_wisata'] ?>"><i class="fa fa-car"></i></a>
                        <a href="?/=wisata_edit&id=<?php echo $data['id_wisata']; ?>" class="btn btn-outline-primary" href=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-outline-danger" href="?/=wisata_tampil&hapus=<?php echo $data['id_wisata'] ?>"><i class="fa fa-trash"></i></a>
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

<!--           <?php
          $sql=mysqli_query($koneksi,"SELECT * FROM wisata WHERE id_wisata='1'");
          $data=mysqli_fetch_array($sql);
          $images=$data['detail_gambar'];
          $temp = explode(',',$images);
          for($i=0;$i<count($temp);$i++)
          {
            echo '<img style="margin:10px;" src="asset/img/gdetail_wisata/'.$temp[$i].'" height="160" width="210">&nbsp';
          }
          ?>
 -->

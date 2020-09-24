
<?php 
if ($_GET['hapus']) {
  $id = $_GET['hapus'];
  $query = mysqli_query($koneksi,"DELETE FROM event WHERE id_event='$id'");
}
if ($query) {
        echo "<script>window.location = 'backend.php?/=event_tampil'</script>";  
}
 ?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil Event</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Event</div>
            <div class="card-body">
              <a href="?/=event_input"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    $query = mysqli_query($koneksi,"SELECT * FROM event");
                    foreach ($query as $data ) {
                     ?>
                    
                    <tr>
                      <td width="2%"><?php echo $no++."." ?></td>
                      <td width="10%"><?php echo $data['nama']; ?></td>
                      <td width="10%"><?php echo $data['tgl_event']; ?></td>
                      <td width="13%"><?php echo $data['lokasi']; ?></td>
                      <td style="text-align: center;" width="20%"><img style="max-height: 100px; max-width: 100px"; src="asset/img/event/<?php echo $data['gambar']; ?>" alt=""></td>
                      <td style="text-align: center;" width="20%">
                        <a href="?/=eventEdit&id=<?php echo $data['id_event']; ?>" class="btn btn-outline-primary" href=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-outline-danger" href="?/=event_tampil&hapus=<?php echo $data['id_event'] ?>"><i class="fa fa-trash"></i></a>
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

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil Tentang</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Tentang</div>
            <div class="card-body">
              <a href="?/=Tentang_input"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php 
                  	$query = mysqli_query($koneksi,"SELECT * FROM tentang");
                  	foreach ($query as $data) {
                  	?>
                    
                    <tr>
                      <td width=""><?php echo $data['id_tentang'];  ?></td>
                      <td width=""><?php echo $data['nama_tentang'];  ?></td>
                      <td width=""><?php echo $data['deskripsi'];  ?></td>

                      <td style="text-align: center;" width="">
                        <a href="backend.php?/=Tentang_edit&id=<?php echo $data['id_tentang'];  ?>" class="btn btn-outline-primary" href=""><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger" href="backend.php?/=Tentang_hapus&id=<?php echo $data['id_tentang'];  ?>"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                 <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 

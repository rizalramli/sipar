<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil Kuliner</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Kuliner</div>
            <div class="card-body">
              <a href="?/=kategoriKulinerInput"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
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
                    $query = mysqli_query($koneksi,"SELECT * FROM kategori_kuliner");
                    while($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td width=""> <?php echo $data[0]?> </td>
                      <td width=""> <?php echo $data[1]?> </td>
                      <td style="text-align: center;" width="">
                        <!-- method GET &id= -->
                        <a href="backend.php?/=kategori_kulinerEdit&id=<?php echo $data[0]?> " class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Anda Yakin Ingin menghapus Data?')" class="btn btn-danger" href=backend.php?/=kategori_Kulinerhapus&id=<?php echo $data[0]?> "><i class="fa fa-trash"></i></a>
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


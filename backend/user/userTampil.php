<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil user</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data User</div>
            <div class="card-body">
              <a href="?/=inputUser"><button class="btn btn-secondary"><i class="fa fa-plus"> Tambah</i></button></a>
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Aksi</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM user"); 
                    foreach ($query as $data) {
                     ?>                
                    
                    <tr>
                      <td width=""><?php echo $data['id_user']; ?></td>
                      <td width=""><?php echo $data['username']; ?></td>
                      <td width=""><?php echo $data['password']; ?></td>
                      <td style="text-align: center;" width="">
                        <a href="backend.php?/=User_edit&id=<?php echo $data['id_user']; ?>" class="btn btn-outline-primary" href=""><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger" href="backend.php?/=userHapus&id=<?php echo $data['id_user']; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div> 


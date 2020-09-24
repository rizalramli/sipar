<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tampil Pesan Bantuan</li>
</ol>
<div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Data Pesan Bantuan</div>
            <div class="card-body">
              <div class="table-responsive"><br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nama</th>
                      <th>email</th>
                      <th>deskripsi</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = mysqli_query($koneksi,"SELECT * FROM pesan_bantuan"); 
                    while($data = mysqli_fetch_array($query)){
                    ?>                
                    
                    <tr>
                      <td width=""><?php echo $data['id_pesan']; ?></td>
                      <td width=""><?php echo $data['nama']; ?></td>
                      <td width=""><?php echo $data['email']; ?></td>
                      <td width=""><?php echo $data['deskripsi']; ?></td>
                    </tr>
                  <?php } ?>  
                  </tbody>
                </table>
              </div>
            </div>
          </div> 


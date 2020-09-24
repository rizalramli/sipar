<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner WHERE id_tempat='$id'");
$data = mysqli_fetch_array($query);
if (isset($_POST['simpan'])) {
  $rating = $_POST['rate'];
  $nama = $_POST['nama'];
  $pesan = $_POST['pesan'];
  $query2 = mysqli_query($koneksi,"INSERT INTO rating_kuliner VALUES ('','$id','$nama','$pesan','$rating')");
  if ($query2) {
    echo "<script>window.location = '?halaman=kuliner_detail&id=$id'</script>";
  }
}
?>
<div class="wrap mb-4">
    <div class="relatif">
          <img src="1.jpg" class="img-fluid" alt="Responsive image">
          <div class="text-block">
            <h4><?php echo $data['nama'] ?></h4>
            <p>What a beautiful sunrise </p>
          </div>
    </div>
  </div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: gray" href="?halaman=kuliner&kategori=<?php echo strtolower($data['nama_kategori']) ?>">Kuliner <?php echo $data['nama_kategori'] ?></a> <b> > </b> <a style="color: black" href=""><?php echo $data['nama'] ?></a>
    </div>
  </div>
</div>
<div class="container-fluid jarak-event">
  <div class="row">
    <div class="col-md-8">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" role="tab" data-toggle="tab" href="#home">Detail</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" role="tab" data-toggle="tab" href="#profil">Daftar Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" role="tab" data-toggle="tab" href="#rating">Review & Rating</a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tab-panel" class="tab-pane active" id="home">
          <p class="isi-artikel pt-3 pr-3 pl-3 pb-3"><?php echo $data['deskripsi'] ?></p>
        </div>
        <div role="tab-panel" class="tab-pane" id="profil">
          <div class="container">
            <div class="row pt-3">
              <div class="col-md-6 mb-5">
                <h5 class="text-center mr-5">Makanan</h5>
                <?php 
                $query_makanan = mysqli_query($koneksi,"SELECT * FROM menu_kuliner WHERE id_tempat='$id' AND kategori='Makanan'");
                foreach ($query_makanan as $data_makanan) {
                 ?>
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span><?php echo $data_makanan['nama'] ?></span>
                    <span class="float-right mr-5">Rp <?php echo $data_makanan['harga'] ?></span>
                      
                    </div>
                </div>
              <?php } ?>
              </div>
              <div class="col-md-6 mb-5">
                <h5 class="text-center mr-5">Minuman</h5>
                <?php 
                $query_minuman = mysqli_query($koneksi,"SELECT * FROM menu_kuliner WHERE id_tempat='$id' AND kategori='Minuman'");
                foreach ($query_minuman as $data_minuman) {
                 ?>
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <span><?php echo $data_minuman['nama'] ?></span>
                    <span class="float-right mr-5">Rp <?php echo $data_minuman['harga'] ?></span>
                      
                    </div>
                </div>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div role="tab-panel" class="tab-pane" id="rating">
          <div class="isi-artikel pt-3 pr-3 pl-3 pb-3">
            <form action="" method="post">
                  <?php 
                  $query_review = mysqli_query($koneksi,"SELECT * FROM rating_kuliner WHERE id_tempat='$id'");
                  $jumlah_row = mysqli_num_rows($query_review); 
                  echo "<h5>Telah di review oleh $jumlah_row Orang</h5>";
                   ?>
                <div class="rate">
                    <div class="star">
                        <input id="rate1-star5" type="radio" name="rate" value="5" />
                        <label for="rate1-star5" title="Excellent">5</label>
                        <input id="rate1-star4" type="radio" name="rate" value="4" />
                        <label for="rate1-star4" title="Good">4</label>
                        <input id="rate1-star3" type="radio" name="rate" value="3" />
                        <label for="rate1-star3" title="Satisfactory">3</label>
                        <input id="rate1-star2" type="radio" name="rate" value="2" />
                        <label for="rate1-star2" title="Bad">2</label>
                        <input id="rate1-star1" type="radio" name="rate" value="1" />
                        <label for="rate1-star1" title="Very bad">1</label>
                    </div>
                </div>

                    <div class="form-group">
                      <label for="inputnama">Email*</label>
                      <input type="text" class="form-control" name="nama" id="inputnama" placeholder="name@example.com">
                    </div>
                  <div class="form-group">
                    <label for="textarea">Pesan*</label>
                    <textarea class="form-control" id="textarea" name="pesan" rows="6"></textarea>
                  </div>
                  <button type="submit" name="simpan" class="btn btn-secondary">Kirim</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 pt-2">
      <h4 class="text-center">Gallery</h4>
      <div class="gallery-detail">
        <div class="transisi-galery">
          <div class="row">
            <?php
            $images=$data['gambar_detail'];
            $temp = explode(',',$images);
            for($i=0;$i<count($temp);$i++)
            {
            echo '
            <div class="col-md-4 text-center">
              <a href="asset/img/gdetail_kuliner/'.$temp[$i].'"><img class="img-fluid image" src="asset/img/gdetail_kuliner/'.$temp[$i].'"></a>
            </div>
            ';
            }
            ?>
          </div>
          <div class="row">
            <div class="col-md-12 mt-4">
             <h4 class="text-center">Lokasi</h4>
              <iframe src="<?php echo $data['lokasi'] ?>" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
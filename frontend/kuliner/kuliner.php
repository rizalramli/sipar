<?php 
if ($_GET['kategori'] == "cafe") {
  ?>
<div class="wrap mb-4">
      <div class="relatif">
      <img src="asset/img/banner/Kulinercafe.jpg" class="img-fluid" alt="Responsive image">
            <div class="bg-black"></div>
      </div>
      <div class="banner-img">
        <p>Kuliner</p>
      </div>
      <div class="navigasi">
        <a href="?halaman=kuliner&kategori=cafe" class="nav-custActive">Cafe</a>
        <a href="?halaman=kuliner&kategori=warung" class="nav-cust">Warung</a>
        <a href="?halaman=kuliner&kategori=restoran" class="nav-cust">Restoran</a>
      </div>  
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Kuliner Cafe</a>
    </div>
  </div>
</div>
<div class="container card-kuliner">
<div class="row">
  <div class="col-md-9 mb-5">
    <?php 
    $query = mysqli_query($koneksi,"SELECT tempat_kuliner.deskripsi,tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat WHERE kategori_kuliner.nama_kategori = 'Cafe' GROUP BY tempat_kuliner.id_tempat");
    $jml = mysqli_num_rows($query);
    for ($i=0; $i < $jml ; $i++) { 
      $data = mysqli_fetch_array($query);
     ?>
    <div class="row">
      <div class="col-md-5 jarak-mb5">
      <img class="card-img-top" src="asset/img/gprofil_kuliner/<?php echo $data['gambar_profil'] ?>" alt="Card image"/>
      </div>
      <div class="col-md-7 mb-5">
        <h4 class="mb-5"><?php echo $data['nama'] ?></h4>
        <p><?php echo substr($data['deskripsi'],0,80) ?></p>
        <p>Rating :
        <?php
          $tampung = $data['ratings'];
          for ($j=1; $j <= $tampung ; $j++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
        <div>
          <a style="text-decoration: none;" href="?halaman=kuliner_detail&id=<?php echo $data['id_tempat'] ?>" class="btn btn-custom">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
    <div class="col-md-3">
    <h5 class="text-center pb-2"><b>Top Destinasi</b></h5>
    <?php
    $query2 = mysqli_query($koneksi,"SELECT wisata.nama,wisata.lokasi,wisata.gambar_profil,wisata.id_wisata,kategori_wisata.nama_kategori, ROUND(AVG(rating_wisata.rating)) AS ratings FROM wisata JOIN kategori_wisata ON wisata.id_kategoriWisata=kategori_wisata.id_kategoriWisata LEFT JOIN rating_wisata ON wisata.id_wisata = rating_wisata.id_wisata GROUP BY wisata.id_wisata HAVING ROUND(AVG(rating_wisata.rating)) <= 5 limit 3");
    $jml2 = mysqli_num_rows($query2);
    for ($k=0; $k < $jml2 ; $k++) {
    $datas = mysqli_fetch_array($query2);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=wisata_detail&id=<?php echo $datas['id_wisata'] ?>">
    <div class="row">
      <div class="col-xl-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_wisata/<?php echo $datas['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-xl-8 "><?php echo $datas['nama'] ?>
        <p>
          <?php
          $tampungs = $datas['ratings'];
          for ($l=1; $l <= $tampungs ; $l++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
    <h5 class="text-center pb-2 pt-4"><b>Top Kuliner</b></h5>
    <?php
    $query3 = mysqli_query($koneksi,"SELECT tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat GROUP BY tempat_kuliner.id_tempat HAVING ROUND(AVG(rating_kuliner.rating)) <= 5 limit 3");
    $jml3 = mysqli_num_rows($query3);
    for ($m=0; $m < $jml3 ; $m++) {
    $datass = mysqli_fetch_array($query3);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=kuliner_detail&id=<?php echo $datass['id_tempat'] ?>">
    <div class="row">
      <div class="col-md-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_kuliner/<?php echo $datass['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-md-8"><?php echo $datass['nama'] ?>
        <p>
          <?php
          $tampungss = $datass['ratings'];
          for ($n=1; $n <= $tampungss ; $n++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
  </div>
</div>
</div>
<?php } ?>

<?php 
if ($_GET['kategori'] == "warung") {
  ?>
<div class="wrap mb-4">
      <div class="relatif">
      <img src="asset/img/banner/Kulinerwarung.jpg" class="img-fluid" alt="Responsive image">
            <div class="bg-black"></div>
      
      </div>
      <div class="banner-img">
        <p>Kuliner</p>
      </div>
      <div class="navigasi">
        <a href="?halaman=kuliner&kategori=cafe" class="nav-cust">Cafe</a>
        <a href="?halaman=kuliner&kategori=warung" class="nav-custActive">Warung</a>
        <a href="?halaman=kuliner&kategori=restoran" class="nav-cust">Restoran</a>
      </div>
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Kuliner Warung</a>
    </div>
  </div>
</div>
<div class="container card-kuliner">
<div class="row">
  <div class="col-md-9 mb-5">
    <?php 
    $query = mysqli_query($koneksi,"SELECT tempat_kuliner.deskripsi,tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat WHERE kategori_kuliner.nama_kategori = 'Warung' GROUP BY tempat_kuliner.id_tempat");
    $jml = mysqli_num_rows($query);
    for ($i=0; $i < $jml ; $i++) { 
      $data = mysqli_fetch_array($query);
     ?>
    <div class="row">
      <div class="col-md-5 jarak-mb5">
      <img class="card-img-top" src="asset/img/gprofil_kuliner/<?php echo $data['gambar_profil'] ?>" alt="Card image"/>
      </div>
      <div class="col-md-7 mb-5">
        <h4 class="mb-5"><?php echo $data['nama'] ?></h4>
        <p><?php echo substr($data['deskripsi'],0,80) ?></p>
        <p>Rating :
        <?php
          $tampung = $data['ratings'];
          for ($j=1; $j <= $tampung ; $j++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
        <div>
          <a style="text-decoration: none;" href="?halaman=kuliner_detail&id=<?php echo $data['id_tempat'] ?>" class="btn btn-custom">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
    <div class="col-md-3">
    <h5 class="text-center pb-2"><b>Top Destinasi</b></h5>
    <?php
    $query2 = mysqli_query($koneksi,"SELECT wisata.nama,wisata.lokasi,wisata.gambar_profil,wisata.id_wisata,kategori_wisata.nama_kategori, ROUND(AVG(rating_wisata.rating)) AS ratings FROM wisata JOIN kategori_wisata ON wisata.id_kategoriWisata=kategori_wisata.id_kategoriWisata LEFT JOIN rating_wisata ON wisata.id_wisata = rating_wisata.id_wisata GROUP BY wisata.id_wisata HAVING ROUND(AVG(rating_wisata.rating)) <= 5 limit 3");
    $jml2 = mysqli_num_rows($query2);
    for ($k=0; $k < $jml2 ; $k++) {
    $datas = mysqli_fetch_array($query2);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=wisata_detail&id=<?php echo $datas['id_wisata'] ?>">
    <div class="row">
      <div class="col-xl-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_wisata/<?php echo $datas['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-xl-8 "><?php echo $datas['nama'] ?>
        <p>
          <?php
          $tampungs = $datas['ratings'];
          for ($l=1; $l <= $tampungs ; $l++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
    <h5 class="text-center pb-2 pt-4"><b>Top Kuliner</b></h5>
    <?php
    $query3 = mysqli_query($koneksi,"SELECT tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat GROUP BY tempat_kuliner.id_tempat HAVING ROUND(AVG(rating_kuliner.rating)) <= 5 limit 3");
    $jml3 = mysqli_num_rows($query3);
    for ($m=0; $m < $jml3 ; $m++) {
    $datass = mysqli_fetch_array($query3);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=kuliner_detail&id=<?php echo $datass['id_tempat'] ?>">
    <div class="row">
      <div class="col-md-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_kuliner/<?php echo $datass['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-md-8"><?php echo $datass['nama'] ?>
        <p>
          <?php
          $tampungss = $datass['ratings'];
          for ($n=1; $n <= $tampungss ; $n++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
  </div>
</div>
</div>

<?php } ?>

<?php 
if ($_GET['kategori'] == "restoran") {
  ?>
<div class="wrap mb-4">
      <div class="relatif">
      <img src="asset/img/banner/Kulinerrestoran.jpg" class="img-fluid" alt="Responsive image">
            <div class="bg-black"></div>
      
      </div>
      <div class="banner-img">
        <p>Kuliner</p>
      </div>
      <div class="navigasi">
        <a href="?halaman=kuliner&kategori=cafe" class="nav-cust">Cafe</a>
        <a href="?halaman=kuliner&kategori=warung" class="nav-cust">Warung</a>
        <a href="?halaman=kuliner&kategori=restoran" class="nav-custActive">Restoran</a>
      </div>
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Kuliner Restoran</a>
    </div>
  </div>
</div>
<div class="container card-kuliner">
<div class="row">
  <div class="col-md-9 mb-5">
    <?php 
    $query = mysqli_query($koneksi,"SELECT tempat_kuliner.deskripsi,tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat WHERE kategori_kuliner.nama_kategori = 'Restoran' GROUP BY tempat_kuliner.id_tempat");
    $jml = mysqli_num_rows($query);
    for ($i=0; $i < $jml ; $i++) { 
      $data = mysqli_fetch_array($query);
     ?>
    <div class="row">
      <div class="col-md-5 jarak-mb5">
      <img class="card-img-top" src="asset/img/gprofil_kuliner/<?php echo $data['gambar_profil'] ?>" alt="Card image"/>
      </div>
      <div class="col-md-7 mb-5">
        <h4 class="mb-5"><?php echo $data['nama'] ?></h4>
        <p><?php echo substr($data['deskripsi'],0,80) ?></p>
        <p>Rating :
        <?php
          $tampung = $data['ratings'];
          for ($j=1; $j <= $tampung ; $j++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
        <div>
          <a style="text-decoration: none;" href="?halaman=kuliner_detail&id=<?php echo $data['id_tempat'] ?>" class="btn btn-custom">Read More <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
    <?php } ?>

  </div>
    <div class="col-md-3">
    <h5 class="text-center pb-2"><b>Top Destinasi</b></h5>
    <?php
    $query2 = mysqli_query($koneksi,"SELECT wisata.nama,wisata.lokasi,wisata.gambar_profil,wisata.id_wisata,kategori_wisata.nama_kategori, ROUND(AVG(rating_wisata.rating)) AS ratings FROM wisata JOIN kategori_wisata ON wisata.id_kategoriWisata=kategori_wisata.id_kategoriWisata LEFT JOIN rating_wisata ON wisata.id_wisata = rating_wisata.id_wisata GROUP BY wisata.id_wisata HAVING ROUND(AVG(rating_wisata.rating)) <= 5 limit 3");
    $jml2 = mysqli_num_rows($query2);
    for ($k=0; $k < $jml2 ; $k++) {
    $datas = mysqli_fetch_array($query2);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=wisata_detail&id=<?php echo $datas['id_wisata'] ?>">
    <div class="row">
      <div class="col-xl-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_wisata/<?php echo $datas['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-xl-8 "><?php echo $datas['nama'] ?>
        <p>
          <?php
          $tampungs = $datas['ratings'];
          for ($l=1; $l <= $tampungs ; $l++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
    <h5 class="text-center pb-2 pt-4"><b>Top Kuliner</b></h5>
    <?php
    $query3 = mysqli_query($koneksi,"SELECT tempat_kuliner.nama,tempat_kuliner.lokasi,tempat_kuliner.gambar_profil,tempat_kuliner.id_tempat,kategori_kuliner.nama_kategori, ROUND(AVG(rating_kuliner.rating)) AS ratings FROM tempat_kuliner JOIN kategori_kuliner ON tempat_kuliner.id_kategoriKuliner=kategori_kuliner.id_kategoriKuliner LEFT JOIN rating_kuliner ON tempat_kuliner.id_tempat = rating_kuliner.id_tempat GROUP BY tempat_kuliner.id_tempat HAVING ROUND(AVG(rating_kuliner.rating)) <= 5 limit 3");
    $jml3 = mysqli_num_rows($query3);
    for ($m=0; $m < $jml3 ; $m++) {
    $datass = mysqli_fetch_array($query3);
    ?>
    <a style="text-decoration: none;color: black" href="?halaman=kuliner_detail&id=<?php echo $datass['id_tempat'] ?>">
    <div class="row">
      <div class="col-md-4 mb-4 pl-2"><img class="md3-img" src="asset/img/gprofil_kuliner/<?php echo $datass['gambar_profil'] ?>" alt="Card image"/></div>
      <div class="col-md-8"><?php echo $datass['nama'] ?>
        <p>
          <?php
          $tampungss = $datass['ratings'];
          for ($n=1; $n <= $tampungss ; $n++) {
          echo '<span style="color : #f1c40f" class="fa fa-star"></span>';
          }
        ?></p>
      </div>
    </div>
    </a>
    <?php } ?>
  </div>
</div>
</div>

<?php } ?>
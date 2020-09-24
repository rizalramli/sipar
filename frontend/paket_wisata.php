<div class="wrap mb-4">
      <div class="relatif">
        <img src="asset/img/banner/paket-wisata.jpg" width="100%" height="498px" alt="Responsive image">
            <div class="bg-black"></div>
        
      </div>
      <div class="banner-img">
        <p>Paket Wisata</p>
      </div>
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Paket Wisata</a>
    </div>
  </div>
</div>

<div class="container jarak-mb5 card-event">
  <div class="transisi-galery">
    <div class="row">
      <div class="col-md-12">
        <?php
        $query = mysqli_query($koneksi,"SELECT * FROM paket_wisata");
        foreach ($query as $data) {
        ?>
        <div class="row">
          <div class="col-md-4 jarak-section">
            <a style="text-decoration: none; color: black" class="lightbox" href="event.jpg">
              <div class="card">
                <img src="asset/img/paket_wisata/<?php echo $data['gambar_profil'] ?>" alt="Card Image" width="100%" height="280px">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $data['nama'] ?></h5>
                  <p> Deskripsi .... </p>
                  <div class="float-right mt-2">
                    <a style="color:#D5347D;text-decoration: none;" href="">Read More <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
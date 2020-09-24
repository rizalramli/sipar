<div class="wrap mb-4">
      <div class="relatif">
        <img src="asset/img/banner/event.jpg" width="100%" height="500px" alt="Responsive image">
            <div class="bg-black"></div>
      </div>
      <div class="banner-img">
        <p>Event</p>
      </div>
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Event</a>
    </div>
  </div>
</div>
<div class="container jarak-mb5">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6">
          <div class="relatif-event">
            <img src="asset/img/event/1.jpg" alt="Card Image" class="img-eventBest1">
            <div class="banner-event">
              <h4 class="text-center text-white">JFC</h4>
            </div>
            <div class="event-deskripsi">
              <h3>15 Desember 2018</h3>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 mb-4">
              <div class="relatif-event">
                <img src="asset/img/event/4.jpg" alt="Card Image" class="img-eventBest2">
                <div class="banner-event"><h5 class="text-center text-white">JFC</h5></div>
                <div class="event-deskripsi2">
              <h3>15 Desember 2018</h3>
            </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="relatif-event">
                <img src="asset/img/event/6.jpg" alt="Card Image" class="img-eventBest2">
                <div class="banner-event"><h5 class="text-center text-white">JFC</h5></div>
                <div class="event-deskripsi2">
              <h3>15 Desember 2018</h3>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container jarak-section text-center">
  <div class="row">
    <div class="col-md-12">
      <h3>Event 2017</h3>
    </div>
  </div>
</div>
<div class="container jarak-event text-center">
  <!-- <div class="row">
    <div class="col-md-12 bungkus-tgl">
      <div id="tgl" class="owl-carousel owl-theme owl-tgl">
        <?php
        $bulan = ["","Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sept","Okt","Nov","Des"];
        $bln = [1,2,3,4,5,6,7,8,9,10,11,12];
        for($i=1;$i<=count($bln);$i++){
        $active = ($i." ".date("Y")==date("m Y")) ? "class='active'" : "";
        echo "<div class='item'><a $active href=''>$bulan[$i] ".date("Y")."</a></div>";
        }
        ?>
      </div>
    </div>
  </div> -->
  <div class="container jarak-section">
    <div class="row bungkus-tgl">
      <?php
      $bln = [1,2,3,4,5,6,7,8,9,10,11,12];
      for($i=1;$i<=count($bln);$i++){
        if (isset($_GET['bulan'])) {
          $active = $i==$_GET['bulan'] ? "class='active'" : "";
        } else {
      $active = ($i." ".date("Y")==date("m Y")) ? "class='active'" : "";

        }
      echo "<div class='col-lg-1'><a $active href='?halaman=event&bulan=$i'>$bulan[$i]</a></div>";
      if (isset($GET[$bulan[$i]])) {
      
      }
      }
      ?>
    </div>
  </div>
</div>
<div class="container jarak-mb5 card-event">
  <div class="transisi-galery">
    <div class="row">
      <div class="col-md-12">
        <?php
        if (isset($_GET['bulan'])) {
          $filter ="WHERE MONTH(tgl_event)='$_GET[bulan]' AND YEAR(tgl_event)='".date('Y')."'";
        } else {
          $filter = "WHERE MONTH(tgl_event)='".date('m')."' AND YEAR(tgl_event)='".date('Y')."' ";
        }
        $query = mysqli_query($koneksi,"SELECT * FROM event $filter");
        foreach ($query as $data) {
        ?>
        <div class="row">
          <div class="col-md-4 jarak-section">
            <a style="text-decoration: none; color: black" class="lightbox" href="event.jpg">
                <div class="relatif-event">
            <img src="asset/img/event/<?php echo $data['gambar'] ?>" alt="Card Image" class="img-event">
            <div class="event-deskripsi3">
              <h4><?php echo $data['nama'] ?></h4>
              <h4><?php echo date('d M Y',strtotime($data['tgl_event'])) ?></h4>
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
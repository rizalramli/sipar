<div class="wrap mb-4">
  <div class="relatif">
    <img src="asset/img/banner/jadwal-transportasi.jpg" width="100%" height="498px" alt="Responsive image">
    <div class="bg-black"></div>
  </div>
  <div class="banner-img">
    <p>Jadwal Transportasi</p>
  </div>
</div>
<div class="container-fluid jarak-section">
  <div class="row">
    <div class="col-md-12">
      <a style="color:gray;" href="index.php">Home</a> <b> > </b> <a style="color: black" href="">Jadwal Transportasi</a>
    </div>
  </div>
</div>
<script src="backend/template/js/ajax.js"></script>
<script type="text/javascript">
    $(document).on('change', '#xx', function(event){
            event.preventDefault();
            var form_data = $("#myform").serialize();
            $.ajax({
            url: "frontend/jadwal_transportasi/ambil_transportasi.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $("#muncul").html(data);
                }
            });
        });
        // mengambil total harga
</script> 
<div class="container">
            <div class="row">
                <div class="col-md-4 form-group">
              <label for="inputNama"></label>
              <form action="" method="post" id="myform">
              <select name="jenis_transportasi" id="xx" class="form-control">
                <option value="">Pilih Jenis Transportasi</option>
                <option value="Bus">Bus</option>
                <option value="Kereta Api">Kereta Api</option>
                <option value="Pesawat">Pesawat</option>
              </select>
              </form>
            </div>
            </div>
            
          </div>
<div id="muncul" style="margin-bottom: 50%">
                    
</div>

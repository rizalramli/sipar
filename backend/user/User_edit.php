
<?php 
$id = $_GET['id'];
$query = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $user1 = $_POST['user1'];
    $psw = $_POST['psw'];
    

    $query3 = mysqli_query($koneksi,"UPDATE user SET id_user ='$id', username ='$user1', password='$psw' WHERE id_user ='$id'");
    if($query3){
        echo "<script>window.location = 'backend.php?/=userTampil'</script>";
        } 
  }

 ?>

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="index.html">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Input User</li>
</ol>  
<a href="?/=userTampil"><button class="btn btn-secondary"><i class="fa fa-arrow-circle-left"> Kembali</i></button></a>

<form action="" method="post"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputText"><b>Username</b></label>
      <input type="text" name="user1" class="form-control" id="inputText" placeholder="masukan nama kendaraan" value="<?php echo $data['username']; ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputText"><b>Password</b></label>
      <input type="text" name="psw" class="form-control" id="inputText" placeholder="" value="<?php echo $data['password']; ?>">
    </div>
  </div>
    
 
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>


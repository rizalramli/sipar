<?php
include '../../koneksi/koneksi.php';
$id_wisatas = $_POST['id_wisatas']; 
if (isset($_POST['akomodasi'])) 
{
	$id = $_POST['akomodasi'];
	if ($id ==  "Terminal") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas' ORDER BY id_akomodasi ASC");
		$query2 = mysqli_query($koneksi,"SELECT sum(harga) AS total FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas'");
		$sum = mysqli_fetch_array($query2);
	}
	else if ($id ==  "Stasiun") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas' ORDER BY id_akomodasi  ASC");
		$query2 = mysqli_query($koneksi,"SELECT sum(harga) AS total FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas'");
		$sum = mysqli_fetch_array($query2);
	}
	else if ($id ==  "Bandara") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas' ORDER BY id_akomodasi ASC");
		$query2 = mysqli_query($koneksi,"SELECT sum(harga) AS total FROM akomodasi WHERE titik_awal='$id' AND id_wisata='$id_wisatas'");
		$sum = mysqli_fetch_array($query2);
	}

	if (isset($query)) 
	{
		echo '
		<table width="100%" border="1">
			<thead>
				<tr class="text-center">
					<th>Dari</th>
					<th>Ke</th>
					<th>Kendaraan</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
		';
		foreach ($query as $data) 
		{
			?>
				<tr style="line-height: 40px;">
					<td style="text-align: center;" width="30%"><?php echo $data['dari'] ?></td>
					<td style="text-align: center;" width="20%"><?php echo $data['ke'] ?></td>
					<td style="text-align: center;" width="20%"><?php echo $data['kendaraan'] ?></td>
					<td style="text-align: right;" width="30%"><?php echo $data['harga'] ?></td>
				</tr>
			<?php
		}
		?>
	</tbody>
</table>
<div class="mt-3 ml-2">
	<h6 class="float-right">Total Perkiraan : <?php echo $sum['total'] ?></h6>
</div>
<?php
	}

} 
?>
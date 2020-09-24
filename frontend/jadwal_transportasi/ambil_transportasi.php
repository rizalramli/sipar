<?php
include '../../koneksi/koneksi.php';
if (isset($_POST['jenis_transportasi'])) 
{
	$id = $_POST['jenis_transportasi'];
	if ($id ==  "Bus") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM jadwal_transportasi WHERE jenis_kendaraan='$id' ORDER BY id_jadwal ASC");
	}
	else if ($id ==  "Kereta Api") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM jadwal_transportasi WHERE jenis_kendaraan='$id' ORDER BY id_jadwal  ASC");
	}
	else if ($id ==  "Pesawat") 
	{
		$query = mysqli_query($koneksi,"SELECT * FROM jadwal_transportasi WHERE jenis_kendaraan='$id' ORDER BY id_jadwal  ASC");
	}

	if (isset($query)) 
	{
		echo '
		<div class="container">
		<table class="table table-bordered table-striped" width="100%">
			<thead>
				<tr class="text-center">
					<th>Nama Kendaraan</th>
					<th>Berangkat Dari</th>
					<th>Pukul</th>
					<th>Tujuan</th>
					<th>Pemberhentian</th>
					<th>Pukul</th>
				</tr>
			</thead>
			<tbody>
		';
		foreach ($query as $data) 
		{
			?>
				<tr style="line-height: 40px;">
					<td><?php echo $data['nama_kendaraan'] ?></td>
					<td><?php echo $data['dari'] ?></td>
					<td><?php echo $data['jam_berangkat'] ?></td>
					<td><?php echo $data['tujuan'] ?></td>
					<td><?php echo $data['pemberhentian'] ?></td>
					<td><?php echo $data['jam_sampai'] ?></td>
				</tr>
			<?php
		}
		?>
	</tbody>
</table>
</div>
<?php
	}

} 
?>



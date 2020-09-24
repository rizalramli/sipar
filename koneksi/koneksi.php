<?php
	// Servername(Address),Username,Password,Nama_Database
	$koneksi = mysqli_connect("127.0.0.1","root","","db_wisata");
	if ($koneksi == false) {
		echo "Koneksi Anda gagal karena ".mysqli_connect_error();
	}
	else{
		 //echo "Haloo Berhasilll";
	}

	function kode($field,$tabel,$digit,$kode){
	global $koneksi;

	$data = mysqli_fetch_array(mysqli_query($koneksi,"SELECT MAX(RIGHT($field,$digit)) FROM $tabel"));
	$id = (int)$data[0]+1;
	$id_baru = $kode.sprintf('%0'.$digit.'s',$id);
	echo $id_baru;
	}

	 // JOIN 
	 // SELECT wisata.id_wisata,kategori_wisata.nama_kategori,wisata.lokasi AS tempat 
	 // FROM wisata JOIN kategori_wisata ON kategori_wisata.id_kategoriWisata = wisata.id_kategoriWisata

?>

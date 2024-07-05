<?php 
	include '../koneksi.php';
	
	$ID = $_GET['url']; 
	
	$id = $_POST['kode'];
	$penjelasan = $_POST['penjelasan'];
	$nama = $_POST['nama'];
	$materi = $_POST['id_materi'];
	$mulai = $_POST['waktu_mulai'];
	$selesai = $_POST['waktu_selesai'];
	



	$query = "UPDATE `kursus` SET `id`='" . $id . "', `judul`= '" . $nama . "', `mulai`= '" . $mulai . "', `selesai`= '" . $selesai . "', `deskripsi`= '" . $penjelasan . "', `id_materi`= '" . $materi . "' WHERE `materi`.`id` = '" . $ID . "'";
	
	 	$result = mysqli_query(koneksiDB(), $query);

 
	if ($result) {
		echo "Upload berhasil!";
	    header("Location: ../index.php?module=beranda", true, 301);
        exit();
	} else {
	    echo "Upload Gagal!";
	    header("Location: kursushalaman_upload.php", true, 301);
        exit();
	}


	// $query = "UPDATE `materi` SET `id` = '" . $kode . "', `judul` = '" . $nama . "', `link` = '" . $linkBerkas . "', `deskripsi` = '" . $penjelasan . "' WHERE `materi`.`id` = '" . $ID . "'";
	
 ?>
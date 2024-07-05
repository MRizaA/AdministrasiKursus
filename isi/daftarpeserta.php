<?php 
	include '../koneksi.php';
	
	$idkursus = $_GET['url']; 
	$iduser = $_GET['iduser']; 
	
	



	$query = "INSERT INTO `peserta` (`id`, `id_user`, `id_kursus`) VALUES (NULL, '" . $iduser . "', '" . $idkursus . "')";
	
	 	$result = mysqli_query(koneksiDB(), $query);

 
	if ($result) {
		echo "Upload berhasil!";
	    header("Location: ../index.php?module=beranda", true, 301);
        exit();
	} else {
	    echo "Upload Gagal!";
	    header("Location: ../index.php?module=beranda", true, 301);
        exit();
	}


	// $query = "UPDATE `materi` SET `id` = '" . $kode . "', `judul` = '" . $nama . "', `link` = '" . $linkBerkas . "', `deskripsi` = '" . $penjelasan . "' WHERE `materi`.`id` = '" . $ID . "'";
	
 ?>
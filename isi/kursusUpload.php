<?php 
	include '../koneksi.php';
	
	$penjelasan = $_POST['penjelasan'];
	$nama = $_POST['nama'];
	$materi = $_POST['id_materi'];
	$mulai = $_POST['waktu_mulai'];
	$selesai = $_POST['waktu_selesai'];
	



	$query = "INSERT INTO `kursus` (`id`, `judul`, `mulai`, `selesai`, `deskripsi`, `id_materi`) VALUES (NULL,'" . $nama . "','" . $mulai . "','" . $selesai . "','" . $penjelasan . "','" . $materi . "') ";
	
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


 ?>
<?php 
	include '../koneksi.php';
	
	$ID = $_GET['url']; 
	
	$kode = $_POST['kode'];
	$penjelasan = $_POST['penjelasan'];
	$nama = $_POST['nama'];
	$namaFile = $_FILES['berkas']['name'];
	$x = explode('.', $namaFile);
	$ekstensiFile = strtolower(end($x));
	$ukuranFile	= $_FILES['berkas']['size'];
	$file_tmp = $_FILES['berkas']['tmp_name'];

	$dirUpload = "file/";
	$linkBerkas = $dirUpload.$namaFile;

	$terupload = move_uploaded_file($file_tmp, $linkBerkas);



	$query = "UPDATE `materi` SET `id` = '" . $kode . "', `judul` = '" . $nama . "', `link` = '" . $linkBerkas . "', `deskripsi` = '" . $penjelasan . "' WHERE `materi`.`id` = '" . $ID . "'";
	
	 	$result = mysqli_query(koneksiDB(), $query);

 
	if ($terupload && $result) {
		echo "Upload berhasil!";
	    header("Location: ../index.php?module=beranda", true, 301);
        exit();
	} else {
	    echo "Upload Gagal!";
	    header("Location: materihalaman_edit.php", true, 301);
        exit();
	}


 ?>
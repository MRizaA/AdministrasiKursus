<?php 
	include '../koneksi.php';
	
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



	$query = "INSERT INTO `materi` (`id`, `judul`, `link`, `deskripsi`) VALUES (NULL,'" . $nama . "','" . $linkBerkas . "','" . $penjelasan . "') ";
	
	 	$result = mysqli_query(koneksiDB(), $query);

 
	if ($terupload && $result) {
		echo "Upload berhasil!";
	    header("Location: ../index.php?module=beranda", true, 301);
        exit();
	} else {
	    echo "Upload Gagal!";
	    header("Location: materihalaman_upload.php", true, 301);
        exit();
	}


 ?>
<?php
require_once "koneksi.php";
	if ($_GET['module'] == 'beranda') {
		include "isi/beranda.php";
	}
	elseif ($_GET['module'] == 'daftarkursus') {
		include "isi/daftar.php";
	}
	
	elseif ($_GET['module'] == 'buatkursus') {
		include "isi/kursus.php";
	}
	elseif ($_GET['module'] == 'lihatkursus') {
		include "isi/kursus2.php";
	}

	elseif ($_GET['module'] == 'buatmateri') {
		include "isi/materi.php";
	}
?>
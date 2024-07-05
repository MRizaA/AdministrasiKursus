<?php
include '../koneksi.php';
$ID = $_GET['url'];

$query = mysqli_query(koneksiDB(), "DELETE FROM `kursus` WHERE `id` ='" . $ID . "';");

if ($query) {
    echo "Data berhasil dihapus.";
	header("Location: ../index.php?module=beranda", true, 301);
	exit();
} else {
    echo "Gagal menghapus data.";
	header("Location: ../index.php?module=beranda", true, 301);
	exit();
}
?>

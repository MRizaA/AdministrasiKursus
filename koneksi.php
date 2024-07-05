<?php 

function koneksiDB() {
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "db_kursus";

    $conn = mysqli_connect($host, $username, $password, $db);
    
    if(!$conn) {
        die("Koneksi Database Gagal : " .mysqli_connect_error());
    } else {
        return $conn;
    }
}






function lihatmateri() {
    $result = mysqli_query(koneksiDB(), "SELECT * FROM `materi`;");
    return $result;}


function hapusMateri($id_materi) {
    $koneksi = koneksiDB(); 
    $query = "DELETE FROM `materi` WHERE `id` = $id_materi;";
    $result = mysqli_query($koneksi, $query);
    return $result;
}



function lihatkursus() {
    $query ="SELECT kursus.id as id_kursus, kursus.judul as judulkursus, materi.judul as judulmateri, kursus.deskripsi as deskripsikursus, kursus.mulai as awal, kursus.selesai as akhir, materi.link as materi FROM kursus LEFT JOIN materi ON kursus.id_materi = materi.id";
    return $query;
}


function peserta() {
    $query ="SELECT peserta.id as id_peserta, user.nama as namapeserta, kursus.id as id_kursus, kursus.judul as judulkursus, materi.judul as judulmateri, kursus.deskripsi as deskripsikursus, kursus.mulai as awal, kursus.selesai as akhir, materi.link as materi FROM peserta LEFT JOIN user ON peserta.id_user = user.id LEFT JOIN kursus ON peserta.id_kursus = kursus.id LEFT JOIN materi ON kursus.id_materi = materi.id";
    return $query;
}

function caripeserta($ID) {
	$query = peserta()." WHERE kursus.id='" . $ID. "'";
	$result = mysqli_query(koneksiDB(),$query);
	 return $result;}

function hitungpeserta($ID) {
	$result = caripeserta($ID);
	$countData = mysqli_num_rows($result);
	 return $countData;}
     
 ?>
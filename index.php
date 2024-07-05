<?php
require('koneksi.php');
session_start();

if( !isset($_SESSION['username']) ){
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: login/login.php');
}
$username=$_SESSION['username'];
$result = mysqli_query(koneksiDB(), "SELECT id,nama,username FROM user WHERE username = '$username'");
$nama= mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kursus online riza</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="sistem kursus online">
    <meta name="author" content="Muhammad Riza Aditya" />
    
    <link rel="shortcut icon" href="assets/img/logo1.png" />

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        nav {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .container {
            display: flex;
        }

        .sidebar {
            background-color: lightgrey;
            padding: 10px;
        }

        .content {
            flex: 1;
            padding: 15px;
        }

        .navbar-brand {
            margin: 0;
            font-size: 24px;
        }

        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-left: 10px;
        }

        .jumbotron {
            background-color: #f8f9fa;
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <nav>
        <div class="navbar-brand">KURSUS RIZA</div>
        <div class="navbar-nav">
            <div class="nav-item"><?php echo $nama['nama']; ?></div>
            <div class="nav-item"><a href="login/logout.php" style="color: white;">Log Out</a></div>
        </div>
    </nav>

    <div class="container">
        <aside class="sidebar">
            <?php include "sidebar-menu.php" ?>
        </aside>

        <div class="content">
            <?php include "content.php" ?>
        </div>
    </div>
</body>
</html>
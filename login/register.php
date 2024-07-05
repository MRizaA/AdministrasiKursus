<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- costum css -->
<link rel="stylesheet" href="style.css">
</head>
 
<body>
<?php

require('../koneksi.php');

session_start();

$error = '';
$validate = '';
if( isset($_SESSION['user']) ) header('Location: ../index.php');

if( isset($_POST['submit']) ){
        
        
        $nama = stripslashes($_POST['nama']);
        $nama = mysqli_real_escape_string(koneksiDB(), $nama);
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string(koneksiDB(), $username);
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string(koneksiDB(), $password);
        $repass   = stripslashes($_POST['repassword']);
        $repass   = mysqli_real_escape_string(koneksiDB(), $repass);
        
        if(!empty(trim($username)) && !empty(trim($nama)) && !empty(trim($password)) && !empty(trim($repass))){
    
            if($password == $repass){
               
                if( cek_username($username,koneksiDB()) == 0 ){
                   
                    $query = "INSERT INTO user (nama, username, password ) VALUES ('$nama','$username','$password')";
                    $result   = mysqli_query(koneksiDB(), $query);
                   
                    if ($result) {
                        $_SESSION['username'] = $username;
                       
                        header('Location: ../index.php?module=beranda');
                    
                    } else {
                        $error =  'Register User Gagal !!';
                    }
                }else{
                        $error =  'username sudah terdaftar !!';
                }
            }else{
                $validate = 'pasword tidak sama !!';
            }
            
        }else {
            $error =  'Data tidak boleh kosong !!';
        }
    } 

    function cek_username($username,$con){
        $email = mysqli_real_escape_string($con, $username);
        $query = "SELECT * FROM user WHERE username = '$email'";
        if( $result = mysqli_query($con, $query) ) return mysqli_num_rows($result);
    }
?>
        <section class="container-fluid mb-4">
            
            <section class="row justify-content-center">
            <section class="col-12 col-sm-6 col-md-4">
                <form class="form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                    <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>
                   
                   
                    <div class="form-group">
                        <label for="nama">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Masukan password">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <div class="form-group">
                        <label for="InputPassword">Re-password</label>
                        <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Masukan password kembali">
                        <?php if($validate != '') {?>
                            <p class="text-danger"><?= $validate; ?></p>
                        <?php }?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                    <div class="form-footer mt-2">
                        <p> Sudah punya account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </section>
            </section>
        </section>

    <!-- Bootstrap requirement jQuery pada posisi pertama, kemudian Popper.js, dan  yang terakhit Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
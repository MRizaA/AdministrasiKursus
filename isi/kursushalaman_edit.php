<?php
include '../koneksi.php';
 $ID = $_GET['url']; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload dan Download File PDF Dengan PHP Dan MySQL</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">Form edit File</h2>
	<hr>
	<form action="materiedit.php?url= <?php echo $ID; ?>" method="post" enctype="multipart/form-data">
		<b>ID:</b>
		<input type="text" name="kode" value="<?php echo $ID; ?>" placeholder=""><br /><br />
		<b>judul:</b>
		<input type="text" name="nama" value="" placeholder=""><br /><br />
		<b>Deskripsi:</b>
		<input type="text" name="penjelasan" value="" placeholder=""><br /><br />
		<b>Waktu mulai:</b>
        <input type="datetime-local" name="waktu_mulai"><br /><br />
		<b>Waktu selesai:</b>
        <input type="datetime-local" name="waktu_selesai"><br /><br />
		<b>Pilih materi:</b><br />
    <select name="id_materi">
        <option value="">Pilih Data</option>
        <?php
        $materi_list = lihatmateri();
        while ($row = mysqli_fetch_assoc($materi_list)) {
			echo "<option value= '" . $row['id'] . "' \> '" . $row['judul'] . "'</option>";
        }
        ?>
    </select><br /><br />
		<button type="submit">Upload File</button>
	</form>
	<hr>
</body>
</html>
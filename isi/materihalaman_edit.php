<?php $ID = $_GET['url']; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Upload dan Download File PDF Dengan PHP Dan MySQL</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">Form edit File (PDF)</h2>
	<hr>
	<form action="materiedit.php?url= <?php echo $ID; ?>" method="post" enctype="multipart/form-data">
		<b>ID:</b>
		<input type="text" name="kode" value="<?php echo $ID; ?>" placeholder=""><br /><br />
		<b>Judul:</b>
		<input type="text" name="nama" value="" placeholder=""><br /><br />
		<b>Deskripsi:</b>
		<input type="text" name="penjelasan" value="" placeholder=""><br /><br />
		<b>Upload File :</b>
		<input type="file" name="berkas" accept="application/pdf">
		<button type="submit">Upload File</button>
	</form>
	<hr>
</body>
</html>
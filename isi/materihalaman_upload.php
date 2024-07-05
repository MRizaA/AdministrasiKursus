<!DOCTYPE html>
<html>
<head>
	<title>Upload dan Download File PDF Dengan PHP Dan MySQL</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">Form Upload File (PDF)</h2>
	<hr>
	<form action="materiUpload.php" method="post" enctype="multipart/form-data">
		<b>judul:</b>
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
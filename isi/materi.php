<!DOCTYPE html>
<html>
<head>
	<title>edit materi</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">daftar materi</h2>

	<button onclick="document.location='isi/materihalaman_upload.php'">Tambah Data</button>
	<br /><br />

	<table border="1" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Deskripsi</th>
				<th>aksi</th>
				
			</tr>
		</thead>
		<tbody style="text-align: center;">
			<?php






		       
		        $nomor_urut = 0;
		        $result = lihatmateri();
		        $countData = mysqli_num_rows($result);

		        if ($countData < 1) { 
	        ?>	
			        <tr>
		                <td colspan="5" style="text-align: center; font-weight: bold; font-size: 12px; padding: 5px; color: red">TIDAK ADA DATA</td>
		            </tr>

            <?php
	        	} else {
		            while ($row = mysqli_fetch_assoc($result)) {
		                $nomor_urut = $nomor_urut + 1;
            ?>
						<tr>
							<td><?php echo $nomor_urut; ?></td>
							<td><?php echo $row['judul']; ?></td>
							<td><?php echo $row['deskripsi']; ?></td>
							<td>
							<div><a href="isi/DownloadFile.php?url=<?php echo $row['link']; ?>">Download</a></div>
							<a href="isi/baca.php?url=<?php echo $row['link']; ?>">Baca</a></div>
							<div><a href="isi/materihalaman_edit.php?url=<?php echo $row['id']; ?>">Edit</a></div>
							<div><a href="isi/materidelete.php?url=<?php echo $row['id']; ?>">Delete</a></div>
						    </td>
						</tr>
						
			<?php 
					}
        		} 
        	?>
		</tbody>
	</table>
	
</body>
</html>
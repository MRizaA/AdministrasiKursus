<!DOCTYPE html>
<html>
<head>
	<title>edit kursus</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">daftar materi</h2>

	<button onclick="document.location='isi/kursushalaman_upload.php'">Tambah Data</button>
	<br /><br />

	<table border="1" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Deskripsi</th>
				<th>Waktu</th>
				<th>Materi</th>
				<th>Pesrta</th>
				<th>aksi</th>
				
			</tr>
		</thead>
		<tbody style="text-align: center;">
			<?php





		       
		        $nomor_urut = 0;
		        $result = mysqli_query(koneksiDB(),lihatkursus());
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
							<td><?php echo $row['judulkursus']; ?></td>
							<td><?php echo $row['deskripsikursus']; ?></td>
							<td><div><?php echo $row['awal']; ?></div><div> hingga </div><div><?php echo $row['akhir']; ?></div></td>
							<td>
							<div><a href="isi/DownloadFile.php?url=<?php echo $row['materi']; ?>">Download</a></div>
							<a href="isi/baca.php?url=<?php echo $row['materi']; ?>">Baca</a></div>
					        </td><td>
							<div><?php echo hitungpeserta($row['id_kursus']); ?> <a href="isi/peserta.php?url=<?php echo $row['id_kursus']; ?>">Peserta</a></div>
							</td><td>
							<div><a href="isi/kursushalaman_edit.php?url=<?php echo $row['id_kursus']; ?>">Edit</a></div>
							<div><a href="isi/kursusdelete.php?url=<?php echo $row['id_kursus']; ?>">Delete</a></div>
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
<!DOCTYPE html>
<html>
<head>
	<title>daftar peserta</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">daftar kursus</h2>

	<table border="1" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Judul</th>
				<th>Waktu</th>
				<th>Materi</th>
				<th>aksi</th>
				
			</tr>
		</thead>
		<tbody style="text-align: center;">
			<?php




function lihatpeserta($ID) {
   $query = peserta()." WHERE user.id='" . $ID. "'";
    return $query;}

		       
		        $nomor_urut = 0;
				$Id= $nama['id']; 
		        $result = mysqli_query(koneksiDB(),lihatpeserta($Id));
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
							<td><?php echo $row['namapeserta']; ?></td>
							<td><?php echo $row['judulkursus']; ?></td>
							<td><div><?php echo $row['awal']; ?></div><div> hingga </div><div><?php echo $row['akhir']; ?></div></td>
							<td>
							<div><a href="isi/DownloadFile.php?url=<?php echo $row['materi']; ?>">Download</a></div>
							<a href="isi/baca.php?url=<?php echo $row['materi']; ?>">Baca</a></div>
					</td><td>
							<div><a href="isi/pesertadelete.php?url=<?php echo $row['id_peserta']; ?>">Batal</a></div>
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
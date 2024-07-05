<!DOCTYPE html>
<html>
<head>
	<title>edit kursus</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">daftar kursus</h2>


	<table border="1" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Deskripsi</th>
				<th>Waktu</th>
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
							<div><a href="isi/daftarpeserta.php?url=<?php echo $row['id_kursus']; ?>&iduser=<?php echo $nama['id']; ?>">Daftar</a></div>
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
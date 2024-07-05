<?php
include '../koneksi.php';
$ID = $_GET['url'];?>

<!DOCTYPE html>
<html>
<head>
	<title>peserta</title>
</head>
<body style="width: 800px; margin: auto; padding: 10px;">
	<h2 style="text-align: center;">daftar peserta</h2>

	<button onclick="window.location.href='../index.php?module=beranda'">Kembali</button>
	<br /><br />

	<table border="1" style="width: 100%; border-collapse: collapse;">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>aksi</th>
				
			</tr>
		</thead>
		<tbody style="text-align: center;">
			<?php
		       
		        $nomor_urut = 0;
		        $result = caripeserta($ID);
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
							<td>
							<div><a href="isi/pesertadelete.php?url=<?php echo $row['id_peserta']; ?>">Delete</a></div>
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
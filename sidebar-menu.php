
<style>
	.active{background-color: lightblue;}
	ul{list-style: none;}
</style>

<?php 
$username=$_SESSION['username'];
$result = mysqli_query(koneksiDB(), "SELECT status FROM user WHERE username = '$username'");
$smt= mysqli_fetch_assoc($result);
if ($smt['status']=="admin") { ?>
    <ul class="sidebar-menu">

	<?php 
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class=""></i> Beranda </a>
	  	</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=beranda"><i class=""></i> Beranda </a>
	  	</li>
	<?php
	}

	if ($_GET["module"]=="buatkursusS") { ?>
		<li class="active">
			<a href="?module=buatkursus"><i class=""></i>Kursus</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=buatkursus"><i class=""></i>Kursus</a>
		</li>
	<?php
	}
		if ($_GET["module"]=="buatmateri") { ?>
			<li class="active">
				<a href="?module=buatmateri"><i class=""></i>Materi</a>
			</li>
		<?php
		}
		else { ?>
			<li>
				<a href="?module=buatmateri"><i class=""></i>Materi</a>
			</li>
		<?php
		}
		?>
	</ul>
	

<?php
}else { ?>
		<ul class="sidebar-menu">
		<?php 
		if ($_GET["module"]=="beranda") { ?>
			<li class="active">
				<a href="?module=beranda"><i class=""></i> Beranda </a>
			  </li>
		<?php
		}
		else { ?>
			<li>
				<a href="?module=beranda"><i class=""></i> Beranda </a>
			  </li>
		<?php
		}
		if ($_GET["module"]=="daftarkursus") { ?>
			<li class="active">
				<a href="?module=daftarkursus"><i class=""></i>Daftar</a>
			</li>
		<?php
		}
		else { ?>
			<li>
				<a href="?module=daftarkursus"><i class=""></i>Daftar</a>
			</li>
		<?php
		}
		if ($_GET["module"]=="lihatkursus") { ?>
			<li class="active">
				<a href="?module=lihatkursus"><i class=""></i>Telah terdaftar</a>
			</li>
		<?php
		}
		else { ?>
			<li>
				<a href="?module=lihatkursus"><i class=""></i>Telah terdaftar</a>
			</li>
		<?php
		}
		?>
		</ul> 
	<?php
	}
	 ?>
<?php

 ?>
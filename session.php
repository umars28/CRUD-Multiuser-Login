<?php
	
	
	include 'koneksi.php';
	if (empty($_SESSION['username'])) {
		echo "
			<script>
			alert('anda harus login dulu bambang !');
			document.location.href='../../index.php';
			</script>
			";
			exit;
	}

	$sesi = $_SESSION['level'];
	if ($sesi != 'admin') {
		echo "
			<script>
			alert('halaman ini hanya untuk admin');
			document.location.href='../../dashboard_user.php';
			</script>
			";
			exit;
	}
	
?>
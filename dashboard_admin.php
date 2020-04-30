<?php
	session_start();
	include 'koneksi.php';
	if (empty($_SESSION['username'])) {
		echo "
			<script>
			alert('anda harus login dulu bambang !');
			document.location.href='index.php';
			</script>
			";
			exit;
	}

	$sesi = $_SESSION['level'];
	if ($sesi != 'admin') {
		echo "
			<script>
			alert('halaman ini hanya untuk admin');
			document.location.href='dashboard_user.php';
			</script>
			";
			exit;
	}
	
	$username = $_SESSION['username'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>umar website</title>
</head>
<body>
	<h1>Selamat datang : <b> <?php echo $_SESSION['nama']; ?></b></h1>
	<h2>selamat datang admin : <?php echo $username; ?></h2>
	<h4><b><a href="admin/pengguna/index.php">DATA PENGGUNA</a></b></h4>
	<h4><b><a href="admin/barang/index.php">DATA BARANG</a></b></h4>
	<br><br>
	<h5><b><i><a href="logout.php" onclick="return confirm('Anda akan keluar dari halaman ini ?')">LOGOUT</a></i></b></h5>

</body>
</html>

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
	if ($sesi != 'user') {
		echo "
			<script>
			alert('halaman ini hanya untuk user');
			document.location.href='dashboard_admin.php';
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

	<h1>Selamat datang : <b><i> <?php echo $_SESSION['nama']; ?></i></b></h1>
	<h2>selamat datang user : <?php echo $username; ?></h2>
	
	<h5><b><i><a href="logout.php" onclick="return confirm('Anda akan keluar dari halaman ini ?')">LOGOUT</a></i></b></h5>

</body>
</html>
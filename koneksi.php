<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "php3";
	$kon = mysqli_connect($host,$user,$pass,$db);
	$sql = mysqli_select_db($kon,$db);

	if (!$sql) {
		echo "koneksi gagal";
	}
	
?>
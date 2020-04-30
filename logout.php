<?php
	session_start();
	include 'koneksi.php';
	$_SESSION['username'];
	$_SESSION['level'];
	$_SESSION['nama'];
	unset($_SESSION['username']);
	unset($_SESSION['level']);
	unset($_SESSION['nama']);
	session_unset();
	session_destroy();
	
	header('location:index.php');
?>
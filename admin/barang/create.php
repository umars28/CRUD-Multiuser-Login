<?php
	session_start();
	include '../../koneksi.php';
	require '../../session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>umar website</title>
</head>
<body>
	<h4><b><a href="../../dashboard_admin.php">KEMBALI</a></b></h4>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr>
				<td><label for="nama">nama barang</label></td>
				<td><input type="text" name="nama_barang" placeholder="masukan nama barang" id="nama" required></td>
			</tr>
			<tr>
				<td><label for="stok">stok</label></td>
				<td><input type="number" name="stok" placeholder="masukan stok" id="stok" required></td>
			</tr>
			<tr>
				<td><label for="warna_barang">warna barang</label></td>
				<td><input type="text" name="warna_barang" placeholder="masukan warna barang" id="warna_barang" required></td>
			</tr>
			<tr>
				<td><label for="harga">harga</label></td>
				<td><input type="number" name="harga" placeholder="masukan harga" id="harga" required></td>
			</tr>
		</table>
		<button type="submit" name="submit" onclick="return confirm('anda ingin menambahkan data ?')">Tambah</button>
		<button type="reset" name="reset">Batal</button>
	</form>

	<?php

		
		include '../../koneksi.php';
		
		function input($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = strip_tags($data);
			$data = stripslashes($data);
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$nama_barang = input($_POST['nama_barang']);
			$stok = input($_POST['stok']);
			$warna_barang = input($_POST['warna_barang']);
			$harga = input($_POST['harga']);
			

			$sql = "INSERT INTO barang (nama_barang,stok,warna_barang,harga) VALUES('$nama_barang','$stok','$warna_barang','$harga')";
			$query = mysqli_query($kon,$sql);
			if ($query) {
				echo "
						<script>
						alert('Data berhasil ditambah');
						document.location.href='index.php';
						</script>
					";
			}else {
				echo "
						<script>
						alert('Data gagal ditambah');
						document.location.href='index.php';
						</script>
					";
			}
		}
	?>

</body>
</html>
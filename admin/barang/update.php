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
	<?php
		
		include '../../koneksi.php';
		
		if (isset($_GET['id_barang'])) {
			$id_barang = htmlspecialchars($_GET['id_barang']);
			$sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
			$query = mysqli_query($kon,$sql);
			$hasil = mysqli_fetch_assoc($query);
		}
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
			$id_barang = input($_POST['id_barang']);

			$sql = "UPDATE barang SET nama_barang='$nama_barang',stok='$stok',warna_barang='$warna_barang',harga='$harga'  WHERE id_barang='$id_barang'";
			$query = mysqli_query($kon,$sql);
			if ($query) {
				echo "
						<script>
						alert('Data berhasil diubah');
						document.location.href='index.php';
						</script>
					";
			} else {
				echo "
						<script>
						alert('Data gagal diubah');
						document.location.href='update.php';
						</script>
					";
			}
			}
	?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr>
				<td><label for="nama_barang">nama_barang</label></td>
				<td><input type="text" name="nama_barang" placeholder="masukan nama_barang" id="nama_barang" required value="<?php echo $hasil['nama_barang']; ?>"></td>
			</tr>
			<tr>
				<td><label for="stok">stok</label></td>
				<td><input type="number" name="stok" placeholder="masukan stok" id="stok" required value="<?php echo $hasil['stok']; ?>"></td>
			</tr>
			<tr>
				<td><label for="warna_barang">warna_barang</label></td>
				<td><input type="text" name="warna_barang" placeholder="masukan warna_barang" id="warna_barang" required value="<?php echo $hasil['warna_barang']; ?>"></td>
			</tr>
			<tr>
				<td><label for="harga">harga</label></td>
				<td><input type="number" name="harga" placeholder="masukan harga" id="harga" required value="<?php echo $hasil['harga']; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_barang" value="<?php echo $hasil['id_barang']; ?>"></td>
			</tr>
		</table>
		<button type="submit" name="submit" onclick="return confirm('anda ingin mengubah data ?')">Update</button>
		<button type="reset" name="reset">Batal</button>
	</form>

</body>
</html>
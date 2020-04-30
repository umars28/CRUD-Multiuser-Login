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
		<table border="1" cellspacing="2" cellpadding="10">
			<thead>
				<tr>
					<th>no</th>
					<th>nama barang</th>
					<th>stok</th>
					<th>warna barang</th>
					<th>harga</th>
					<th>aksi</th>
				</tr>
			</thead>
			<?php 
				include '../../koneksi.php';
				$sql = "SELECT * FROM barang ORDER BY id_barang DESC";
				$query = mysqli_query($kon,$sql);
				$no = 0;
				while ($data=mysqli_fetch_assoc($query)) {
					$no++;
			?>
			<tbody>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama_barang']; ?></td>
					<td><?php echo $data['stok']; ?></td>
					<td><?php echo $data['warna_barang']; ?></td>
					<td><?php echo $data['harga']; ?></td>
					<td>
						<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>" onclick="return confirm('ingin menghapus data ?')" onclick="return confirm('anda ingin menghapus data ?')">delete</a>
						<a href="update.php?id_barang=<?php echo htmlspecialchars($data['id_barang']); ?>">update</a>
					</td>
				</tr>
			</tbody>
		<?php } ?>
		</table>
		<h4><b><a href="create.php">TAMBAH DATA BARANG</a></b></h4>
	<?php

		
		include '../../koneksi.php';
		
		if (isset($_GET['id_barang'])) {
			$id_barang = $_GET['id_barang'];
			$sql = "DELETE FROM barang WHERE id_barang='$id_barang'";
			$query = mysqli_query($kon,$sql);
			if ($query) {
				echo "
						<script>
						alert('data berhasil dihapus');
						document.location.href='index.php';
						</script>
					";
			} else {
				echo "
						<script>
						alert('data gagal dihapus');
						document.location.href='index.php';
						</script>
					";
			}
		}
	?>

</body>
</html>
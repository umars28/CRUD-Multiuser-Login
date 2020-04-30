<?php
	session_start();
	
	require '../../session.php';
	
				
?>	
<!DOCTYPE html>
<html>
<head>
	<title>umar website</title>
</head>
<body>
	<h4><b><a href="../../dashboard_admin.php">KEMBALI</a></b></h4>

	
	<br>
		<table border="1" cellspacing="2" cellpadding="10">
			<thead>
				<tr>
					<th>no</th>
					<th>nama</th>
					<th>username</th>
					<th>alamat</th>
					<th>no hp</th>
					<th>password</th>
					<th>level</th>
					<th>aksi</th>
				</tr>
			</thead>
			<?php 

				include '../../koneksi.php';
				
				$sql = "SELECT * FROM user ORDER BY id_user DESC";
				$query = mysqli_query($kon,$sql);
				$no = 0;
			
				while ($data=mysqli_fetch_assoc($query)) {
					$no++;

			?>
			<tbody>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['username']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
					<td><?php echo $data['no_hp']; ?></td>
					<td><?php echo $data['password']; ?></td>
					<td><?php echo $data['level']; ?></td>
					<td>
						<a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id_user=<?php echo htmlspecialchars($data['id_user']); ?>" onclick="return confirm('ingin menghapus data ?')" onclick="return confirm('anda ingin menghapus data ?')">delete</a>
						<a href="update.php?id_user=<?php echo htmlspecialchars($data['id_user']); ?>">update</a>
					</td>
				</tr>
			</tbody>
		<?php } ?>

	
		</table>
		<h4><b><a href="<?php echo $_SERVER['PHP_SELF']; ?>">TAMBAH PENGGUNA</a></b></h4>
	<?php
		
		include '../../koneksi.php';
		
		if (isset($_GET['id_user'])) {
			$id_user = $_GET['id_user'];
			$sql = "DELETE FROM user WHERE id_user='$id_user'";
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
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
		
		if (isset($_GET['id_user'])) {
			$id_user = htmlspecialchars($_GET['id_user']);
			$sql = "SELECT * FROM user WHERE id_user = '$id_user'";
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
			$nama = input($_POST['nama']);
			$username = input($_POST['username']);
			$alamat = input($_POST['alamat']);
			$no_hp = input($_POST['no_hp']);
			$password = input($_POST['password']);
			$level = input($_POST['level']);
			$id_user = input($_POST['id_user']);

			$sql = "UPDATE user SET nama='$nama',username='$username',alamat='$alamat',no_hp='$no_hp',password='$password',level='$level' WHERE id_user='$id_user'";
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
				<td><label for="nama">nama</label></td>
				<td><input type="text" name="nama" placeholder="masukan nama" id="nama" required value="<?php echo $hasil['nama']; ?>"></td>
			</tr>
			<tr>
				<td><label for="username">username</label></td>
				<td><input type="text" name="username" placeholder="masukan username" id="username" required value="<?php echo $hasil['username']; ?>"></td>
			</tr>
			<tr>
				<td><label for="alamat">alamat</label></td>
				<td><input type="text" name="alamat" placeholder="masukan alamat" id="alamat" required value="<?php echo $hasil['alamat']; ?>"></td>
			</tr>
			<tr>
				<td><label for="hp">no hp</label></td>
				<td><input type="number" name="no_hp" placeholder="masukan no hp" id="hp" required value="<?php echo $hasil['no_hp']; ?>"></td>
			</tr>
			<tr>
				<td><label for="pass">password</label></td>
				<td><input type="password" name="password" placeholder="masukan password" id="pass" required value="<?php echo $hasil['password']; ?>"></td>
			</tr>
			<tr>
				<td><label>level</label></td>
				<td>
					<select name="level" value="<?php echo $hasil['level']; ?>">level
					<option>admin</option>
					<option>user</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_user" value="<?php echo $hasil['id_user']; ?>"></td>
			</tr>
		</table>
		<button type="submit" name="submit" onclick="return confirm('anda ingin mengubah data ?')">Update</button>
		<button type="reset" name="reset">Batal</button>
	</form>

</body>
</html>
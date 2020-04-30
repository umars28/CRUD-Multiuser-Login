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
				<td><label for="nama">nama</label></td>
				<td><input type="text" name="nama" placeholder="masukan nama" id="nama" required></td>
			</tr>
			<tr>
				<td><label for="username">username</label></td>
				<td><input type="text" name="username" placeholder="masukan username" id="username" required></td>
			</tr>
			<tr>
				<td><label for="alamat">alamat</label></td>
				<td><input type="text" name="alamat" placeholder="masukan alamat" id="alamat" required></td>
			</tr>
			<tr>
				<td><label for="hp">no hp</label></td>
				<td><input type="number" name="no_hp" placeholder="masukan no hp" id="hp" required></td>
			</tr>
			<tr>
				<td><label for="pass">password</label></td>
				<td><input type="password" name="password" placeholder="masukan password" id="pass" required></td>
			</tr>
			<tr>
				<td><label>level</label></td>
				<td>
					<select name="level">level
					<option>admin</option>
					<option>user</option>
					</select>
				</td>
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
			$nama = input($_POST['nama']);
			$username = input($_POST['username']);
			$alamat = input($_POST['alamat']);
			$no_hp = input($_POST['no_hp']);
			$password = input($_POST['password']);
			$level = input($_POST['level']);

			$lihat = "SELECT * FROM user WHERE username='$username'";
			$has = mysqli_query($kon,$lihat);
			$dat = mysqli_fetch_assoc($has);
			if ($dat > 0) {
				echo "
						<script>
						alert('username sudah terdaftar !');
						document.location.href='create.php';
						</script>
					";
					exit;
			}

			$sql = "INSERT INTO user (nama,username,alamat,no_hp,password,level) VALUES('$nama','$username','$alamat','$no_hp','$password','$level')";
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
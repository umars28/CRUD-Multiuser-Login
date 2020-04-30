<!DOCTYPE html>
<html>
<head>
	<title>umar website</title>
</head>
<body>
	<h2>Silahkan Daftar</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table>
		<tr>
			<td><label for="nama">nama</label></td>
			<td><input type="text" name="nama" placeholder="masukan nama" id="nama" required></td>
		</tr>
		<tr>
			<td><label for="user">username</label></td>
			<td><input type="text" name="username" placeholder="masukan username" id="user" required></td>
		</tr>
		<tr>
			<td><label for="alamat">alamat</label></td>
			<td><input type="text" name="alamat" placeholder="masukan alamat" id="alamat" required></td>
		</tr>
		<tr>
			<td><label for="hp">no hp</label></td>
			<td><input type="text" name="no_hp" placeholder="masukan no hp" id="hp" required></td>
		</tr>
		<tr>
			<td><label for="pass">password</label></td>
			<td><input type="password" name="password" placeholder="masukan password" id="pass" required></td>
		</tr>
		<tr>
			<td><label for="pass2">konfirmasi password</label></td>
			<td><input type="password" name="password2" placeholder="masukan password" id="pass2" required></td>
		</tr>
		
	</table>
			<button type="submit" name="submit">Daftar</button>
			<button type="reset" name="clear">batal</button>
		<h5>Sudah punya akun?<b><a href="index.php">Login !</a></b></h5>
	</form>
	<?php

	
		include 'koneksi.php';
		function input($data){
			$data = trim($data);
			$data = stripslashes($data);
			// $data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$nama = strtolower(input($_POST['nama']));
			$username = input($_POST['username']);
			$alamat = input($_POST['alamat']);
			$no_hp = input($_POST['no_hp']);
			$password = input($_POST['password']);
			$password2= input($_POST['password2']);
			$level = 'user';
		
			$sql = "SELECT username FROM user WHERE username='$username'";
			$hasil = mysqli_query($kon,$sql);
			$data = mysqli_fetch_assoc($hasil);
			
			if ($data > 0) {
					echo "
					<script>
					alert('username sudah terdaftar');
					</script>
					";
					exit;
			}	

			if (is_numeric($nama)) {
				echo "
					<script>
					alert('nama harus berupa huruf');
					</script>
					";
					exit;
			}

			if ($password != $password2) {
				echo "
					<script>
					alert('konfirmasi password tidak sama !');
					</script>
					";
					exit;
			}


			$sql = "INSERT INTO user (nama,username,alamat,no_hp,password,level) VALUES ('$nama','$username','$alamat','$no_hp','$password','$level')";
			$hasil = mysqli_query($kon,$sql);
			if ($hasil) {
				echo "
					<script>
					alert('berhasil daftar');
					document.location.href='index.php';
					</script>
					";
			} else {
				echo "
					<script>
					alert('gagal daftar');
					document.location.href='daftar.php';
					</script>
					";	
			}

		} 
	?>
	
</body>
</html>
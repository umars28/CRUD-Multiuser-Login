<!DOCTYPE html>
<html>
<head>
	<title>umar website</title>
</head>
<body>
	<h2>Silahkan Login</h2>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table>
		<tr>
			<td><label for="user">username</label></td>
			<td><input type="text" name="username" placeholder="masukan username" id="user" required></td>
		</tr>
		<tr>
			<td><label for="pass">password</label></td>
			<td><input type="password" name="password" placeholder="masukan password" id="pass" required></td>
		</tr>
		<tr>
			<td><label for="remember">Remember me ?</label></td>
			<td><input type="checkbox" name="remember" id="remember"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="id_user"></td>
		</tr>
	</table>
			<button type="submit" name="submit">login</button>
			<button type="reset" name="clear">batal</button>
		<h5>tidak punya akun?<b><a href="daftar.php">Daftar !</a></b></h5>
	</form>
	<?php
		session_start();
		include 'koneksi.php';
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$username = htmlspecialchars($_POST['username']);
			$password = htmlspecialchars($_POST['password']);

			$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
			$hasil = mysqli_query($kon,$sql);
			$data = mysqli_fetch_assoc($hasil);
			$_SESSION['username'] = $data['username'];
			$_SESSION['level'] = $data['level'];
			$_SESSION['nama'] = $data['nama'];

			
			$sesi = $_SESSION['level'];

			if (isset($_POST['remember'])) {
				setcookie('level',$data['level'], time() + 120);
			}
			
			
			if ($sesi) {
				if ($sesi == 'admin') {
					echo "
						<script>
			 			alert('berhasil login');
			 			document.location.href='dashboard_admin.php';
			 			</script>
			 		";
				}else {
					echo "
						<script>
			 			alert('berhasil login');
			 			document.location.href='dashboard_user.php';
			 			</script>
			 		";
				}

			} else {
					echo "
						<script>
			 			alert('username atau password salah !!!!!!!!!!!');
			 			document.location.href='index.php';
			 			</script>
			 		";
			}
		
		}
	?>
</body>
</html>
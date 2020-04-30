<?php
	include 'navbar.php';
	include 'sidebar.php';
?>
	
  


</body>
<div class="main-content">
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			Data Siswa
		</div>
		<div class="col-sm-6">
			<a href="" class="btn btn-danger float-right">Tambah Data Siswa</a>
		</div>
		<div class="card-body">
		<table id="example1" class="table table-hover ">
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

        include 'koneksi.php';
        
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
            <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?id_user=<?php echo htmlspecialchars($data['id_user']); ?>" onclick="return confirm('ingin menghapus data ?')" onclick="return confirm('anda ingin menghapus data ?')" class="btn btn-danger">delete</a>
            <a href="update.php?id_user=<?php echo htmlspecialchars($data['id_user']); ?>" class="btn btn-warning">update</a>
          </td>
        </tr>
      </tbody>
    <?php } ?>

  				
             </div>
			</div>
	
			</div>
		</div>
              </table>
	
 
	<?php
		
		include 'koneksi.php';
		
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

<?
	include 'footer.php';
?>
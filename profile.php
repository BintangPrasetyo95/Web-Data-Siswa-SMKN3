<?php  
$id = $_SESSION['user']['id_user'];
$query = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id' ");
$data = mysqli_fetch_array($query);

if (isset($_POST['nama_user'])) { 
	$id = $_SESSION['user']['id_user'];
	$nama = $_POST['nama_user'];
	$username = $_POST['username_user'];

	if (isset($_FILES['foto_user'])) {
		$foto = $_FILES['foto_user']['name'];
		$foto_tmp = $_FILES['foto_user']['tmp_name'];

		$fotobaru = rand() . '_' .$foto;

		$path = "assets/img/avatars/" . $fotobaru;

		if (move_uploaded_file($foto_tmp, $path)) {
			if (is_file("img/avatars/" . $data['foto_user']))
			unlink("img/avatars/" . $data['foto_user']);

			$query = mysqli_query($connect, "UPDATE user SET nama_user='$nama',username_user='$username',foto_user='$fotobaru' WHERE id_user='$id' ");
			$session = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id' ");

			if ($query) {
				$_SESSION['user'] = mysqli_fetch_array($session);
				echo "<script>alert('Profile Berhasil DiUpdate'); location.href='?page=profile'</script>";
			}
		}
	}

	$query = mysqli_query($connect, "UPDATE user SET nama_user='$nama',username_user='$username' WHERE id_user='$id' ");
	$session = mysqli_query($connect, "SELECT * FROM user WHERE id_user='$id' ");

	if ($query) {
		$_SESSION['user'] = mysqli_fetch_array($session);
		echo "<script>alert('Profile Berhasil DiUpdate'); location.href='?page=profile'</script>";
	}
}

if (isset($_POST['password_lama'])) {
	$username = $_SESSION['user']['username_user'];
	$password_lama = md5($_POST['password_lama']);
	$password_baru = md5($_POST['password_baru']);

	$query = mysqli_query($connect, "SELECT * FROM user WHERE username_user='$username' AND password_user='$password_lama' ");
	$data = mysqli_num_rows($query);

	if ($data == 0) {
		echo "<script>alert('Password lama tidak sesuai!'); location.href='?page=profile'</script>";
	}elseif ($_POST['password_baru'] != $_POST['konfirmasi_password_baru']) {
		echo "<script>alert('Konfirmasi Password tidak sesuai!'); location.href='?page=profile'</script>";
	}else{
		$query = mysqli_query($connect, "UPDATE user SET password_user='$password_baru' WHERE username_user='$username' ");
		if ($query) {
			echo "<script>alert('Password Berhasil di Update'); location.href='?page=profile'</script>";
		}
	}
}
?>
<h1 class="h3 d-inline align-middle">Profile</h1>
<div class="row">
	<div class="col-md-4 col-xl-4">
		<div class="card mb-3">
			<div class="card-header">
				<h5 class="card-title mb-0">Profile Details</h5>
			</div>
			<div class="card-body text-center">
				<img src="img/avatars/<?php echo $_SESSION['user']['foto_user'] ?>" 
				alt="<?php echo $_SESSION['user']['nama_user']; ?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
				<h5 class="card-title mb-0">
					<?php  
                	echo $_SESSION['user']['nama_user'];
                	?>
				</h5>									
			</div>
		</div>
	</div>

	<div class="col-4">
		<div class="card">
			<div class="card-header">

				<h5 class="card-title mb-0 text-center">Edit Profil</h5>
			</div>
			<div class="card-body h-100">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Nama Lengkap</label>
						<div class="col-12">
							<input type="text" name="nama_user" class="form-control" value="<?php echo $_SESSION['user']['nama_user']; ?>">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Username</label>
						<div class="col-12">
							<input type="text" name="username_user" class="form-control" value="<?php echo $_SESSION['user']['username_user']; ?>">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Avatar</label>
						<div class="col-12">
							<input type="file" name="foto_user" class="form-control">
						</div>
					</div>
					<div class="mb-3 text-center">
						<button class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php  

	?>
	<div class="col-4">
		<div class="card">
			<div class="card-header">

				<h5 class="card-title mb-0 text-center">Edit Password</h5>
			</div>
			<div class="card-body h-100">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">Password Lama</label>
						<div class="col-12">
							<input type="password" name="password_lama" class="form-control" required>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Password Baru</label>
						<div class="col-12">
							<input type="password" name="password_baru" class="form-control" required>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Konfirmasi Password Baru</label>
						<div class="col-12">
							<input type="password" name="konfirmasi_password_baru" class="form-control" required>
						</div>
					</div>
					<div class="mb-3 text-center">
						<button class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-danger">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
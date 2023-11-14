<?php  
error_reporting(0);

if (isset($_POST['nama_siswa'])) {
	$nis = $_POST['nis'];
	$nama_siswa = $_POST['nama_siswa'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	$id_kelas = $_POST['id_kelas'];
	$no_telp = $_POST['no_telp'];

	if ($nama_siswa == "" || $nis == "") {
		echo "<script>alert('Mohon Isi Data yang Diperlukan!')</script>";
	}else{
		$cek = mysqli_query($connect, "SELECT * FROM siswa WHERE nama_siswa='$nama_kelas' AND nis='$nis' ");
		$cek2 = mysqli_num_rows($cek);
		if ($cek2) {
			echo "<script>alert('Data Sudah Ada!')</script>";
		}else{
		$query = mysqli_query($connect, "INSERT INTO siswa (nis,nama_siswa,tanggal_lahir,jk,alamat,id_kelas,no_telp) VALUES ('$nis','$nama_siswa','$tanggal_lahir','$jk','$alamat','$id_kelas','$no_telp') ");
		}
	}

	if ($query) {
		echo "<script>alert('Data Berhasil Ditambahkan'); location.href='?page=siswa'</script>";
	}
}
?>

<h1 class="h3 mb-3">Tambah Siswa</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">NIS</label>
						<div class="col-sm-12">
							<input type="number" name="nis" class="form-control">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Nama Siswa</label>
						<div class="col-sm-12">
							<input type="text" name="nama_siswa" class="form-control">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Tanggal Lahir</label>
						<div class="col-sm-12">
							<input type="date" name="tanggal_lahir" class="form-control">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Jenis Kelamin</label>
						<div class="col-sm-12">
							<select name="jk" class="form-select">
								<option hidden></option>
								<option value="L">Laki - Laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Alamat</label>
						<div class="col-sm-12">
							<input type="text" name="alamat" class="form-control">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Kelas dan Jurusan</label>
						<div class="col-sm-12">
							<select name="id_kelas" class="form-select">
								<option hidden></option>
								<?php  
								$query = mysqli_query($connect, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
								while ($data = mysqli_fetch_array($query)) {
								?>								
								<option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['nama_kelas']; ?> - <?php echo $data['nama_jurusan']; ?></option>
								<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">No. Telp</label>
						<div class="col-sm-12">
							<input type="number" name="no_telp" class="form-control">
						</div>
					</div>
					<div class="mb-3">
						<button class="btn btn-primary">Simpan</button>
						<button type="reset" class="btn btn-danger"><i data-feather="refresh-ccw"></i></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
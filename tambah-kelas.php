<?php  
error_reporting(0);

if (isset($_POST['nama_kelas'])) {
	$nama_kelas = $_POST['nama_kelas'];
	$id_jurusan = $_POST['id_jurusan'];

	if ($nama_kelas == "") {
		echo "<script>alert('Mohon Isi Semua Data!')</script>";
	}else{
		$cek = mysqli_query($connect, "SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' AND id_jurusan='$id_jurusan' ");
		$cek2 = mysqli_num_rows($cek);
		if ($cek2) {
			echo "<script>alert('Data Sudah Ada!')</script>";
		}else{
		$query = mysqli_query($connect, "INSERT INTO kelas (nama_kelas,id_jurusan) VALUES ('$nama_kelas','$id_jurusan') ");
		}
	}

	if ($query) {
		echo "<script>alert('Data Berhasil Ditambahkan'); location.href='?page=kelas'</script>";
	}
}
?>

<h1 class="h3 mb-3">Tambah Kelas</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">Nama Kelas</label>
						<div class="col-sm-12">
							<input type="text" name="nama_kelas" class="form-control" placeholder="(Masukkan Nama Kelas)">
						</div>
					</div>
					<div class="mb-3">
						<label class="form-label">Nama Jurusan</label>
						<div class="col-sm-12">
							<select class="form-select" name="id_jurusan">
								<option hidden></option>
								<?php  
								$query = mysqli_query($connect, "SELECT * FROM jurusan");
								while ($data = mysqli_fetch_array($query)) {
								?>
								<option value="<?php echo $data['id_jurusan']; ?>">
									<?php echo $data['nama_jurusan']; ?>		
								</option>
								<?php
								}
								?>
							</select>
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
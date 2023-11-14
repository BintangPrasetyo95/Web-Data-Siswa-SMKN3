<?php  
error_reporting(0);

if (isset($_POST['nama_jurusan'])) {
	$nama_jurusan = $_POST['nama_jurusan'];

	if ($nama_jurusan == "") {
		echo "<script>alert('Mohon Isi Semua Data!')</script>";
	}else{
		$cek = mysqli_query($connect, "SELECT * FROM jurusan WHERE nama_jurusan='$nama_jurusan' ");
		$cek2 = mysqli_num_rows($cek);
		if ($cek2) {
			echo "<script>alert('Data Sudah Ada!')</script>";
		}else{
		$query = mysqli_query($connect, "INSERT INTO jurusan (nama_jurusan) VALUES ('$nama_jurusan') ");
		}
	}

	if ($query) {
		echo "<script>alert('Data Berhasil Ditambahkan'); location.href='?page=jurusan'</script>";
	}
}
?>

<h1 class="h3 mb-3">Tambah Jurusan</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">Nama Jurusan</label>
						<div class="col-sm-12">
							<input type="text" name="nama_jurusan" class="form-control" placeholder="(Masukkan Nama Jurusan)">
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
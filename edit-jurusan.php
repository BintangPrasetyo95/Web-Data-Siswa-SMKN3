<?php  
error_reporting(0);
$id = $_GET['id'];

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
			$query = mysqli_query($connect, "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id' ");	
		}
	}
	
	if ($query) {
		echo "<script>alert('Data Berhasil Diedit'); location.href='?page=jurusan'</script>";
	}
}
?>

<h1 class="h3 mb-3">Edit Jurusan</h1>
<?php  
$query = mysqli_query($connect, "SELECT * FROM jurusan WHERE id_jurusan='$id' ");
$data = mysqli_fetch_array($query);
?>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-body">
				<form action="" method="post">
					<div class="mb-3">
						<label class="form-label">Nama Jurusan</label>
						<div class="col-sm-12">
							<input type="text" name="nama_jurusan" class="form-control" value="<?php echo $data['nama_jurusan']; ?>">
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
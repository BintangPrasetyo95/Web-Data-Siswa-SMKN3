<h1 class="h3 mb-3">Kelas</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-header">
				<a href="?page=tambah-kelas" class="btn btn-success btn-sm">Tambah Kelas</a>
			</div>
			<div class="card-body">
				
			<table class="table table-bordered table-striped table-hover" id="kelas">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Kelas</th>
						<th>Nama Jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php  
						$i = 1;
						$query = mysqli_query($connect, "SELECT * FROM kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
						while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['nama_kelas']; ?></td>
						<td><?php echo $data['nama_jurusan']; ?></td>
						<td align="center">
							<a href="?page=edit-kelas&id=<?php echo $data['id_kelas']; ?>"><img src="img/edit.png" style="width: 30px; border-radius: 20%;"></a>
							<a href="?page=hapus-kelas&id=<?php echo $data['id_kelas']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data Kelas ini?')"><img src="img/delete.png" style="width: 30px; border-radius: 20%;"></a>
						</td>
					</tr>
					<?php  
					$i++;
					}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<script>
	let table = new DataTable('#kelas');
</script>
<h1 class="h3 mb-3">Jurusan</h1>
<div class="row">
	<div class="col-12">
		<div class="card flex-fill">
			<div class="card-header">
				<a href="?page=tambah-jurusan" class="btn btn-success btn-sm">Tambah Jurusan</a>
			</div>
			<div class="card-body">
				
			<table class="table table-bordered table-striped table-hover" id="jurusan">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Jurusan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$query = mysqli_query($connect, "SELECT * FROM jurusan");
						while ($data = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['nama_jurusan']; ?></td>
						<td align="center">
							<a href="?page=edit-jurusan&id=<?php echo $data['id_jurusan']; ?>"><img src="img/edit.png" style="width: 30px; border-radius: 20%;"></a>
							<a href="?page=hapus-jurusan&id=<?php echo $data['id_jurusan']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data Jurusan ini?')"><img src="img/delete.png" style="width: 30px; border-radius: 20%;"></a>
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
	let table = new DataTable('#jurusan');
</script>
<?php  
include 'connect.php';
?>
<script type="text/javascript">
	window.print();
</script>
<table border="1" width="100%" cellpadding="5" cellspacing="0">
		<tr>
			<th colspan="9">
				<h2 style="margin: 0;">Data Siswa</h2>
			</th>
		</tr>
		<tr>
			<th>No.</th>
			<th>NIS</th>
			<th>Nama Siswa</th>
			<th>Tanggal Lahir</th>
			<th>Jenis Kelamin</th>
			<th>Alamat</th>
			<th>Kelas</th>
			<th>Jurusan</th>
			<th>No. Telp</th>
		</tr>
	<tbody>
		<?php  
		if (isset($_GET['kelas'])) {
			$kelas = $_GET['kelas'];
			$query = mysqli_query($connect, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan WHERE nama_kelas='$kelas' ");
		}else{
			$query = mysqli_query($connect, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan");
		}
		$i = 1;
		while ($data = mysqli_fetch_array($query)) {						
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $data['nis']; ?></td>
			<td><?php echo $data['nama_siswa']; ?></td>
			<td><?php echo $data['tanggal_lahir']; ?></td>
			<td><?php if ($data['jk'] == 'L') {echo "Laki - Laki";}else{echo "Perempuan";} ?></td>
			<td><?php echo $data['alamat']; ?></td>
			<td><?php echo $data['nama_kelas']; ?></td>
			<td><?php echo $data['nama_jurusan']; ?></td>
			<td><?php echo $data['no_telp']; ?></td>
		</tr>
		<?php
		$i++;
		}
		?>
	</tbody>
</table>
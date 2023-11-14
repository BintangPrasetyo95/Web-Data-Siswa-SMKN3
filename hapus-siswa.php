<?php  
$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM siswa WHERE id_siswa='$id' ");
if ($query) {
	echo "<script>alert('Data Berhasil Dihapus'); location.href='?page=siswa'</script>";
}
?>
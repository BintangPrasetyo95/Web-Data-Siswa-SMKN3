<?php  
$id = $_GET['id'];
$query = mysqli_query($connect, "DELETE FROM jurusan WHERE id_jurusan='$id' ");
if ($query) {
	echo "<script>alert('Data Berhasil Dihapus'); location.href='?page=jurusan'</script>";
}
?>
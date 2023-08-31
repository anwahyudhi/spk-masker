<?php
include '../../koneksi.php';

$id = $_GET['id'];
$sql = mysqli_query($dbh,"delete from masker where id_masker='$id'") or die(mysqli_error($dbh));

	if ($sql) {
			echo "<script>alert('Data Berhasil Dihapus ^_^');document.location='data_masker.php' </script> ";
		}else {
			echo "<script>alert('Data Gagal Dihapus !!!);document.location='data_masker.php' </script> ";
		}
?>

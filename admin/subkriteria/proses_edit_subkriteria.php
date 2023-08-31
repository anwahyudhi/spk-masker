<?php 
include "../../koneksi.php";


$id = $_GET['subkriteria'];
$nama = $_POST['nama'];;
$bobot = $_POST['bobot'];

$sql=mysqli_query($dbh,"UPDATE subkriteria SET nama_subkriteria = '$nama', bobot_subkriteria = '$bobot' WHERE id_subkriteria = '$id'");


if ($sql) {
    echo "<script>alert('Data berhasil Diubah ^_^');document.location='data_subkriteria.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal diubah !!!');document.location='data_subkriteria.php' </script> ";
}






 ?>
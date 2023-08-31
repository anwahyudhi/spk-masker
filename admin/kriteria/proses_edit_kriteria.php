<?php 
include "../../koneksi.php";


$id = $_GET['kriteria'];
$nama = $_POST['nama'];;
$bobot = $_POST['bobot'];

$sql=mysqli_query($dbh,"UPDATE kriteria SET nama_kriteria = '$nama', bobot_kriteria = '$bobot' WHERE id_kriteria = '$id'");


if ($sql) {
    echo "<script>alert('Data berhasil Diubah ^_^');document.location='data_kriteria.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal diubah !!!');document.location='data_kriteria.php' </script> ";
}






 ?>
<?php 
include "../../koneksi.php";


$id = $_GET['masker'];
$nama = $_POST['nama'];;
$lapisan = $_POST['lapisan'];
$kualitas = $_POST['kualitas'];
$efektifitas = $_POST['efektifitas'];
$nyaman = $_POST['nyaman'];
$reuse = $_POST['reuse'];
$keterangan = $_POST['keterangan'];

//upload gambar 
$gambarnama = $_FILES['gambar']['name'];

$file_ext = explode('.', $gambarnama);
$flex = strtolower(end($file_ext));

$filenamenew = rand().".".$flex;
$simpan = '../../assets/gambar/'.$filenamenew;
//

if (!empty($gambarnama)) {
    $sql=mysqli_query($dbh,"UPDATE masker SET nama_masker = '$nama', lapisan_masker =  '$lapisan', kualitas_masker = '$kualitas' , efektifitas_masker = '$efektifitas' , kenyamanan_masker = '$nyaman', reuse = '$reuse', keterangan = '$keterangan', gambar = '$filenamenew' WHERE id_masker = '$id'");

if ($sql) {
     move_uploaded_file($_FILES['gambar']['tmp_name'], $simpan);
    echo "<script>alert('Data berhasil Diubah ^_^');document.location='data_masker.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal diubah !!!');document.location='data_masker.php' </script> ";
}


}
else{
$sql=mysqli_query($dbh,"UPDATE masker SET nama_masker = '$nama', lapisan_masker =  '$lapisan', kualitas_masker = '$kualitas' , efektifitas_masker = '$efektifitas' , kenyamanan_masker = '$nyaman', reuse = '$reuse', keterangan = '$keterangan' WHERE id_masker = '$id'");

if ($sql) {
    echo "<script>alert('Data berhasil Diubah ^_^');document.location='data_masker.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal diubah !!!');document.location='data_masker.php' </script> ";
}

}






 ?>
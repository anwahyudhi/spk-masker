<?php 
include "../../koneksi.php";


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


if ($gambarnama == null) {
    $sql=mysqli_query($dbh,"INSERT INTO masker (nama_masker, lapisan_masker, kualitas_masker, efektifitas_masker, kenyamanan_masker, reuse, gambar, keterangan) VALUES ('$nama', '$lapisan', '$kualitas', '$efektifitas','$nyaman','$reuse','kosong', '$keterangan' )");    
}else{

$sql=mysqli_query($dbh,"INSERT INTO masker (nama_masker, lapisan_masker, kualitas_masker, efektifitas_masker, kenyamanan_masker, reuse, gambar, keterangan) VALUES ('$nama', '$lapisan', '$kualitas', '$efektifitas','$nyaman','$reuse','$filenamenew', '$keterangan' )");

}



if ($sql) {
    move_uploaded_file($_FILES['gambar']['tmp_name'], $simpan);
    echo "<script>alert('Data berhasil Ditambahkan ^_^');document.location='data_masker.php' </script> ";
}else {
    echo mysqli_error($dbh);
    echo "<script>alert('Data gagal Ditambahkan !!!');document.location='data_masker.php' </script> ";
}






 ?>
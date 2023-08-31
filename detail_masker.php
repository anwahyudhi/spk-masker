<?php 
include "koneksi.php";
$id = $_GET['masker'];
$query=mysqli_query($dbh,"select * from masker where id_masker='$id'");
$data=mysqli_fetch_array($query);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</title>

	<!-- Bootstrap CSS CDN -->
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">

</head>
<body>
	<header>
		<div class="navbar navbar-dark bg-primary shadow-sm">
		    <div class="container">
		      <a href="index.php" class="navbar-brand d-flex align-items-center">
		        
		        <strong>Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</strong>
		      </a>
		      <div class="col-4 d-flex justify-content-end align-items-center">
        
        		<a class="btn btn-sm btn-outline-light" href="login.php">login</a>
      		</div>
		</div>
		</div>
	</header>
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
	 <center>
	 	<div class="panel">
	 		<div class="panel-heading">
	 			<h3>Jenis Masker <?php echo $data['nama_masker']?></h3>
	 		</div>
	 	</div>
	 	<div>
	 		
	 	</div>
	 	<img src="assets/gambar/<?php
                        if(empty($data['gambar']) or $data['gambar'] == 'kosong'){
                            echo 'nopic.jpg';
                        }else{
                            echo $data['gambar'];

                        }?>"
                        class="img-thumbnail" width="300" heigth="300" ></center>
                        <center>

                        	<h3>Keterangan</h3>
                        	<div class="container">
                        		<p><?php echo $data['keterangan']?></p>	
                        	</div>
                        	
                        </center>
  	
  </div>
  <footer>
  	<center> NUR HALIZA <?php echo date('Y') ?></center>
  </footer>

</body>
</html>
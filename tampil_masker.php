<?php
	include "koneksi.php";
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
	

	<div class="panel panel-default">
		<center>
			<br>
			<div class="panel-heading">
				<h2>Jenis - jenis Masker</h2>
				<br>
			</div>
			<div class="panel-body">
				<div class="container">
					<div class="row">
                  <?php

                  $halaman = 30;
                  $page = isset($_GET['ke']) ? (int)$_GET['ke'] : 1;
                  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;


                  $sql = "select * from masker";

                  $hasil = mysqli_query($dbh, $sql);
                  $total = mysqli_num_rows($hasil);
                  $tampil = ceil($total/$halaman);

                  $sqlu = "select * from masker LIMIT $mulai, $halaman" ;
                  $query = mysqli_query($dbh, $sqlu) or die(mysqli_error($dbh));

                 while ($data = mysqli_fetch_assoc($query)) {

                   ?>
                   <!-- seragamkan ukurannya -->


                  <div class="col-lg-2 mb-3 d-flex align-items-stretch">

                      <!-- link berdasarkan nama tapi ga buat file baru -->
                      <div class="card">
                      	<img class="card-img-top" src="assets/gambar/<?php
                        if(empty($data['gambar']) or $data['gambar'] == 'kosong'){
                            echo 'nopic.jpg';
                        }else{
                            echo $data['gambar'];

                        }?>"
                        alt="<?php echo $data['nama_masker']; ?>" width="100" height="150">
                        
                        <div class="card-body">
                        	<h5 class="card-title"><?php echo $data['nama_masker']; ?></h5>
                        	
                        </div>

                        <div class="card-footer">
                        	<a href="detail_masker.php?masker=<?php echo $data['id_masker'] ?>" class="btn btn-primary">Lihat Detail</a>
                        </div>
                      </div>
                      <br>

                    

                  </div>
                  <?php
                 } ?>
                </div>
					
				</div>
			</div>
		</center>
	</div>


  <footer>
  	<center> NUR HALIZA <?php echo date('Y') ?></center>
  </footer>

</body>
</html>
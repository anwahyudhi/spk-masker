<?php

include "koneksi.php";

$lapisan = $_POST['lapisan'];
$kualitas = $_POST['kualitas'];
$efektifitas = $_POST['efektifitas'];
$nyaman = $_POST['nyaman'];
$reuse = $_POST['reuse'];



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
				<h2>Hasil rekomendasi masker berdasarkan kriteria yang dipilih</h2>
			</div>
			<br>
			<div class="panel-body">
				<div class="container" >

					<div class="row">
                  <?php
 
                  $sql = "select * from masker where lapisan_masker = '$lapisan' and kualitas_masker = '$kualitas' and efektifitas_masker = '$efektifitas' and kenyamanan_masker = '$nyaman' and reuse = '$reuse' and nilai = (select max(nilai) from masker) limit 1 ";

                  $hasil = mysqli_query($dbh, $sql);
                  $total = mysqli_num_rows($hasil);
                
                   	if ($total == 0) {
                  		?>
                  		<center>
                  			<div class="col-sm-6">
                  			<h4>Maaf, Tidak ada masker yang memenuhi kriteria</h4>
                  		<br>

                  		<a href="rekomendasi.php" class="btn btn-warning">Ulang Perhitungan</a>
                  		<br><br>
                  		</div>
                  			
                  		</center>
                  		
                  		
                  		<?php 
                  	}else{

                  		  ?>
                  		  
                  		  <?php
                 while ($data = mysqli_fetch_assoc($hasil)) {

                   ?>
                   <center>

                  <div class="col-sm-2">
                  	
                  	<div class="card">
                  		<img class="card-img-top" src="assets/gambar/<?php
                        if(empty($data['gambar']) or $data['gambar'] == 'kosong'){
                            echo 'nopic.jpg';
                        }else{
                            echo $data['gambar'];

                        }?>"
                        alt="<?php echo $data['nama_masker']; ?>" width="100" height="200">
                        
                        <div class="card-body">
                        	<h4 class="card-title"><?php echo $data['nama_masker']; ?></h4>
                        	
                        </div>

                        
                  	</div>	 

                      <!-- link berdasarkan nama tapi ga buat file baru -->
                      <!-- <a href="detail_masker.php?masker=<?php echo $data['id_masker'] ?>" style="text-decoration: none; color: black;">
                        <img src="assets/gambar/<?php
                        if(empty($data['gambar']) or $data['gambar'] == 'kosong'){
                            echo 'nopic.jpg';
                        }else{
                            echo $data['gambar'];

                        }?>"
                        alt="<?php echo $data['nama_masker']; ?>" width="100" height="100">
                        <br><br>
                        <div class="desc">
                          <p >
                           <?php echo $data['nama_masker']; ?>
                          </p>
                        </div>
                      </a>
 -->
                  </div>
                  <br>

                  <button class="btn btn-primary" onclick="hitung()" >Lihat Perhitungan</button>
                  <a href="rekomendasi.php" class="btn btn-warning">Ulang</a>
                  

                  <div id="perhitungan" style="display: none;">
                  <br>	
                  <div class="container">
                  		
                  	
                  	<div class="panel">
     				<div class="panel-heading">
     					<h2>Hasil Perankingan</h2>
     				</div>	
     				<div class="panel-body ">
     					<table class="table table-hover table-bordered">
     				<thead>
     					<tr>
     						<th>Rank</th>
     						<th>Jenis Masker</th>
     						<th>Nilai</th>
     						
     					
     					</tr>
     				</thead>
     				<tbody>
     					<?php
			              	$nomor = 1;
			                $sqlc = "SELECT * FROM masker where lapisan_masker = '$lapisan' and kualitas_masker = '$kualitas' and efektifitas_masker = '$efektifitas' and kenyamanan_masker = '$nyaman' and reuse = '$reuse'order by nilai desc";
			                foreach ($dbh->query($sqlc) as $datac) :

			              ?>
			              <tr>
			              	<td><?php echo $nomor; ?></td>
			              	<td><?php echo $datac['nama_masker']; ?></td>
			              	<td><?php echo number_format($datac['nilai'],2); ?></td>
			              </tr>
			              <?php  
			              $nomor++;
			              endforeach;
			              ?>
			              
     				</tbody>
     			</table>
     				</div>
     			</div>
                  </div>

                  </center>
                  <?php
                 }
                 } ?>
                </div>
					
				</div>
			</div>
		</center>
	</div>


  <footer>
  	<center> NUR HALIZA <?php echo date('Y') ?></center>
  </footer>
<script type="text/javascript">
  function hitung() {
  var x = document.getElementById("perhitungan");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
  </script>
</body>
</html>
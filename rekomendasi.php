<?php 
include "koneksi.php";

include "koneksi.php";


$c1 = array();
$c2 = array();
$c3 = array();
$c4 = array();
$c5 = array();

$n1 = array();
$n2 = array();
$n3 = array();
$n4 = array();
$n5 = array();

$bobot = array();


$mo = 0;
$query="select * from kriteria";
foreach ($dbh->query($query) as $datay) {
	$bobot[$mo] = $datay['bobot_kriteria'];
	$mo++;
}

$query=mysqli_query($dbh,"select * from masker where nilai = (select max(nilai) from masker)");
$data=mysqli_fetch_array($query);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rekomndasi - Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</title>

	<!-- Bootstrap CSS CDN -->
    <link type="text/css" rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

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
	 	<div class="mt-4 p-5 bg-info text-white rounded">
		  <h3>Masker Rekomendasi Untuk Menghindari Virus COVID-19</h3>
		  <br>
		  <div class="container container-sm">
		  <h5>Silahkan Pilih kriteria yang diinginkan</h5>
		  	
		  <br>
		  <form  class="form" action="hasil_rekomendasi.php" method="POST">
				<div class="row">
					<div class="col-4">
						<select class="form-control" id="sel1" name="lapisan" required>
							<option value="" disabled selected>Ketebalan Masker</option>

					<?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=1";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>" placeholder="Ketebalan Masker"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>
					</div>
					<!-- <div class="col-1">
						<input type="checkbox" class="form-check-input" name="tebalyes">
					</div> -->
				<br><br>
				<!--  -->
					<div class="col-4">
					<select class="form-control form-control" id="sel1" name="kualitas" required>
						<option value="" disabled selected>Kualitas Masker</option>

					<?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=2";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>		
					</div>
					
					<!-- <div class="col-1">
						<input type="checkbox" class="form-check-input" name="kualitasyes">
					</div> -->
				
				<!--  -->

					<div class="col-4">
						<select class="form-control" id="sel1" name="nyaman" required>
							<option value="" disabled selected>Tingkat Kenyamanan Masker</option>
					<?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=4";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>
					</div>
					<!-- <div class="col-1">
						<input type="checkbox" class="form-check-input" name="nyamanyes">
					</div> -->
				
				<!--  -->

					<div class="col-4">
					<select class="form-control" id="sel1" name="efektifitas" required>
						<option value="" disabled selected>Efektifitas Masker</option>
					<?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=3";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>
	
					</div>
					<!-- <div class="col-1">
						<input type="checkbox" class="form-check-input" name="efektifitasyes">
					</div>
				 -->
				<!--  -->

				
					<div class="col-4">
					<select class="form-control" id="sel1" name="reuse" required>
					<option value="" disabled selected>Masker dapat dipakai berulang</option>
					<?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=5";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php 
                         $nama_reuse = $data['nama_subkriteria'];
                         echo $data['nama_subkriteria']; ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>	
					</div>
					<!-- <div class="col-1">
						<input type="checkbox" class="form-check-input" name="reuseyes">
					</div> -->
				</div>

				<!--  -->
				  		

				<br>
				 <!-- <div class="form-group">
                    <input type="submit" required name="nanam" value = "Hitung" class="btn btn-primary btn-fill pull-left" onclick="return confirm('Apa anda yakin dengan pemilihan kriteria data Masker ???');">
                 </div> -->

                 <div class="form-group">
                 	<input type="button" name="nanam" value="Submit" id="submitButton" data-bs-toggle="modal" data-bs-target="#confirm-submit" class="btn btn-primary btn-fill">
                 </div>

                 <!-- Modal -->
                 <div class="modal" id="confirm-submit" style="color: black;">
                 	<div class="modal-dialog">
                 		<div class="modal-content">
                 			
                 			<div class="modal-header">
                 				<h4 class="modal-title">Konfirmasi Pilihan</h4>
                 				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                 			</div>

                 			<div class="modal-body">
                 				apakah anda yakin dengan kriteria yang dipilih?
                 			</div>

                 			<div class="modal-footer">
                 				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                 				
                 				<input type="submit" required name="nanam" value = "Yakin" class="btn btn-primary btn-fill" data-bs-dismiss="modal">	
                 			
                 			</div>

                 		</div>
                 	</div>
                 </div>

			</form>

		</div>
</div>
		</center>

		  <!-- <a href="hasil.php" class="btn btn-sm btn-light fw-bold">Lihat Perhitungan</a> -->
			      
		</div>
  	
  </div>
  <footer>
  	<center> NUR HALIZA <?php echo date('Y') ?></center>
  </footer>

  

</body>
</html>
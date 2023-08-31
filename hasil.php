<?php 

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

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hasil - Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</title>

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
	<div class="container">
     <div class="panel panel-default">
     	<center>
     		<div class="panel-heading">
     			 <h2>Perhitungan Simple Additive Weighting</h2>
     			 <br>
     		</div>
     		<br>
     		<div class="panel-body">
     			<div class="panel">
     				<div class="panel-heading">
     					<h2>Data Alternatif</h2>
     				</div>	
     				<div class="panel-body">
     					<table class="table table-responsive table-hover table-bordered"  style="text-align:justify">
     				<thead>
     					<tr>
     						<th>No</th>
     						<th>Jenis Masker</th>
     						<th>Lapisan Masker</th>
     						<th>Kualitas Masker</th>
     						<th>Efektifitas Filter Masker</th>
     						<th>Kenyamanan Masker</th>
     						<th>Dapat Dipakai Berulang</th>
     					
     					</tr>
     				</thead>
     				<tbody>
     					<?php
                            $sql = "SELECT * FROM masker";
                            $no  = 1;
                            foreach ($dbh->query($sql) as $data) :
                         ?>
                         <tr>
                         <td><?php echo $no; ?></td>
                         <td><?php echo $data['nama_masker'] ?></td>
                         <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['lapisan_masker']) {
	                            echo $data1['nama_subkriteria'];
	                            $c1[$no-1]=$data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kualitas_masker']) {
	                            echo $data1['nama_subkriteria'];
	                            $c2[$no-1]=$data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['efektifitas_masker']) {
	                            echo $data1['nama_subkriteria'];
	                            $c3[$no-1]=$data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kenyamanan_masker']) {
	                            echo $data1['nama_subkriteria'];
	                            $c4[$no-1]=$data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['reuse']) {
	                            echo $data1['nama_subkriteria'];
	                            $c5[$no-1]=$data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
                         
        				</tr>
                         <?php
			                        $no++;
			                        endforeach;
			              ?>
     				</tbody>
     			</table>
     				</div>
     			</div>

     			<br>
     			<div class="panel">
     				<div class="panel-heading">
     					<h2>Bobot</h2>
     				</div>	
     				<div class="panel-body">
     					<table class="table table-responsive table-hover table-bordered"  style="text-align:justify">
     				<thead>
     					<tr>
     						<th>No</th>
     						<th>Jenis Masker</th>
     						<th>Lapisan Masker</th>
     						<th>Kualitas Masker</th>
     						<th>Efektifitas Filter Masker</th>
     						<th>Kenyamanan Masker</th>
     						<th>Dapat Dipakai Berulang</th>
     					
     					</tr>
     				</thead>
     				<tbody>
     					<?php
                            $sql = "SELECT * FROM masker";
                            $no  = 1;
                            foreach ($dbh->query($sql) as $data) :
                         ?>
                         <tr>
                         <td><?php echo $no; ?></td>
                         <td><?php echo $data['nama_masker'] ?></td>
                         <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['lapisan_masker']) {
	                            echo $c1[$no-1];

	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kualitas_masker']) {
	                            echo $data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['efektifitas_masker']) {
	                            echo $data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kenyamanan_masker']) {
	                            echo $data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['reuse']) {
	                            echo $data1['bobot_subkriteria'];
	                        }
	                        endforeach;
	                         ?>
	                     </td>
                         
        				</tr>
                         <?php
			                        $no++;
			                        endforeach;
			              ?>
			              <tr>
			              	<td colspan="2">Max</td>
			              	<td><?php echo max($c1) ?></td>
			              	<td><?php echo max($c2) ?></td>
			              	<td><?php echo max($c3) ?></td>
			              	<td><?php echo max($c4) ?></td>
			              	<td><?php echo max($c5) ?></td>
			              </tr>
     				</tbody>
     			</table>
     				</div>
     			</div>
     			<br>
     			<div class="panel">
     				<div class="panel-heading">
     					<h2>Normalisasi Bobot</h2>
     				</div>	
     				<div class="panel-body">
     					<table class="table table-responsive table-hover table-bordered"  style="text-align:justify">
     				<thead>
     					<tr>
     						<th>No</th>
     						<th>Jenis Masker</th>
     						<th>Lapisan Masker</th>
     						<th>Kualitas Masker</th>
     						<th>Efektifitas Filter Masker</th>
     						<th>Kenyamanan Masker</th>
     						<th>Dapat Dipakai Berulang</th>
     					
     					</tr>
     				</thead>
     				<tbody>
     					<?php
                            $sql = "SELECT * FROM masker";
                            $no  = 1;
                            foreach ($dbh->query($sql) as $data) :
                         ?>
                         <tr>
                         <td><?php echo $no; ?></td>
                         <td><?php echo $data['nama_masker'] ?></td>
                         <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['lapisan_masker']) {
	                            $n1[$no-1] = $c1[$no-1]/max($c1);
	                            echo number_format($n1[$no-1],2);
	                            

	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kualitas_masker']) {
	                            
	                            $n2[$no-1] = $c2[$no-1]/max($c2);
	                            echo number_format($data1['bobot_subkriteria']/max($c2),2);
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['efektifitas_masker']) {
	                            
	                            $n3[$no-1] = $c3[$no-1]/max($c3);
	                            echo number_format($data1['bobot_subkriteria']/max($c3),2);
	                            
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['kenyamanan_masker']) {
	                            $n4[$no-1] = $c4[$no-1]/max($c4);
	                            echo number_format($data1['bobot_subkriteria']/max($c4),2);
	                            
	                        }
	                        endforeach;
	                         ?>
	                     </td>
	                     <td><?php
	                        $sql1 = "SELECT * FROM subkriteria";
	                        foreach ($dbh->query($sql1) as $data1) :
	                        if ($data1['id_subkriteria'] == $data['reuse']) {
	                            $n5[$no-1] = $c5[$no-1]/max($c5);
	                            echo number_format($data1['bobot_subkriteria']/max($c5),2);
	                            
	                        }
	                        endforeach;
	                         ?>
	                     </td>
                         
        				</tr>
                         <?php
			                        $no++;
			                        endforeach;
			              ?>
			              
     				</tbody>
     			</table>
     				</div>
     			</div>

     			<br>
     			<div class="panel">
     				<div class="panel-heading">
     					<h2>Perankingan</h2>
     				</div>	
     				<div class="panel-body">
     					<table class="table table-responsive table-hover table-bordered"  style="text-align:justify">
     				<thead>
     					<tr>
     						<th>Rank</th>
     						<th>Jenis Masker</th>
     						<th>Nilai</th>
     						
     					
     					</tr>
     				</thead>
     				<tbody>
     					<?php
                            $sql = "SELECT * FROM masker";
                            $no  = 1;
                            $xo = 0;
                            $nilai = array();
                            foreach ($dbh->query($sql) as $data) :
                         
                         	$nilai[$no-1] = ($n1[$no-1]*($bobot[0]/100))+($n2[$no-1]*($bobot[1]/100))+($n3[$no-1]*($bobot[2]/100))+($n4[$no-1]*($bobot[3]/100))+($n5[$no-1]*($bobot[4]/100));
                         	
                         	

                         	?>
                         <?php
			                        $no++;
			                        $xo++;
			                        endforeach;
			              	$nomor = 1;
			                $sqlc = "SELECT * FROM masker order by nilai desc";
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
     </div>

  <footer>
  	<center> NUR HALIZA <?php echo date('Y') ?></center>
  </footer>

</body>
</html>
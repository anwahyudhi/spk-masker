<?php 
include "../../koneksi.php";

session_start();

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../..\assets\bootstrap\css\bootstrap.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../../assets/admin/admin.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="../index-admin.php">
                    <h3>SPK Masker Terbaik Untuk Menghindari Virus COVID 19</h3>
                        <strong>
                            <img src="../../assets/gambar/home.svg" style="width: 110%;">
                        </a></strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="../alternatif/data_masker.php" >Data Alternatif</a>
                        <a href="../kriteria/data_kriteria.php" >Data Kriteria</a>
                        <a href="../subkriteria/data_subkriteria.php" >Data Subkriteria</a>
                        <a href="hasil_perhitungan.php" >Hasil seleksi</a>
        
                    </li>

                <ul class="list-unstyled CTAs">
                    <hr>
                    <center>
                        <h4><?php echo date('Y') ?></h4>
                    </center>
                    <hr>  
                </ul>
            </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                                    <li>
                                        <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['nama']; ?>
                                        <a href="../keluar.php" class="btn btn-light fw-bold">Logout</a>
                                    </li>
                                    
                                    
                            
                        </ul>
                    </div>
                </nav>
                
                <center>
                <div class="container" style="background-color:white;">
     <div class="panel">
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
                                echo $c1[$no-1]/max($c1);
                                $n1[$no-1] = $c1[$no-1]/max($c1);

                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['kualitas_masker']) {
                                echo $data1['bobot_subkriteria']/max($c2);
                                $n2[$no-1] = $c2[$no-1]/max($c2);
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['efektifitas_masker']) {
                                echo $data1['bobot_subkriteria']/max($c3);
                                $n3[$no-1] = $c3[$no-1]/max($c3);
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['kenyamanan_masker']) {
                                echo $data1['bobot_subkriteria']/max($c4);
                                $n4[$no-1] = $c4[$no-1]/max($c4);
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['reuse']) {
                                echo ($data1['bobot_subkriteria']/max($c5));
                                $n5[$no-1] = $c5[$no-1]/max($c5);
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
                            
                            $sqlrankedit = mysqli_query($dbh,"UPDATE masker set nilai = '$nilai[$xo]' where id_masker = '$data[id_masker]'");
                            if ($sqlrankedit) {

                            }

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
     <br>
     </div>
 </div>


                </div>
        </div>





        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
</body>

</html>
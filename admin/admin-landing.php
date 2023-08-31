<?php 
include "../koneksi.php";
session_start();
 ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Sistem Pemilihan Masker Terbaik Untuk Menghindari Virus COVID-19</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="..\assets\bootstrap\css\bootstrap.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="../assets/admin/admin.css">
    </head>
    <body>



        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="index-admin.php">
                    <h3>SPK Masker Terbaik Untuk Menghindari Virus COVID 19</h3>
                        <strong>
                            <img src="../assets/gambar/home.svg" style="width: 110%;">
                        </a></strong>
                </div>

                <ul class="list-unstyled components">
                    <li>
                        <a href="alternatif/data_masker.php" >Data Alternatif</a>
		  				<a href="kriteria/data_kriteria.php" >Data Kriteria</a>
		  				<a href="subkriteria/data_subkriteria.php" >Data Subkriteria</a>
		 	 			<a href="perhitungan/hasil_perhitungan.php" >Hasil seleksi</a>
		
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
                                		<a href="keluar.php" class="btn btn-light fw-bold">Logout</a>
                            		</li>
                            		
                                    
                            
                        </ul>
                    </div>
                </nav>
                
                <center>
                <div class="container" style="background-color: white;">
                <div class="panel panel-heading">
                    <h2>Halaman Admin</h2>
                    <h3>Selamat datang, <?php echo $_SESSION['nama']; ?></h3>
                </div>
                <div class="panel-body">
                <a href="alternatif/data_masker.php" class="btn btn-lg btn-info">Data Alternatif</a>
				<a href="kriteria/data_kriteria.php" class="btn btn-lg btn-info">Data Kriteria</a>
				<a href="subkriteria/data_subkriteria.php" class="btn btn-lg btn-info">Data Subkriteria</a>
				<a href="perhitungan/hasil_perhitungan.php" class="btn btn-lg btn-info">Hasil seleksi</a>
				<br><br>
		        </center>
                
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

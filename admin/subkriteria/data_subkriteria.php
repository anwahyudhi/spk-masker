<?php 
include "../../koneksi.php";

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
        <link rel="stylesheet" href="../..\assets\bootstrap\css\bootstrap.css">
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

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
                        <a href="data_subkriteria.php" >Data Subkriteria</a>
                        <a href="../perhitungan/hasil_perhitungan.php" >Hasil seleksi</a>
        
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
                <center>
                <h2>Data Subriteria</h2>
                    
                </center>
                 <br>
                            
            </div>
            <br>
            <div class="panel-body">
            <?php
            $sql = "SELECT * FROM kriteria";
            foreach ($dbh->query($sql) as $data) :

            ?>
                <div class="panel-heading">
                    <h2>Kriteria <?php echo $data['nama_kriteria'] ?></h2>
                </div>
                <table class="table  table-hover table-bordered"  style="text-align:justify">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Subkriteria</th>
                            <th>Bobot Subkriteria</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $sql1 = "SELECT * FROM subkriteria where id_kriteria = '$data[id_kriteria]'";
                            $no  = 1;
                            foreach ($dbh->query($sql1) as $data1) :
                         ?>
                        <tr>
                         <td><?php echo $no; ?></td>
                         <td><?php echo $data1['nama_subkriteria'] ?></td>
                         <td><?php echo $data1['bobot_subkriteria'] ?></td>
                         
                         <td>
                            <a href="edit_subkriteria.php?subkriteria=<?php echo $data1['id_subkriteria'] ?>" class="btn btn-warning btn-sm btn-fill btn-block">
                              <i class="glyphicon glyphicon-pencil"></i>
                              <span>ubah</span>
                            </a>

                            
                        </td>
                        </tr>
                         <?php
                                    $no++;
                                    endforeach;
                          ?>
                    </tbody>
                </table>
                <hr>
                <?php
                            
                                    endforeach;
                          ?>
                          
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
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
                        <a href="data_masker.php" >Data Alternatif</a>
                        <a href="../kriteria/data_kriteria.php" >Data Kriteria</a>
                        <a href="../subkriteria/data_subkriteria.php" >Data Subkriteria</a>
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
            <h5>Tambah Data Masker</h5>
        </div>  
        <div class="panel-body">
            <br>
            <form  class="form" action="proses_tambah_masker.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Jenis Masker</label>
                    <input type="text" name="nama" class="form-control" required> 
                </div>
                <br>
                <div class="form-group">
                    <label>Lapisan Masker</label>
                    <select class="form-control" id="sel1" name="lapisan" required>
                    <?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=1";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Kualitas Masker</label>
                    <select class="form-control" id="sel1" name="kualitas" required>
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
                <br>
                <div class="form-group">
                    <label>Efektifitas Filter Masker</label>
                    <select class="form-control" id="sel1" name="efektifitas" required>
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
                <br>
                <div class="form-group">
                    <label>Kenyamanan Masker</label>
                    <select class="form-control" id="sel1" name="nyaman" required>
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
                <br>
                <div class="form-group">
                    <label>Apakah Masker Bisa digunakan berulang?</label>
                    <select class="form-control" id="sel1" name="reuse" required>
                    <?php
                        $sql = "SELECT * FROM subkriteria where id_kriteria=5";

                        foreach ($dbh->query($sql) as $data) :
                         ?>
                         <option value="<?php echo $data['id_subkriteria'] ?>"><?php echo $data['nama_subkriteria'] ?></option>

                        <?php
                        endforeach;
                         ?>
                     </select>
                </div>
                <div class="form-group">
                    <label>Keterangan Masker</label>
                    <textarea name="keterangan" class="form-control" required></textarea>
                </div>

                    <div class="form-group">
                      <label> Gambar Masker</label>
                      <input type="file" name="gambar" class="form-control" required>
                    </div>
                        

                <br>
                
                <div class="form-group">
                    <input type="reset" required name="Reset" class="btn btn-warning pull-right btn-fill">
                    <input type="button" name="nanam" value="Submit" id="submitButton" data-bs-toggle="modal" data-bs-target="#confirm-submit" class="btn btn-primary btn-fill">
                </div>

                <!-- Modal -->
                 <div class="modal" id="confirm-submit" style="color: black;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Penambahan Data</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                apakah anda yakin dengan Data Masker yang telah inputkan?
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
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
                 <h2>Data Masker</h2>
                 <br><a href="tambah_masker.php" class="btn btn-success btn-fill">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Tambah Masker</span>
                            </a>
                            
                            <br>
                            <br>
                            <div class="container">
                                 <form class="d-flex" action="data_masker_cari.php" method="POST">
                            <input class="form-control me-2" type="text" placeholder="Search" name="cari">
                            <button class="btn btn-primary" type="submit">Search</button>
                          </form>
                            
                            
            </div>
            <br>
            <div class="panel-body">
                <table class="table table-responsive table-hover table-bordered"  style="text-align:justify">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Jenis</th>
                            <th>Lapisan</th>
                            <th>Kualitas</th>
                            <th>Efektifitas Filter</th>
                            <th>Kenyamanan</th>
                            <th>Dapat Dipakai Berulang</th>
                            <th>Aksi</th>
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
                         <td><img src="../../assets/gambar/<?php
                        if(empty($data['gambar']) or $data['gambar'] == 'kosong'){
                            echo 'nopic.jpg';
                        }else{
                            echo $data['gambar'];

                        }?>"
                        alt="<?php echo $data['nama_masker']; ?>" width="100" height="100">
 </td>
                         <td><?php echo $data['nama_masker'] ?></td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['lapisan_masker']) {
                                echo $data1['nama_subkriteria'];
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['kualitas_masker']) {
                                echo $data1['nama_subkriteria'];
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['efektifitas_masker']) {
                                echo $data1['nama_subkriteria'];
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['kenyamanan_masker']) {
                                echo $data1['nama_subkriteria'];
                            }
                            endforeach;
                             ?>
                         </td>
                         <td><?php
                            $sql1 = "SELECT * FROM subkriteria";
                            foreach ($dbh->query($sql1) as $data1) :
                            if ($data1['id_subkriteria'] == $data['reuse']) {
                                echo $data1['nama_subkriteria'];
                            }
                            endforeach;
                             ?>
                         </td>
                         <td>
                            <a href="edit_masker.php?masker=<?php echo $data['id_masker'] ?>" class="btn btn-warning ">
                              <span>Ubah</span>
                            </a>
                            <!-- <a class="btn btn-danger" href="proses_hapus_masker.php?id=<?php echo $data['id_masker'] ?>" onclick="return confirm('Apa anda yakin dengan penghapusan data ???');">
                                <span>Hapus</span>
                            </a> -->
                            <div class="form-group">
                            <input type="button" value="Hapus" id="submitButton" data-bs-toggle="modal" data-bs-target="#confirm-submit" class="btn btn-danger btn-fill">
                        </div>

                        <!-- Modal -->
                         <div class="modal" id="confirm-submit" style="color: black;">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi Penghapusan Data Masker<?php echo $data['nama_masker']; ?></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body">
                                        apakah anda yakin akan menghapus Data Masker <?php echo $data['nama_masker']; ?>?
                                    </div>

                                    <div class="modal-footer">
                                        <form action="proses_hapus_masker.php?id=<?php echo $data['id_masker'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $data['id_masker'] ?>">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                <input type="submit" required name="nanam" value = "Yakin" class="btn btn-primary btn-fill" data-bs-dismiss="modal">
                                    </form>
                                        
                                    </div>

                        </div>
                    </div>
                 </div>
                        </td>
                        </tr>
                         <?php
                                    $no++;
                                    endforeach;
                          ?>
                    </tbody>
                </table>
            </div>
        </center>
     <center>
     <a href="../kriteria/data_kriteria.php" class="btn btn-info ">Ke Data Kriteria</a>
     <a href="../subkriteria/data_subkriteria.php" class="btn btn-info ">Ke Data Subkriteria</a>
        
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
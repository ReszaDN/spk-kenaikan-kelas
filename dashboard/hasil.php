<?php
    include("../koneksi.php");

    session_start();
    if(!isset($_SESSION['id'])){
        header("Location: ../");
    }

    $id = $_SESSION["id"];
    $nama = mysqli_query($db, "SELECT * FROM admin WHERE id_admin = '$id'");
    $res = mysqli_fetch_array($nama);

    error_reporting(0);
    $SMTGa = $_POST['SMTGa'];
    $SMTGe = $_POST['SMTGe'];
    $absensi = $_POST['absensi'];
    $perilaku = $_POST['perilaku'];

    // Nilai Rata-rata Ujian SMT Ganjil Buruk
    if($SMTGa <= 60){
        $SMTGaBuruk = 1;
    }
    else if($SMTGa >= 60 && $SMTGa <= 70){
        $SMTGaBuruk = (70 - $SMTGa)/(70-60);
    }
    else if($SMTGa >= 70){
        $SMTGaBuruk = 0;
    }

    // Nilai Rata-rata Ujian SMT Ganjil Cukup
    if($SMTGa >= 70 && $SMTGa <=80){
        $SMTGaCukup = 1;
    }
    else if($SMTGa >= 60 && $SMTGa <= 70){
        $SMTGaCukup = ($SMTGa - 60)/(70-60);
    }
    else if($SMTGa >= 80 && $SMTGa <= 90){
        $SMTGaCukup = (90 - $SMTGa)/(90-80);
    }
    else if($SMTGa <= 60 || $SMTGa >= 90){
        $SMTGaCukup = 0;
    }

    //Nilai Rata-rata Ujian SMT Ganjil Baik
    if($SMTGa >= 90){
        $SMTGaBaik = 1;
    }
    else if($SMTGa >= 80 && $SMTGa <= 90){
        $SMTGaBaik = ($SMTGa - 80)/(90-80);
    }
    else if($SMTGa <= 80){
        $SMTGaBaik = 0;
    }


    // Nilai Rata-rata Ujian SMT Genap Buruk
    if($SMTGe <= 60){
        $SMTGeBuruk = 1;
    }
    else if($SMTGe >= 60 && $SMTGe <= 70){
        $SMTGeBuruk = (70 - $SMTGe)/(70-60);
    }
    else if($SMTGe >= 70){
        $SMTGeBuruk = 0;
    }

    // Nilai Rata-rata Ujian SMT Genap Cukup
    if($SMTGe >= 70 && $SMTGe <= 80){
        $SMTGeCukup = 1;
    }
    else if($SMTGe >= 60 && $SMTGe <= 70){
        $SMTGeCukup = ($SMTGe - 60)/(70-60);
    }
    else if($SMTGe >= 80 && $SMTGe <= 90){
        $SMTGeCukup = (90 - $SMTGe)/(90-80);
    }
    else if($SMTGe <= 60 || $SMTGe >= 90){
        $SMTGeCukup = 0;
    }
    
    //Nilai Rata-rata Ujian SMT Genap Terlampaui
    if($SMTGe >= 90){
        $SMTGeBaik = 1;
    }
    else if($SMTGe >= 80 && $SMTGe <= 90){
        $SMTGeBaik = ($SMTGe - 80)/(90-80);
    }
    else if($SMTGe <= 80){
        $SMTGeBaik = 0;
    }


    // Absensi Baik
    if($absensi <= 4){
        $absensiBaik = 1;
    }
    else if($absensi >= 10){
        $absensiBaik = 0;
    }
    else if($absensi >= 4 && $absensi <= 10){
        $absensiBaik = (10 - $absensi)/(10-4);
    }


    //absensi Buruk
    if($absensi >= 10){
        $absensiBuruk = 1;
    }
    else if($absensi >= 4 && $absensi <= 10){
        $absensiBuruk = ($absensi - 4)/(10-4);

    }else if($absensi <= 4){
        $absensiBuruk = 0;
    }


    // Nilai Perilaku Buruk
    if($perilaku <= 50){
        $perilakuBuruk = 1;
    }
    else if($perilaku >= 50 && $perilaku <= 60){
        $perilakuBuruk = (60 - $perilaku)/(60-50);
    }
    else if($akhlak >= 60){
        $perilakuBuruk = 0;
    }

    // Nilai Perilaku Cukup
    if($perilaku >= 60 && $perilaku <= 70){
        $perilakuCukup = 1;
    }
    else if($perilaku >= 50 && $perilaku <= 60){
        $perilakuCukup = ($perilaku - 50)/(60-50);
    }
    else if($perilaku >= 70 && $perilaku <= 80){
        $perilakuCukup = (80 - $perilaku)/(80-70);
    }
    else if($perilaku <= 50 || $perilaku >= 80){
        $perilakuCukup = 0;
    }

    //Nilai Perilaku Baik
    if($perilaku >= 80){
        $perilakuBaik = 1;
    }
    else if($perilaku >= 70 && $perilaku <= 80){
        $perilakuBaik = ($perilaku - 70)/(80-70);
    }
    else if($perilaku <= 70){
        $perilakuBaik = 0;
    }


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DASHBOARD-ADMIN</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-text mx-3">ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>

            <li class="nav-item">
                <a class="nav-link" href="rules.php">
                <i class="fas fa-calendar"></i>
                    <span>Rules</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="hitung.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Hitung Keputusan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $res["username"]?></span>
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hasil Keputusan</h1>
                    </div>

                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <h4><div class="text-black"> Data Input </div></h4>
                                <!-- TABEL DATA INPUT -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Semester Ganjil</th>
                                            <th>Semester Genap</th>
                                            <th>Absensi</th>
                                            <th>Nilai Keperilaku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $SMTGa?></td>
                                            <td><?= $SMTGe?></td>
                                            <td><?= $absensi?></td>
                                            <td><?= $perilaku?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <!--FUZZYFIKASI-->
                                <h4><div class="text-black"> Fuzzyfikasi </div></h4>
                                <br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Himpunan</th>
                                            <th>Keanggotaan</th>
                                            <th>Derajat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--Derajat Keanggotaan Semester Ganjil-->
                                        <tr>
                                            <td rowspan="3">Nilai Semester Ganjil</td>
                                            <td>Buruk</td>
                                            <td><?= $SMTGaBuruk?></td>
                                        </tr>
                                        <tr>
                                            <td>Cukup</td>
                                            <td><?= $SMTGaCukup?></td>
                                        </tr>
                                        <tr>
                                            <td>Baik</td>
                                            <td><?= $SMTGaBaik?></td>
                                        </tr>
                                        <!--Derajat Keanggotaan Semester Genap-->
                                        <tr>
                                            <td rowspan="3">Nilai Semester Genap</td>
                                            <td>Buruk</td>
                                            <td><?= $SMTGeBuruk?></td>
                                        </tr>
                                        <tr>
                                            <td>Cukup</td>
                                            <td><?= $SMTGeCukup?></td>
                                        </tr>
                                        <tr>
                                            <td>Baik</td>
                                            <td><?= $SMTGeBaik?></td>
                                        </tr>
                                        <!--Derajat Keanggotaan Absensi-->
                                        <tr>
                                            <td rowspan="2">Absensi (Alpha)</td>
                                            <td>Buruk</td>
                                            <td><?= $absensiBuruk?></td>
                                        </tr>
                                        <tr>
                                            <td>Baik</td>
                                            <td><?= $absensiBaik?></td>
                                        </tr>

                                        <!--Derajat Keanggotaan Nilai Perilaku-->
                                        <tr>
                                            <td rowspan="3">Nilai Perilaku</td>
                                            <td>Buruk</td>
                                            <td><?= $perilakuBuruk?></td>
                                        </tr>
                                        <tr>
                                            <td>Cukup</td>
                                            <td><?= $perilakuCukup?></td>
                                        </tr>
                                        <tr>
                                            <td>Baik</td>
                                            <td><?= $perilakuBaik?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--INFERENSI-->
                                <h4><div class="text-black"> Inferensi </div></h4>
                                <br>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Rule</th>
                                            <th>Rata-rata SMT Ganjil</th>
                                            <th>Rata-rata SMT Genap</th>
                                            <th>Absen Tanpa Keterangan</th>
                                            <th>Keperibadian</th>
                                            <th>Keputusan</th>
                                            <th>Alpha<br>(αi)</th>
                                            <th>Zi</th>
                                            <th>αi×Zi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        //Penyesuaian Hasil Fuzzyfikasi Dengan Rules
                                        $i=0;
                                        $sql = mysqli_query($db, "SELECT * FROM rules");
                                            while($row = mysqli_fetch_array($sql)){
                                                
                                                if($row["smtga"] == "Buruk"){
                                                    $DataGanjil = $SMTGaBuruk;
                                                }else if($row["smtga"] == "Cukup"){
                                                    $DataGanjil = $SMTGaCukup;
                                                }else{
                                                    $DataGanjil = $SMTGaBaik;
                                                }

                                                if($row["smtge"] == "Buruk"){
                                                    $DataGenap = $SMTGeBuruk;
                                                }else if($row["smtge"] == "Cukup"){
                                                    $DataGenap = $SMTGeCukup;
                                                }else{
                                                    $DataGenap = $SMTGeBaik;
                                                }

                                                if($row["absen"] == "Buruk"){
                                                    $DataAbsen = $absensiBuruk;
                                                }else{
                                                    $DataAbsen = $absensiBaik;
                                                }

                                                if($row["perilaku"] == "Buruk"){
                                                    $DataPerilaku = $perilakuBuruk;
                                                }else if($row["perilaku"] == "Cukup"){
                                                    $DataPerilaku = $perilakuCukup;
                                                }else{
                                                    $DataPerilaku = $perilakuBaik;
                                                }
                                                //Inferensi Fuzzy
                                                $a[$i] = min($DataGanjil, $DataGenap, $DataAbsen, $DataPerilaku);
                                                
                                                if($row["keputusan"] == "Tidak Naik" ){
                                                        $rumus = 100 - $a[$i] * (100-60);
                                                    }else{
                                                        $rumus = $a[$i] * (100-60) + 60;
                                                    }
                                                    
                                                $z[$i] = $rumus;
                                                $AiZi[$i] = $a[$i]*$z[$i];
                                    ?>
                                        <tr>
                                            <td><?= $row["rules"]?></td>
                                            <td><?= $row["smtga"]?></td>
                                            <td><?= $row["smtge"]?></td>
                                            <td><?= $row["absen"]?></td>
                                            <td><?= $row["perilaku"]?></td>
                                            <td><?= $row["keputusan"]?></td>
                                            <td><?= round($a[$i],2)?></td>
                                            <td><?= round($z[$i],2)?></td>
                                            <td><?= round($AiZi[$i],2)?></td>
                                        </tr>
                                    <?php $i++; }?>
                                    </tbody>
                                </table>
                                <!-- DEFUZZYFIKASI -->
                                <h4><div class="text-black"> Defuzzyfikasi </div></h4>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>∑(αi)</th>
                                            <th>∑(αi×Zi)</th>
                                            <th>∑(αi×Zi) / ∑(αi)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $total_AiZi = array_sum($AiZi);
                                            $total_a = array_sum($a);
                            
                                            $true_Z = $total_AiZi/$total_a;
                                        
                                        ?>
                                        <tr>
                                            <td><?= round($total_a,2)?></td>
                                            <td><?= round($total_AiZi,2)?></td>
                                            <td><?= number_format($true_Z,2,",",".")?></td>
                                        </tr>
                                    </tbody>
                                </table>

                                <?php
                                    //Tidak Naik Kelas
                                            if($true_Z <= 60){
                                                $tidakNaik = 1;
                                            }
                                            else if($true_Z >= 60 && $true_Z <= 100){
                                                $tidakNaik=(100-$true_Z)/(100-60);
                                            }
                                            else if($true_Z >= 100){
                                                $tidakNaik = 0;
                                            }
                                        
                                        
                                            //Naik Kelas
                                            if($true_Z >= 100){
                                                $naikKelas = 1;
                                            }
                                            else if($true_Z >= 60 && $true_Z <= 100){
                                                $naikKelas=($true_Z - 60)/(100-60);
                                            }
                                            else if($true_Z <= 70){
                                                $naikKelas = 0;
                                            }
                                        
                                        
                                            $NKmax = max($naikKelas, $tidakNaik);

                                            if($NKmax == $naikKelas){
                                                $keputusan = "Naik Kelas";
                                            }else{
                                                $keputusan = "Tidak Naik";
                                            }

                                ?>

                                <!-- Keputusan -->
                                <h4><div class="text-black"> Keputusan </div></h4>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Naik Kelas</th>
                                            <th>Tidak Naik</th>
                                            <th>Keputusan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $naikKelas?></td>
                                            <td><?= $tidakNaik?></td>
                                            <td><?= $keputusan?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="proses/prosesLogout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
<html class="no-js" lang="en">
<?php
session_start();

include '../conn/koneksi.php';
if(!isset($_SESSION['nama'])){
    echo "<script>alert('Silahkan login terlebih dahulu')</script>";
    echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
} else {

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard V.1 | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
    
</style>
<body>
    <!-- Start Left menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a style="text-decoration: none;" href="index.php"><h3>PERPUS</h3></a>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a title="Landing Page" href="index.php" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-tachometer-alt"></i></span> 
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=buku" aria-expanded="false">
                                <span class="educate-icon icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-book"></i></span> 
                                <span class="mini-click-non">Book</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=user" aria-expanded="false">
                                <span class="educate-icon  icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-users"></i></span> 
                                <span class="mini-click-non">Anggota</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=transaksi" aria-expanded="false">
                                <span class="educate-icon  icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-clipboard"></i></span> 
                                <span class="mini-click-non">Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=laporan" aria-expanded="false">
                                <span class="educate-icon  icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-file"></i></span> 
                                <span class="mini-click-non">Laporan</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=admin" aria-expanded="false">
                                <span class="educate-icon  icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-user"></i></span> 
                                <span class="mini-click-non">Admin</span>
                            </a>
                        </li>
                        <li>
                            <a title="Landing Page" href="?page=aboutUs" aria-expanded="false">
                                <span class="educate-icon  icon-wrap sub-icon-mg" aria-hidden="true"><i class="fas fa-user"></i></span> 
                                <span class="mini-click-non">About Us</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div style=" background-color: rgb(248, 248, 248);" class="all-content-wrapper">

        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper" style="display: flex; justify-content:space-between; align-items:center">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                    <i class="fas fa-sliders-h"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div style=" display: flex; align-items:center" class="foto-profil">
                                    <?php 
                                     $id =$_SESSION['id'];
                                     $query=mysqli_query($konek,"SELECT * FROM tbl_user WHERE id='$id'");
                                     $data=mysqli_fetch_assoc($query);
                                     ?>
                                    <img src="../images/<?=$data['foto']?>" style="width: 37px; height:37px; border-radius:50%;">
                                    <li style="list-style: none; margin-right: 25px" class="dropdown">
                                        <a style="text-decoration: none; color:#fff; margin-left:5px; padding-right:10px" class="dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= $data['username']?> <i class="fas fa-caret-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li><a style="text-decoration: none; font-size: 13px; text-align:center" class="dropdown-item" href="">Account</a></li>
                                            <hr  style="margin: 2px 3px;">
                                            <li><a style="text-decoration: none; font-size: 13px;" class="dropdown-item" href="?page=profil&id=<?= $id?>">Profil<i style="float: right;font-size: 11px;" class="fas fa-user "></i></a></li>
                                            <li><a style="text-decoration: none; font-size: 13px;" class="dropdown-item" href="?page=profilset&id=<?= $id?>">Setting<i style="float: right;font-size: 11px;" class="fa fa-cog"></i></a></li>
                                            <hr style="margin: 2px 3px;">
                                            <li><a style="text-decoration: none; font-size: 13px;" class="dropdown-item" href="../login.php">Sign Out<i style="float: right;font-size: 11px;" class="fa fa-ban fa-flip-horizontal"></i></a></li>
                                        </ul>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                    
          <div class="content" style="padding: 70px 20px 20px 20px">
                <?php
                 error_reporting(0);
                 switch($_GET['page'])
                    {
                        default:
                        include "home.php";
                        break;
                        
                        // menu buku                
                        case "buku";
                        include "buku_data.php";
                        break;
                        case "detil-buku";
                        include "buku_detil.php";
                        break;
                        case "buku_input";
                        include "buku_input.php";
                        break;
                        case "buku_proses";
                        include "buku_proses.php";
                        break;
                        case "buku_edit";
                        include "buku_edit.php";
                        break;
                        case "buku_hapus";
                        include "buku_hapus.php";
                        break;
                                                
                        // anggota
                        case "admin";
                        include "admin_data.php";
                        break;
                        case "admin_detil";
                        include "admin_detil.php";
                        break;
                        case "admin_input";
                        include "admin_input.php";
                        break;
                        case "admin_proses";
                        include "admin_proses.php";
                        break;
                        case "admin_edit";
                        include "admin_edit.php";
                        break;
                        case "admin_hapus";
                        include "admin_hapus.php";
                        break;
                        
                        
                        // transaksi
                        case "transaksi";
                        include "transaksi_data.php";
                        break;
                        case "transaksiguest";
                        include "../guest/transaksi_data.php";
                        break;
                        case "transaksi_input";
                        include "../transaksi_input.php";
                        break;
                        case "transaksi_proses";
                        include "../transaksi_proses.php";
                        break;
                        case "transaksi_search";
                        include "../transaksi_search.php";
                        break;
                        case "transaksi_proses_kembali";
                        include "../transaksi_proses_kembali.php";
                        break;
                        case "transaksi_proses_perpanjang";
                        include "../transaksi_proses_perpanjang.php";
                        break;
                        
                        
                        // laporan
                        case "laporan";
                        include "../laporan.php";
                        break;

                        // About US
                        case "aboutUs";
                        include "../aboutUs.php";
                        break;
                        
                        // User
                        case "user";
                        include "user_data.php";
                        break;
                        case "user_search";
                        include "user_search.php";
                        break;
                        case "user_input";
                        include "user_input.php";
                        break;
                        case "user_proses";
                        include "user_proses.php";
                        break;
                        case "user_detil";
                        include "user_detil.php";
                        break;
                        case "user_edit";
                        include "user_edit.php";
                        break;
                        case "user_hapus";
                        include "user_hapus.php";
                        break;

                        // profil
                        case "profil";
                        include "../profil.php";
                        break;
                        case "profilset";
                        include "profil_edit.php";
                        break;
              
                    
                    }
            ?>

          </div>         
        
    </div>

  
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
<?php } ?>
</html>

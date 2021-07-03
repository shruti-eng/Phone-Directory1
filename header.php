<?php //session_start(); 
?>
<?php if (isset($_GET['logout']))
    session_unset();
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HWPM Telephone Directory</title>
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<?php
if (isset($_SESSION['app'])) {
    if ($_SESSION['app'] != "telephone")
        session_unset();
} else session_unset();
require_once("config.php");
if ($conn->connect_error) die($conn->connect_error);
?>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

        <a class="navbar-brand" href="index.php">HWPM</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
               <div class="input-group">
                   <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                   <div class="input-group-append">
                       <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                   </div>
               </div>
           </form>
           <!-- Navbar-->

        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <a class="dropdown-item" href="pwchange.php">Password Change</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?logout=true">Logout</a>
                    <?php } else { ?>
                        <a class="dropdown-item" href="login.php">Login</a>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Important Numbers</div>
                        <a class="nav-link collapsed" href="emergency.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            Emergency Numbers

                        </a>
                        <a class="nav-link collapsed" href="managers.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                            Managers and Section Heads
                        </a>

                        <a class="nav-link collapsed" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Common User Numbers at Colony and Site
                        </a>



                        <div class="sb-sidenav-menu-heading">Quick Links</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                            Admin Building
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="administration.php">Administration</a>
                                <a class="nav-link" href="accounts.php">Accounts</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
                            Main-Plant
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="pp.php">Production Process(PP)</a>
                                <a class="nav-link" href="#">M & OM/IIS Section</a>
                                <a class="nav-link" href="#">Mechanical Process(MP)</a>
                                <a class="nav-link" href="#">Electrical Process(EP)</a>
                                <a class="nav-link" href="ip.php">Instrumentation Process(IP)</a>
                                <a class="nav-link" href="#">Technical Servies</a>
                                <a class="nav-link" href="#">HRD</a>
                                <a class="nav-link" href="#">Chemical Lab</a>
                                <a class="nav-link" href="#">Safety Section</a>
                                <a class="nav-link" href="#">Occupations Health Centre</a>
                                <a class="nav-link" href="#">Civil Site</a>
                                <a class="nav-link" href="#">Fire Services</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="cpp.php" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                            CPP
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Production Utilities(PU)</a>
                                <a class="nav-link" href="#">Mechanical Utilities(MU)</a>
                                <a class="nav-link" href="#">DRCC</a>
                                <a class="nav-link" href="#">Electrical Utilities(EU)</a>
                                <a class="nav-link" href="#">Instrumentation Utilities(IU)</a>
                                <a class="nav-link" href="#">CPP Control Room</a>

                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            DPS
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="colony.php" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Colony
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Colony Security </a>
                                <a class="nav-link" href="#">AEC School</a>
                                <a class="nav-link" href="#">Estate Management Cell - Civil</a>
                                <a class="nav-link" href="#">Estate Management Cell - Electrical</a>
                                <a class="nav-link" href="#">HWPM Hospital</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            CISF

                        </a>

                        <div class="sb-sidenav-menu-heading">Miscellaneous Services</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-clinic-medical"></i></div>
                           CHSS Panel Hospitals
                           <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Ayurvedic & Homeopathy </a>
                                <a class="nav-link" href="#">Allopathy</a>
                                <a class="nav-link" href="#">Super Speciality Hospitals at Hyd</a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts7" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            Heavy Water General Facilities(HWGF)

                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts8" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            NFC HWB Training School
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            HWB and Other HWPs

                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts10" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            Mail users of HWPM
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts11" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            DAE Guest Houses
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts12" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            Anunet Access Codes
                        </a>

                        

                        <div class="sb-sidenav-menu-heading">Telephone Admin</div>

                        <a class="nav-link collapsed" href="teleadmin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Telephone Admin

                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <?php if (isset($_SESSION['name'])) { ?>
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['name']; ?>
                    <?php }

                    ?>
                </div>
            </nav>
        </div>
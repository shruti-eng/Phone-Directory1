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
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Quick Links</div>
                        <a class="nav-link collapsed" href="mech.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            Emergency Numbers

                        </a>
                        <a class="nav-link collapsed" href="managers.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Management

                        </a>
                        <a class="nav-link collapsed" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                            Admin Building
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="#">Administration</a>
                                <a class="nav-link" href="#">Accounts</a>

                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="mp.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
                            Main-Plant
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="cpp.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                            CPP
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="colony.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Colony
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            CISF

                        </a>

                        <a class="nav-link collapsed" href="teleadmin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Telephone Admin

                        </a>


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <?php if (isset($_SESSION['name'])) { ?>
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['name']; ?>
                    <?php }
                    /* $query = $conn->query("SELECT * FROM `sec_act_log` ORDER BY `eno` DESC");
                    if (!$query) die($conn->error);
                    while ($row = $query->fetch_assoc()) {
                        echo "<div class='small'>Last Update:<br> " . date("d-m-Y g:i:sA", strtotime($row['time'])) . "</div>";
                        break;
                    }*/
                    ?>
                </div>
            </nav>
        </div>
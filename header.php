<?php session_start(); ?>
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
    if ($_SESSION['app'] != "mta")
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
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            Emergency Numbers

                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Management

                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts">
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


                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-industry"></i></div>
                            Main-Plant
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                            CPP
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Colony
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-balance-scale"></i></div>
                            CISF

                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="modal" data-target="#myModal" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                            Directory Administrator

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


        <!-- Modal -->

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog .modal-dialog-centered  modal-lg ">

                <!-- Modal content  1-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Details</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <p>Some text in the modal 1.</p> -->


                        <form name="Form1" action="" method="POST" role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="bg-primary">
        <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">HWPM Telephone Directory</h3>
                                </div>
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                                </div>

                                <div class="card-body">
                                    <form>
                                        <div class="form-group"><label class="small mb-1" for="un">User Name</label><input class="form-control" id="un" type="email" placeholder="Enter User Name " /></div>
                                        <div class="form-group"><label class="small mb-1" for="pw">Password</label><input class="form-control" id="pw" type="password" placeholder="Enter Password" /></div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rem2" type="checkbox" name="rem" /><label class="custom-control-label" for="rem2">Remember password</label></div>
                                        </div> -->
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Forgot Password?</a></div>
                                        <!-- <br>   <div><a class="btn btn-primary" id="login2" href="index.php">Enter Without Login</a></div> -->
                                         <br>  <div><a class="btn btn-primary" id="login" href="#">Login</a></div>
                                    </form>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
    </div>

    </div>

             </form>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="admin">Close</button>
                    </div>
                </div>

            </div>
        </div>


<script>

$("#login").click(function() {
            $.ajax({
                url: 'adminauth.php',
                data: {
                    u: $("#un").val(),
                    p: $("#pw").val(),
                   
                },
                success: function(data) {
                    alert(data);
                    $d = data.substring(0, 7);
                    if ($d == "Welcome") {
                        $temp = "";
                        $temp = "<?php
                                    echo "index.php";
                                    ?>";
                        window.location = $temp;
                    } else alert("Login Failed Please retry");
                },
                error: function() {
                    alert("something went wrong, contact admin");
                }
            });
        });


</script>
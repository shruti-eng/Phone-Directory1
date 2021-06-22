<?php
//require_once "dbcon.php";

session_start();
session_unset();
//require_once 'destroysession.php';
require_once 'BrowserDetection.php';
$browser = new BrowserDetection();
$browsername = $browser->getName();
if ($browsername=="Internet Explorer")
header("Location: incompatable.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login-MTA-20 Status Portal</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">HWPM MTA-20 Portal</h3></div>
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    
									<div class="card-body">
                                        <form>
                                            <div class="form-group"><label class="small mb-1" for="un">User Name</label><input class="form-control" id="un" type="email" placeholder="Enter User Name (Your IC No)" /></div>
                                            <div class="form-group"><label class="small mb-1" for="pw">Password</label><input class="form-control" id="pw" type="password" placeholder="Enter Password" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rem2" type="checkbox" name="rem"/><label class="custom-control-label" for="rem2">Remember password</label></div>
                                            </div>
											<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="password.html">Forgot Password?</a><a class="btn btn-primary" id="login2" href="index.php">Enter Without Login</a><a class="btn btn-primary" id="login" href="#">Login</a></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="pwchange.php">Change Password</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;2020 Developed By Chaitanya Allam, SO/E, Inst-P</div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script>
$("#un").val($.cookie("user"));
$("#pw").val($.cookie("pw"));
if($.cookie("rem"))
	$("#rem2").prop('checked',true)
$( "#login" ).click(function() {
  $.ajax({
      url: 'auth.php',
      data: {
              u: $("#un").val(),
              p: $("#pw").val(),
              r: $("input[name='rem']:checked"). val(),
             },
      success: function(data) {
      	alert(data);
        $d= data.substring(0,7);
        if($d == "Welcome")
        {
        $temp="";
		$temp ="<?php
		echo "index.php";
		?>";
	    window.location=  $temp;
	    }
	    else alert("Login Failed Please retry");
	},
	error: function(){
		alert("something went wrong, contact admin");
	}
});
});</script>
    </body>
</html>


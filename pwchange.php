<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change Password</h3></div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="un">User Name</label><input class="form-control" id="un" type="text" placeholder="Enter username(icno)" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="pw">Existing Password</label><input class="form-control" id="pw" type="text" placeholder="Enter your existing password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="pw1">New Password</label><input class="form-control" id="pw1" type="password" placeholder="Enter new password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="pw2">Confirm New Password</label><input class="form-control" id="pw2" type="password" placeholder="Confirm new password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="#" id="pwch">Change Password</a></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Click Here! to Login</a></div>
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
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
	<script>
	$( "#pwch" ).click(function() {
		if ($("#pw1").val()==$("#pw2").val()&&$("#un").val()!=""&&$("#pw").val()!=""&&$("#pw2").val()!=""&&$("#pw2").val()!="")
		{
  $.ajax({
      url: 'pwch_script.php',
      data: {
              u: $("#un").val(),
              p: $("#pw").val(),
              np: $("#pw1").val(),
			 },
      success: function(data) {
      	$d= data
        if($d == "Pass Word Changed")
        {
		alert("Password changed successfully, \nNow you will be redirected to Login Page");
        $temp="";
		$temp ="<?php
		echo "login.php";
		?>";
	    window.location=  $temp;
	    }
	    else alert("Password changing failed, please retry");
	},
	error: function(){
		alert("something went wrong, contact admin");
	}
		});}
		else 
			alert("Please confirm both the passwords entered are same \n Also confirm all the fields are filled");
});</script>
    </body>
</html>

<?php
include_once("config.php");
$name= mysqli_real_escape_string($conn, $_GET['name']);
$icno=mysqli_real_escape_string($conn, $_GET['icno']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
$desig= mysqli_real_escape_string($conn,$_GET['desig']);
$email= mysqli_real_escape_string($conn,$_GET['email']);
$mobile= mysqli_real_escape_string($conn,$_GET['mobile']);
$cat1 = mysqli_real_escape_string($conn, $_GET['cat1']);
$cat2 = mysqli_real_escape_string($conn, $_GET['cat2']);
$cat3 = mysqli_real_escape_string($conn, $_GET['cat3']);

$query_string="INSERT INTO `employee` (`icno`, `name`,`designation`,`section`, `email`,`mobile`,`cat1`,`cat2`,`cat3`) values('".$icno."', '".$name."', '".$desig."', '".$section."', '".$email."', '".$mobile."', '".$cat1."', '".$cat2."', '".$cat3."')";
$query=$conn->query($query_string);
if(($query))
{
    echo "Success";
}
else {
 echo "Something went wrong";
}

?>

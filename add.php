<?php
include_once("config.php");
$name= mysqli_real_escape_string($conn, $_GET['name']);
$icno=mysqli_real_escape_string($conn, $_GET['icno']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
$desig= mysqli_real_escape_string($conn,$_GET['desig']);
$email= mysqli_real_escape_string($conn,$_GET['email']);
$mobile= mysqli_real_escape_string($conn,$_GET['mobile']);
$query_string="Insert into `employee` (`icno`, `name`,`designation`,`section`, `email`,`mobile`) values('".$icno."', '".$name."', '".$desig."', '".$section."', '".$email."', '".$mobile."')";
$query=$conn->query($query_string);
if(($query))
{
    echo "Success";
}
else 
 echo "Something went wrong";
?>
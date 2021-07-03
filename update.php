<?php

require_once 'config.php';

if (isset($_GET['icno'])) {
$id = $_GET['icno'];
$name = $_GET['name'];
$desig = $_GET['desig'];
$section = $_GET['section'];
$email=$_GET['email'];
$mobile=$_GET['mobile'];
$cat1=$_GET['cat1'];
$cat2=$_GET['cat2'];
$cat3=$_GET['cat3'];

$query_string3 = "UPDATE `employee` SET  `name`= '".$name."', `section`= '".$section."', `designation`= '".$desig."', `email`='".$email."',`mobile` = '".$mobile."' ,`cat1`='".$cat1."',`cat2`='".$cat2."',`cat3`='".$cat3."' WHERE  `icno` ='".$id."'";
$query3 = $conn->query($query_string3);

if (($query3)) {
    echo "Updated";
} else {
    echo "Something went wrong";
}

}

?>




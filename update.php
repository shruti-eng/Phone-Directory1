<?php

require_once 'config.php';

if (isset($_GET['icno'])) {
$id = $_GET['icno'];
$name = $_GET['name'];
$desig = $_GET['desig'];
$section = $_GET['section'];
$query_string3 = "UPDATE `employee` SET  `name`= '".$name."', `section`= '".$section."', `designation`= '".$desig."'  WHERE `icno` ='".$id."'";
$query3 = $conn->query($query_string3);

if (($query3)) {
    echo "Updated";
} else {
    echo "Something went wrong";
}

}

?>




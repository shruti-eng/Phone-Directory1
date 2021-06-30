<?php

require_once 'config.php';

if (isset($_GET['icno'])) {
$id = $_GET['icno'];
$name = $_GET['name'];
$desig = $_GET['desig'];
$section = $_GET['section'];

$query_string4 = "DELETE FROM `employee` WHERE `icno` ='".$id."'";
// $query_string4 = "DELETE FROM `phone_master` WHERE `pno` ='".$id."'";

$query4 = $conn->query($query_string4);

if (($query4)) {
    echo "Deleted";
} else {
    echo "Something went wrong";
}

}

?>



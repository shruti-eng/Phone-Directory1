<?php

require_once 'config.php';

if (isset($_GET['icno'])) {

$id = $_GET['icno'];
$name = $_GET['name'];
$desig = $_GET['desig'];
$section = $_GET['section'];
$email=$_GET['email'];

$query_stringg = "DELETE FROM `employee` WHERE `icno` = $id";


$query0 = $conn->query($query_stringg);

if (($query0)) {
    echo "Deleted";
} else {
    echo "Something went wrong";
}
}
?>



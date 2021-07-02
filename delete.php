<?php

require_once 'config.php';

if (isset($_GET['id'])) {

$id = $_GET['id'];
$query_str = "DELETE FROM `employee` WHERE `icno`='".$id."'";

$query0 = $conn->query($query_str);

if (($query0)) {
    echo "Deleted";
} else {
    echo "Something went wrong";
}
}

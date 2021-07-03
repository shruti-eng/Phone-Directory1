<?php

require_once 'config.php';

if (isset($_GET['id'])) {

$id = $_GET['id'];
$query_str = "DELETE FROM `phone_master` WHERE `pno`='".$id."'";

$query0 = $conn->query($query_str);

if (($query0)) {
    echo "Deleted";
} else {
    echo "Something went wrong";
}
}

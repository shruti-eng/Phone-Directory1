<?php

require_once 'config.php';

if (isset($_GET['pno'])) {

$eno = $_GET['eno'];
$id = $_REQUEST['pno'];
$details = $_GET['details'];
$technician = $_GET['technician'];

$action  = $_GET['action'];

$query_string3 = "UPDATE `complaint` SET  `technician`= '".$technician."', `active`= '0', `action`='".$action."'  WHERE `eno` ='".$eno."'";
$query3 = $conn->query($query_string3);
if($_GET['no_of_comp']==1){
$query_string4 = "UPDATE `phone_master` SET  `complaint_flag`= '0' WHERE `pno` ='".$id."'";
$query4 = $conn->query($query_string4);



if(!$query3 || !$query4)
    {
        die("Database Error");
    }

        echo "Complaint  Updated";
    }
else{
if(!$query3)
    {
        die("Database Error");
    }
        echo "Complaint  Updated";
}
    }
?>
<?php

require_once 'config.php';

if (isset($_GET['pno'])) {

    $id = $_GET['pno'];
    $details= $_GET['complaint'];


    $query_stringg = "INSERT INTO `complaint` (`pno`, `details`, `active`, `action`,`technician`) values ('".$id."', '".$details."', '1', '', '')";
    $queryy = $conn->query($query_stringg);
    $query_stringg = "UPDATE `phone_master` SET `complaint_flag`='1' where `pno`='".$id."'";
    $queryy2 = $conn->query($query_stringg);
    
    if(!$queryy||!$queryy2)
    {
        die("Database Error");
    }

        echo "Complaint Registered";
    
}
?>
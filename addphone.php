<?php
include_once("config.php");
$pno = mysqli_real_escape_string($conn, $_GET['pno']);
$parallel_pno = mysqli_real_escape_string($conn, $_GET['parallel_pno']);
$callerid_phone = mysqli_real_escape_string($conn, $_GET['callerid_phone']);
$wireless_phone = mysqli_real_escape_string($conn, $_GET['wireless_phone']);
$zero_dialing = mysqli_real_escape_string($conn, $_GET['zero_dialing']);
$jbdetails = mysqli_real_escape_string($conn, $_GET['jbdetails']);
$icno = mysqli_real_escape_string($conn, $_GET['icno']);
$cat1 = mysqli_real_escape_string($conn, $_GET['cat1']);
$cat2 = mysqli_real_escape_string($conn, $_GET['cat2']);
$cat3 = mysqli_real_escape_string($conn, $_GET['cat3']);

// $section = mysqli_real_escape_string($conn,$_GET['section']);
$query_string11 = "INSERT INTO `phone_master` (`pno`,`parallel_pno`,`callerid_phone`,`wireless_phone`,`zero_dialing`,`jbdetails`,`icno`,`cat1`,`cat2`,`cat3`) values('".$pno."', '".$parallel_pno."', '".$callerid_phone."', '".$wireless_phone."', '".$zero_dialing."', '".$jbdetails."', '".$icno."', '".$cat1."', '".$cat2."', '".$cat3."')";

$query11 = $conn->query($query_string11);
if (($query11)) {
    echo "Phone added";
} else{
    echo "Something went wrong";
}

?>
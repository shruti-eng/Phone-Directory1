<?php

require_once 'dbconfig.php';

if (isset($_REQUEST['id'])) {

    $id = intval($_REQUEST['id']);
    $query = "SELECT * FROM employee WHERE icno =:id";
    $stmt = $DBcon->prepare($query);
    $stmt->execute(array(':id' => $id));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    extract($row);
}

    
// include_once("config.php");
// $name = mysqli_real_escape_string($DBcon, $_GET['name']);
// // $icno = mysqli_real_escape_string($conn, $_GET['icno']);
// 
// $section = mysqli_real_escape_string($conn, $_GET['section']);
// $desig = mysqli_real_escape_string($conn, $_GET['desig']);
$icno = $id;
$name = $_GET['name'];
$desig = $_GET['designation'];
$section = $_GET['section'];
$query_string = " UPDATE `employee` SET  `name`= $name, `section`= $section, `designation`= $desig  WHERE `icno` = $icno  ";
$query = $DBcon->query($query_string);
if (($query)) {
    echo "Updated";
} else {
    echo "Something went wrong";
}

?>




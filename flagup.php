<?php

require_once 'config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    // $query = "SELECT * FROM employee WHERE icno =:id";
    // $stmt = $DBcon->prepare($query);
    // $stmt->execute(array(':id' => $id));

    // $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // extract($row);



// $icno = $id;
$name = $_GET['name'];
$desig = $_GET['designation'];
$section = $_GET['section'];
// $query_string = " UPDATE `employee` SET  `name`= $name, `section`= $section, `designation`= $desig  WHERE `icno` ='".$id."' $id  ";
$query_string = " SELECT * from `phone_master`   WHERE `pno` ='".$id."' $id  ";
$query = $conn->query($query_string);
// $query = $DBcon->query($query_string);
if (($query)) {
    echo "Updated";
} else {
    echo "Something went wrong";
}

}

?>



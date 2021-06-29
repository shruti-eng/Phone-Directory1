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
// $name = $_GET['name'];
// $desig = $_GET['designation'];
// $section = $_GET['section'];
// $query_string = " UPDATE `employee` SET  `name`= $name, `section`= $section, `designation`= $desig  WHERE `icno` ='".$id."' $id  ";
$query_string = " SELECT * from `phone_master` WHERE `pno` ='".$id."' $id";
$query2 = $conn->query($query_string);
// $row2=$query2->fetch_assoc();

// $num_rows = $query2->num_rows;
//     if ($num_rows != 0) {
//         while ($row2=$query2->fetch_assoc())
//         {
//             // if($row2['off']==1)
//             // echo $row2['pno'].", ";
//             $row['complaint'] = 1;
//         }
        
//     }
// $query = $DBcon->query($query_string);
if (($query2)) {
    $row['complaint'] = 1;
    echo "Complaint Registered";
} else {
    echo "Something went wrong";
}

}

?>






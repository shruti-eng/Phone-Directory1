<?php

require_once 'config.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

     
                                        $query_stringg="SELECT * FROM `complaint` where `pno`='".$id."'";
                                        $queryy=$conn->query($query_stringg);
                                        if($queryy->num_rows>0)
                                        {
                                            $row2=$query2->fetch_assoc();
                                            $details =  $row2['complaint'];
                                        }
                                    

    // $details = $_GET['complaint'];
//
$query_string5 = "UPDATE `phone_master` SET  `complaint_flag`= '1' WHERE `pno` ='".$id."'";
 $query_string6 = "UPDATE `complaint` SET  `details`= '".$details."' WHERE `pno` ='".$id."'";

$query5 = $conn->query($query_string5);
$query6 = $conn->query($query_string6);


if (($query5 && $queryy)) {
    
    echo "Complaint Registered";
} else {
    echo "Something went wrong";
}

}

?>






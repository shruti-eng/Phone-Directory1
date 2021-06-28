<?php
require_once"config.php";
if (isset($_GET['icno'])) {
    $icno = $_GET['icno'];
    $query_string = "SELECT * FROM `phone_master` where `icno`='" . $icno . "'";
    $query2 = $conn->query($query_string);
    $num_rows = $query2->num_rows;
    if ($num_rows != 0) {
        while ($row2=$query2->fetch_assoc())
        {
            if($row2['res']==1)
            echo $row2['pno'].", ";
        }
        
    }
}
?>
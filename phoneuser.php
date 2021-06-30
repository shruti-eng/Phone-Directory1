<?php

$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "telephone";

try {
 $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
 $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $ex){
 die($ex->getMessage());
}

if (isset($_REQUEST['id'])) {

    $id = intval($_REQUEST['id']);
    $query = "SELECT * FROM phone_master WHERE pno =:id";
    $stmt = $DBcon->prepare($query);
    $stmt->execute(array(':id' => $id));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    extract($row);

?>

    <div class="table-responsive">

        <table class="table table-striped table-bordered">

        <tr>
                <th>Phone No</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Parallel Phones</th>
                <td><?php echo $parallel_pno; ?></td>
            </tr>
            <tr>
                <th>Caller Id Phones</th>
                <td><?php echo $callerid_phone; ?></td>
            </tr>
            <tr>
                <th>Zero Dialling Phones</th>
                <td><?php echo $zero_dialing; ?></td>
            </tr>
            <tr>
                <th>JB Details</th>
                <td><?php  echo $jbdetails; ?></td>
            </tr>
<br>
            <tr>
                <th>Assigned to IC No. </th>
                <td><?php  echo $icno; ?></td>
            </tr>

            <!-- <tr>
                <th>Mobile no.</th>
                <td><?php //  echo $pno; ?></td>
            </tr> -->
<!-- 
            <tr>
                <th>Email Id</th>
                <td><?php // echo $email; ?></td>
            </tr> -->


            
        </table>

    </div>

<?php
}

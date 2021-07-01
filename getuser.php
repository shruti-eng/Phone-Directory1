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
    $query = "SELECT * FROM employee WHERE icno =:id";
    $stmt = $DBcon->prepare($query);
    $stmt->execute(array(':id' => $id));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    extract($row);

?>

    <div class="table-responsive">

        <table class="table table-striped table-bordered">

        <tr>
                <th>IC No</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>Designation</th>
                <td><?php echo $designation; ?></td>
            </tr>
            <tr>
                <th>Section</th>
                <td><?php echo $section; ?></td>
            </tr>
            <tr>
                <th>Office</th>
                <td><?php  echo $pno; ?></td>
            </tr>

            <tr>
                <th>Residence</th>
                <td></td>
            </tr>

            <!-- <tr>
                <th>Mobile no.</th>
                <td><?php //  echo $pno; ?></td>
            </tr> -->

            <tr>
                <th>Email Id</th>
                <td><?php  echo $email; ?></td>
            </tr>

            <tr>
                <th>Mobile No.</th>
                <td><?php  echo $mobile; ?></td>
            </tr>


            
        </table>

    </div>

<?php
}

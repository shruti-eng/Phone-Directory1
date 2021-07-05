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

            <th>Categories</th>
            <tr>
                <th>Category 1:</th>
                <td><?php 
                $cat = $cat1;
                require_once"config.php";
                $query_string = "SELECT * FROM `category_master` where `eno`='" . $cat . "'";
                $query2 = $conn->query($query_string);
                $row2=$query2->fetch_assoc();
                echo $row2['cname'];                   
                 ?>
                </td>
            </tr> 
 
            <tr>
                <th>Category 2:</th>
                <td>
                <?php 
                $cat = $cat2;
                require_once"config.php";
                $query_string = "SELECT * FROM `category_master` where `eno`='" . $cat . "'";
                $query2 = $conn->query($query_string);
                $row2=$query2->fetch_assoc();
                echo $row2['cname'];                   
                 ?>
                </td>
            </tr>

            <tr>
                <th>Category 3:</th>
                <td>
                <?php 
                $cat = $cat3;
                require_once"config.php";
                $query_string = "SELECT * FROM `category_master` where `eno`='" . $cat . "'";
                $query2 = $conn->query($query_string);
                $row2=$query2->fetch_assoc();
                echo $row2['cname'];                   
                 ?>
                </td>
            </tr>


            
        </table>

    </div>

<?php
}

<?php

require_once 'config.php';


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query_string = "SELECT * FROM `complaint` where `pno`='" . $id . "'";
    $query = $conn->query($query_string);
    $num_rows = $query->num_rows;
    if ($num_rows != 0) {
        $row = $query->fetch_assoc();
        $details = $row['details'];
    } //else die("No ID selected");


?>

    <div class="table-responsive">

        <table class="table table-striped table-bordered">

            <tr>
                <th>Phone No</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Complaint Description</th>
                <td><?php echo $details; ?></td>
            </tr>

            




            <!-- <tr>
                <th>Designation</th>
                <td><?php //echo $designation; 
                    ?></td>
            </tr>
            <tr>
                <th>Section</th>
                <td><?php // echo $section; 
                    ?></td>
            </tr>
            <tr>
                <th>Office</th>
                <td><?php // echo $pno; 
                    ?></td>
            </tr> -->

            <!-- <tr>
                <th>Residence</th>
                <td></td>
            </tr> -->

            <!-- <tr>
                <th>Mobile no.</th>
                <td><?php //  echo $pno; 
                    ?></td>
            </tr> -->
            <!-- 
            <tr>
                <th>Email Id</th>
                <td><?php  //echo $email; 
                    ?></td>
            </tr> -->



        </table>

    </div>

<?php
}
?>
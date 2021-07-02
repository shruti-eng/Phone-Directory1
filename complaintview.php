<?php

require_once 'config.php';


if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query_string = "SELECT * FROM `complaint` where `pno`='" . $id . "' and `active`='1'";
    $query = $conn->query($query_string);
    $num_rows = $query->num_rows; ?>
    <div class="table-responsive">

        <table class="table table-striped table-bordered">

            <tr>
                <th>Phone No</th>
                <td><?php echo $id; ?></td>
            </tr>
            <?php
            if ($num_rows != 0) {
                while ($row = $query->fetch_assoc()) {
                    $details = $row['details'];
            ?>
                    <tr>
                        <th>Complaint No: <?php echo $row['eno'];?></th>
                        <td><?php echo $details.", Dtd:-".$row['updatedon']; ?></td>
                    </tr>
            <?php


                } //else die("No ID selected");
            }
            ?>
        </table>
    </div>
<?php
}
?>
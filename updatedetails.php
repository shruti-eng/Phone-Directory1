<?php

require_once 'dbconfig.php';

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

        </table>

    </div>    

            <form id="update_form" name="Form_update" action="" method="POST" role="form">

                <div class="form-group">
                    <label>Employee Name<font color="red">*</font></label>
                    <input class="form-control" placeholder="Enter Name" name="name" required=required>
                </div>

                <div class="form-group">
                    <label>Designation</label>
                    <input class="form-control" placeholder="Enter Designation" name="desig">
                </div>

                <div class="form-group">
                    <label>Section</label>
                    <select class="form-control" name="section">
                        <?php

                        $query1 = "SELECT * FROM section_master";
                        $stmt1 = $DBcon->prepare($query1);
                        $len = 0;
                        $row = $stmt1->fetch(PDO::FETCH_ASSOC);
                        $len = $stmt1->num_rows;
                        if ($len != 0) {
                            while ($row) {
                                echo "<option>" . $row['section'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

            </form>


            
        

    

<?php
}



<?php

require_once 'config.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query_string = "SELECT * FROM `employee` where `icno`='" . $id . "'";
    $query = $conn->query($query_string);
    $num_rows = $query->num_rows;
    if ($num_rows != 0) {
        $row = $query->fetch_assoc();
        $section = $row['section'];
    } else die("No ID selected");

?>

    <!-- <div class="table-responsive">

        <table class="table table-striped table-bordered">

            <tr>
                <th>Phone No</th>
                <td><?php //echo $row['pno']; 
                    ?></td>
            </tr>

        </table>

    </div> -->

    <form id="update_form" name="Form_complaint" action="" method="POST" role="form">

        <div class="form-group">
            <label>Phone No.</label>
            <input class="form-control" name="pno" value="<?php echo $row['pno']; ?>" readonly>
        </div>

        <div class="form-group">
            <label>IC No.<font color="red">*</font></label>
            <input class="form-control" placeholder="Enter Your IC No" name="icno" required=required value="<?php echo $row['icno']; ?>">
        </div>

        <div class="form-group">
            <label>Name<font color="red">*</font></label>
            <input class="form-control" placeholder="Enter your Name" name="name" required=required value="<?php echo $row['name']; ?>">
        </div>

        <div class="form-group">
            <label>Designation</label>
            <input class="form-control" placeholder="Enter Designation" name="desig" value="<?php echo $row['designation']; ?>">
        </div>

        <div class="form-group">
            <label>Section</label>
            <select class="form-control" name="section" id="sec_edit">
                <?php

                $query = $conn->query("SELECT * FROM `section_master`");
                $len = 0;
                $len = $query->num_rows;
                if ($len != 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo "<option value='" . $row['section'] . "'";
                        if ($row['section'] == $section)
                            echo "selected='selected'";
                        echo ">" . $row['section'] . "</option>";
                    }
                }
                ?>
            </select>
            <br>
            <div class="form-group">
                <label>Complaint Details</label>
                <textarea class="form-control" name="complaint" rows="4" cols="50"></textarea>
                <!-- <input class="form-control" placeholder="" name="complaint"> -->
            </div>
        </div>

    </form>


    <?php
} ?>

<script>
    var upno = $(this).data('pno');
    $("#comp").click(function() {
        $.ajax({
            url: 'flagup.php',
            method: 'GET',
            data: $("#Form_complaint").serialize(),
            data: 'id='+upno,
            success: function(data) {
                alert(data);
                document.location.reload();
            },
            error: function() {
                alert("something went wrong, contact admin");
            }
        });
    })
</script>

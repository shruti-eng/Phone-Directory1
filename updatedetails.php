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

    <div class="table-responsive">

        <table class="table table-striped table-bordered">

            <tr>
                <th>IC No</th>
                <td><?php echo $id; ?></td>
            </tr>

        </table>

    </div>

    <form id="update_form" name="update_form" action="" method="POST" role="form">

        <div class="form-group">
            <label>Employee Name<font color="red">*</font></label>
            <input class="form-control" placeholder="Enter Name" name="name" required=required value="<?php echo $row['name']; ?>">
        </div>
        <div class="form-group" style="display:none;">
            <label>Employee ICno<font color="red">*</font></label>
            <input class="form-control" id="update_icno" name="icno" required=required value="<?php echo $row['icno']; ?>">
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
                    while ($row2 = $query->fetch_assoc()) {
                        echo "<option value='" . $row2['section'] . "'";
                        if ($row2['section'] == $section)
                            echo "selected='selected'";
                        echo ">" . $row2['section'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>


        <div class="form-group">
                        <label>Category-1</label>
                        <select class="form-control" placeholder="Choose Category 1" name="cat1">
                            <?php
                            $query = $conn->query("SELECT * FROM `category_master`");
                            $len = 0;
                            $len = $query->num_rows;
                            if ($len != 0) {
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option value='".$row['eno']."'>" . $row['cname'] . "</option>";                                   
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category-2</label>
                        <select class="form-control" placeholder="Choose Category 2" name="cat2">
                            <?php
                            $query = $conn->query("SELECT * FROM `category_master`");
                            $len = 0;
                            $len = $query->num_rows;
                            if ($len != 0) {
                                while ($row = $query->fetch_assoc()) {
                                    
                                    echo "<option value='".$row['eno']."'>" . $row['cname'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                     <div class="form-group">
                        <label>Category-3</label>
                        <select class="form-control" placeholder="Choose Category 3" name="cat3">
                            <?php
                            $query = $conn->query("SELECT * FROM `category_master`");
                            $len = 0;
                            $len = $query->num_rows;
                            if ($len != 0) {
                                while ($row = $query->fetch_assoc()) {
                                    
                                    echo "<option value='".$row['eno']."'>" . $row['cname'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>            


        <div class="form-group" style="display:none;">
            <label>Office</label>
            <input class="form-control" name="off" value="<?php echo $row['pno']; ?>">
        </div>

        <div class="form-group" style="display:none;">
            <label>Residence</label>
            <input class="form-control" name="res">
        </div>

        <div class="form-group">
            <label>Email Id</label>
           <?php $query_string = "SELECT * FROM `employee` where `icno`='" . $id . "'";
            $query = $conn->query($query_string);
            if ($num_rows != 0) {
                $row = $query->fetch_assoc();} ?>
            <input class="form-control" name="email" placeholder="Enter Email Id" value="<?php echo $row['email']; ?>">
        </div>

        <div class="form-group">
            <label>Mobile Number</label>
            <input class="form-control" name="mobile" placeholder="Enter Mobile Number" value="<?php echo $row['mobile']; ?>">
        </div>

    </form>

<!-- For update -->
<?php
} ?>
<script>
    $("#update").click(function() {
        var uid = $(this).data('id');
        $.ajax({
            url: 'update.php',
            method: 'GET',
            data: $("#update_form").serialize(),


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


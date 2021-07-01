<?php

require_once 'config.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $query_string = "SELECT * FROM `complaint` where `pno`='" . $id . "'";
    $query = $conn->query($query_string);
    $num_rows = $query->num_rows;
    if ($num_rows != 0) {
        $row = $query->fetch_assoc();
        // $section = $row['section'];
    } else die("No ID selected");

?>



    <form id="update_form" name="update_form" action="" method="POST" role="form">


        <div class="form-group" >
            <label>Complaint no.</label>
            <select class="form-control" name="eno">

            <?php while($row=$query->fetch_assoc())
            {
                ?>
                <option value="<?php echo $row['eno']; ?>"><?php echo $row['eno']; ?></option>
                <?php
            }?>
        </div>

        <div class="form-group">
            <label>Phone no.</label>
            <input class="form-control" name="pno" value="<?php echo $row['pno']; ?>" readonly>
        </div>


        <div class="form-group">
            <label>Complaint Description</label>
            <input class="form-control" id="update_icno" name="details" value="<?php echo $row['details']; ?>" readonly>
        </div>

        <div class="form-group">
            <label>Technician</label>
            <input class="form-control" placeholder="Enter Techinician Name" name="technician">
        </div>

        <div class="form-group">
            <label>Action Taken</label>
            <input class="form-control" name="action">
        </div>

        <div class="form-group">
            <label>Updated On</label>
            <input class="form-control" name="updatedon">
        </div>
    </form>








<?php
} ?>
<script>
    $("#update").click(function() {
        var uid = $(this).data('id');
        $.ajax({
            url: 'comp.php',
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

<!-- For Delete -->

<script>
    $("#delete").click(function() {
        var uid = $(this).data('id');
        $.ajax({
            url: 'delete.php',
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
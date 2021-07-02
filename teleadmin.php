<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">

            <h1 class="mt-4">Telephone Directory </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">HWP(M)</li>
            </ol>
            <div class="card mb-4">

                <div class="card-header">

                    <?php if (isset($_SESSION['un']) && !empty($_SESSION['un']) && isset($_SESSION['pw']) && !empty($_SESSION['pw'])) {
                    ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaladd">Add New </button><br><br>

                    <?php } ?>

                    <div class="card-header"><i class="fas fa-table mr-1"></i>All Contacts</div>
                    <div class="card-body">


                        <div class="table-responsive table-hover">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!-- <th>Emp.No</th> -->
                                        <th>PNo.</th>
                                        <th>Assignee Name</th>
                                        <th>Assignee Section</th>

                                        <th>JB Details</th>
                                        <th>Complaint Exists</th>
                                        <th>Zero Dialing</th>
                                        <!-- <th>Office</th>
                                        <th>Res</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $query = $conn->query("SELECT * FROM `phone_master`");
                                    if (!$query) die($conn->error);
                                    $x = 0;
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                    ?>

                                        <td>
                                            <?php echo $row['pno'] ?>
                                        </td>
                                        <td><?php
                                            $query_string2 = "SELECT * FROM employee where `icno`='" . $row['icno'] . "'";
                                            $query2 = $conn->query($query_string2);
                                            if ($query2->num_rows > 0) {
                                                $row2 = $query2->fetch_assoc();
                                                echo $row2['name'];
                                            }
                                            ?></td>
                                        <td><?php if (isset($row2))
                                                echo $row2['section']; ?></td>
                                        <td><?php echo $row['jbdetails'] ?></td>
                                        <td><?php if ($row['complaint_flag'] == 1) {
                                                echo "Yes"; ?>


                                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#Complaint_Modal" id="viewComplaint" data-id="<?php echo $row['pno'] ?>"><i class="fa fa-eye"></i></button>

                                                <?php if (isset($_SESSION['un']) && !empty($_SESSION['un']) && isset($_SESSION['pw']) && !empty($_SESSION['pw'])) {
                                                ?>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" id="updatedetails" data-id="<?php echo $row['pno'] ?>"><i class="fa fa-edit"></i></button>
                                                <?php } ?>

                                            <?php } else
                                                echo "No";
                                            ?>


                                        </td>
                                        <td>
                                            <?php if ($row['zero_dialing'] == 1)
                                                echo "Yes";
                                            else
                                                echo "No";
                                            ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalview" id="getUser" data-id="<?php echo $row['pno'] ?>"><i class="fa fa-eye"></i></button>
                                        </td>
                                    <?php
                                        echo "</tr>";
                                        $x++;
                                    } ?>
                                    <!-- </tr> -->


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <br>
    <footer class="py-4 bg-light mt-auto card-footer">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy;2020 Developed By Chaitanya Allam, SO/E, Inst-P, <a href="mailto:chaitanya@man.hwb.gov.in" style="font-size:0.8rem">Email:chaitanya@man.hwb.gov.in</a></div>
            </div>
        </div>
    </footer>
</div>


<!-- Add Modal         -->



<div id="myModaladd" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  2-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add New</h4>
            </div>
            <div class="modal-body">
                <!-- <p>Some text in the modal 1.</p> -->


                <form id="add_form" name="Form_add" action="" method="GET" role="form">


                    <div class="form-group">
                        <label>Phone number<font color="red">*</font></label>
                        <input class="form-control" placeholder="Enter IC Number" maxlength="11" name="pno" required=required>
                    </div>

                    <div class="form-group">
                        <label>No. of Parallel Phones</label>
                        <input class="form-control" placeholder="Enter no. of Parallel Phones" name="parallel_pno">
                    </div>

                    <div class="form-group">
                        <label>No. of Caller Id Phones</label>
                        <input class="form-control" placeholder="Enter no. of Caller Id phones" name="callerid_phone">
                    </div>

                    <div class="form-group">
                        <label>No. of Wireless Phones</label>
                        <input class="form-control" placeholder="Enter no. of Parallel Phones" name="wireless_phone">
                    </div>

                    <div class="form-group">
                        <label>No. of Zero-dialling Phones</label>
                        <input class="form-control" placeholder="Enter no. of Parallel Phones" name="zero_dialing">
                    </div>

                    <div class="form-group">
                        <label>JB Details</label>
                        <input class="form-control" placeholder="Enter jb details" name="jbdetails">
                    </div>

                    <div>
                        <label>IC No.</label>
                        <input class="form-control" placeholder="Enter the assigned ic no" name="icno">
                    </div>

                    <div class="form-group">
                        <label>Section</label>
                        <select class="form-control" placeholder="Enter Section Name" name="section">
                            <?php
                            $query = $conn->query("SELECT * FROM `section_master`");
                            $len = 0;
                            $len = $query->num_rows;
                            if ($len != 0) {
                                while ($row = $query->fetch_assoc()) {
                                    echo "<option>" . $row['section'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" name="bntUpdate" value="addphone" id="addphone">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- View Modal -->

<div id="myModalview" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  1-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Details</h4>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="ajax-loader.gif">
                </div>

                <!-- mysql data will be load here -->
                <div id="dynamic-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Complaint View Modal -->

<div id="Complaint_Modal" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  1-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Complaint Details</h4>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="ajax-loader.gif">
                </div>

                <!-- mysql data will be load here -->
                <div id="dynamiic-content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- For UPdate -->
<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  2-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update</h4>
            </div>

            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="ajax-loader.gif">
                </div>

                <!-- mysql data will be load here -->
                <div id="dynamicc-content"></div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary" name="bntUpdate" value="update" id="update">Update</button>
                <button class="btn btn-primary" name="bntCancel" value="delete">Delete</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<?php include "footer.php" ?>


<!-- Update -->

<script>
    $(document).ready(function() {

        $(document).on('click', '#updatedetails', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamicc-content').html(''); // leave this div blank
            $('#modal-loader').show(); // load ajax loader on button click

            $.ajax({
                    url: 'complaint_update.php',
                    type: 'POST',
                    data: 'id=' + uid,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamicc-content').html(''); // blank before load.
                    $('#dynamicc-content').html(data); // load here
                    $('#modal-loader').hide(); // hide loader  
                })
                .fail(function() {
                    $('#dynamicc-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });

        });
    });
</script>



<!-- For View -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamic-content').html(''); // leave this div blank
            $('#modal-loader').show(); // load ajax loader on button click

            $.ajax({
                    url: 'phoneuser.php',
                    type: 'POST',
                    data: 'id=' + uid,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamic-content').html(''); // blank before load.
                    $('#dynamic-content').html(data); // load here
                    $('#modal-loader').hide(); // hide loader  
                })
                .fail(function() {
                    $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    $('#modal-loader').hide();
                });

        });
    });
</script>


<!-- For Complaint View -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#viewComplaint', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamiic-content').html(''); // leave this div blank
            // $('#modal-loader').show(); // load ajax loader on button click

            $.ajax({
                    url: 'complaintview.php',
                    type: 'POST',
                    data: 'id=' + uid,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamiic-content').html(''); // blank before load.
                    $('#dynamiic-content').html(data); // load here
                    // $('#modal-loader').hide(); // hide loader  
                })
                .fail(function() {
                    $('#dynamiic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    // $('#modal-loader').hide();
                });

        });
    });
</script>



<!-- For Add -->
<script>
    $("#addphone").click(function() {
        $.ajax({
            url: 'addphone.php',
            method: 'GET',
            data: $("#add_form").serialize(),
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



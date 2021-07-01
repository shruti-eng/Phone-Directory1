<?php
//Use this page as template for all the other pages linked in the app through hyper links
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <!-- <h1 class="mt-4">Overall MTA Work Status (<span id=prog></span> Complete)&nbsp&nbsp<i class="fa fa-chart-line" aria-hidden="true" onclick="window.open('overallprogress.php','Job Progress', 'width=750, height=500');" style="cursor:pointer;"></i></h1> -->
            <h1 class="mt-4">Telephone Directory </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">HWP(M)</li>
            </ol>
            <div class="row">
                <div class="col-xl col-md-4">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h5>Emergency</h5>
                        </div>

                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="mech.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl col-md-4">
                    <div class="card bg-elec text-white mb-4">
                        <div class="card-body">
                            <h5>Managers</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="managers.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h5>Main Plant</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="mp.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h5>CPP</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="cpp.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h5>Colony</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="colony.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h5>CISF</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inst.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">
                            <h5>Admin</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inst.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body">
                            <h5>All</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>


            </div>


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
                                        <th>IC No.</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Section</th>
                                        <th>Office</th>
                                        <th>Res</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $query = $conn->query("SELECT * FROM `employee`");
                                    if (!$query) die($conn->error);
                                    $x = 0;
                                    while ($row = $query->fetch_assoc()) {
                                        echo "<tr>";
                                    ?>
                                        <!-- <td><?php #echo $row['eno'] 
                                                    ?></td> -->
                                        <td><?php echo $row['icno'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['designation'] ?></td>
                                        <td><?php echo $row['section'] ?></td>
                                        <td>
                                            <?php
                                            $_GET['icno'] = $row['icno'];

                                            include "get_off_phone.php";

                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            $_GET['icno'] = $row['icno'];

                                            include "get_res_phone.php"; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalview" id="getUser" data-id="<?php echo $row['icno'] ?>"><i class="fa fa-eye"></i></button>
                                            <?php if (isset($_SESSION['un']) && !empty($_SESSION['un']) && isset($_SESSION['pw']) && !empty($_SESSION['pw'])) {
                                            ?>


                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2" id="updatedetails" data-id="<?php echo $row['icno'] ?>"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger"   id="remove" data-id="<?php echo $row['icno'] ?>"><i class="fa fa-window-close" ></i></button>

                                            <?php } ?>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalcomplaint" id="complaintreg" data-id="<?php echo $row['pno'] ?>">Raise complaint</button>

                                        </td>
                                    <?php
                                        echo "</tr>";
                                        $x++;
                                    } ?>
                                    </tr>


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
                    <!-- <img src="ajax-loader.gif"> -->
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

<!-- Complaint -->


<div id="myModalcomplaint" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  2-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Register a Complaint</h4>
            </div>
            <div class="modal-body">
                <!-- <p>Some text in the modal 1.</p> -->

                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader
                    <img src="ajax-loader.gif"> -->
                </div>

                <!-- mysql data will be load here -->
                <div id="dynamiccc-content"></div>



            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" name="bntUpdate" value="complaint" id="complaint">Register</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>





<!-- Update Modal -->

<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog .modal-dialog-centered  modal-lg ">

        <!-- Modal content  2-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update/Delete</h4>
            </div>

            <div class="modal-body">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <!-- <img src="ajax-loader.gif"> -->
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


                <form id="add_form" name="Form_add" action="" method="POST" role="form">


                    <div class="form-group">
                        <label>I/C number<font color="red">*</font></label>
                        <input class="form-control" placeholder="Enter IC Number" maxlength="11" name="icno" required=required>
                    </div>

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

                    <div class="form-group">
                        <label>Email Id</label>
                        <input class="form-control" placeholder="Enter Email Address" name="email">
                    </div>

                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input class="form-control" placeholder="Enter Mobile Number" name="mobile">
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" name="bntUpdate" value="add" id="add">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>






<?php include "footer.php" ?>

<!-- For Add -->
<script>
    $("#add").click(function() {
        $.ajax({
            url: 'add.php',
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

<!-- View -->
<script>
    $(document).ready(function() {

        $(document).on('click', '#getUser', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamic-content').html(''); // leave this div blank
            $('#modal-loader').show(); // load ajax loader on button click

            $.ajax({
                    url: 'getuser.php',
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


<!-- Update -->

<script>
    $(document).ready(function() {

        $(document).on('click', '#updatedetails', function(e) {
            e.preventDefault();
            var uid = $(this).data('id'); 
            $('#dynamicc-content').html(''); 
            $('#modal-loader').show(); 

            $.ajax({
                    url: 'updatedetails.php',
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


<!-- Complaint -->

<script>
    $(document).ready(function() {

        $(document).on('click', '#complaintreg', function(e) {

            e.preventDefault();

            var uid = $(this).data('id'); // get id of clicked row

            $('#dynamiccc-content').html(''); // leave this div blank
            //  $('#modal-loader').show();      // load ajax loader on button click

            $.ajax({
                    url: 'complaint.php',
                    type: 'POST',
                    data: 'id=' + uid,
                    dataType: 'html'
                })
                .done(function(data) {
                    console.log(data);
                    $('#dynamiccc-content').html(''); // blank before load.
                    $('#dynamiccc-content').html(data); // load here
                    //   $('#modal-loader').hide(); // hide loader  
                })
                .fail(function() {
                    $('#dynamiccc-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                    //   $('#modal-loader').hide();
                });

        });
    });
</script>

<!-- For Delete -->

<script>
    $("#remove").click(function() {
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
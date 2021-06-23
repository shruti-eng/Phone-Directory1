<?php 
//Use this page as template for all the other pages linked in the app through hyper links
?>

<?php include "config.php";
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
                        <div class="card-body"><h5>Main Plant</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="mp.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>  
                <div class="col-xl col-md-4">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body"><h5>CPP</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="cpp.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>  
                <div class="col-xl col-md-4">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><h5>Colony</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="colony.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>      
                <div class="col-xl col-md-4">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><h5>CISF</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inst.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>    
                <div class="col-xl col-md-4">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><h5>Admin</h5>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="inst.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body"><h5>All</h5>
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

          <!-- Trigger the modal with a button  1 -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModaladd">Add New </button><br><br>


            
                <div class="card-header"><i class="fas fa-table mr-1"></i>All Contacts</div>
                <div class="card-body">

                
                    <div class="table-responsive table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Emp.No</th>
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
                                <?php $query = $conn->query("SELECT * FROM `master`");
                                if (!$query) die($conn->error);
                                $x = 0;
                                while ($row = $query->fetch_assoc()) {
                                    echo"<tr>";
                                    ?>
                                    <td><?php echo $row['eno']?></td>
                                    <td><?php echo $row['icno']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['desig']?></td>
                                    <td><?php echo $row['section']?></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal1"><i class="fa fa-eye"></i></button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal2"><i class="fa fa-edit"></i></button>
                                    
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
</div>






                       
                        

                       

                        

<div id="myModal1" class="modal fade" role="dialog">
            <div class="modal-dialog .modal-dialog-centered  modal-lg ">

              <!-- Modal content  1-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <!-- <p>Some text in the modal 1.</p> -->


                  <form name="Form1" action="" method="POST" role="form"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">


                    <div class="form-group">
                      <label>I/C number<font color="red">*</font></label>
                      <input class="form-control" placeholder="Enter Contact Number" maxlength="11" name="icno" required=required>
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
                      <input class="form-control" placeholder="Enter Section Name" name="section">
                    </div>

                   
                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" placeholder="abcd@gmail.com" name="email">
                    </div>

                    <div>
                      <input type="radio" name="radio_group" value="home" />&nbsp Home
                      &nbsp &nbsp &nbsp
                      <input type="radio" name="radio_group" value="office" />&nbsp Office

                    </div>

                    <br><br>

                    <button type="submit" class="btn btn-primary" name="bntSave">Save</button>

                  </form>

                  
                </div>
                <div class="modal-footer">
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
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <!-- <p>Some text in the modal 1.</p> -->


                  <form name="Form1" action="" method="POST" role="form">


                    <div class="form-group">
                      <label>I/C number<font color="red">*</font></label>
                      <input class="form-control" placeholder="Enter Contact Number" maxlength="11" name="icno" required=required>
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
                      <input class="form-control" placeholder="Enter Section Name" name="section">
                    </div>

                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" placeholder="abcd@gmail.com" name="email">
                    </div>

                    <div>
                      <input type="radio" name="radio_group" value="home" />&nbsp Home
                      &nbsp &nbsp &nbsp
                      <input type="radio" name="radio_group" value="office" />&nbsp Office

                    </div>

                    <br><br>

                    <button type="submit" class="btn btn-primary" name="bntUpdate" value="update">Update</button>
                    <button type="submit" class="btn btn-primary" name="bntCancel" value="delete">Delete</button>
                    

                  </form>


                </div>
                <div class="modal-footer">
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


                  <form name="Form1" action="" method="POST" role="form">


                    <div class="form-group">
                      <label>I/C number<font color="red">*</font></label>
                      <input class="form-control" placeholder="Enter Contact Number" maxlength="11" name="icno" required=required>
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
                      <input class="form-control" placeholder="Enter Section Name" name="section">
                    </div>

                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" placeholder="abcd@gmail.com" name="email">
                    </div>

                    <div>
                      <input type="radio" name="radio_group" value="home" />&nbsp Home
                      &nbsp &nbsp &nbsp
                      <input type="radio" name="radio_group" value="office" />&nbsp Office

                    </div>

                    <br><br>

                    <button type="submit" class="btn btn-primary" name="bntUpdate" value="add">Add</button>


                    <?php

                        if(isset($_POST['add']))
                        {
                            $name = $_POST['name'];
                            $icno = $_POST['icno'];
                            $desig = $_POST['desig'];
                            $section = $_POST['desig'];

                            $result = mysqli_query($connection, "INSERT into `master` values('',$icno , $name, $desig, '' , '', '', $section)");
                    
                        }

                        
                        ?>
                            

                  </form>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>    
          
                  




<?php include "footer.php" ?>




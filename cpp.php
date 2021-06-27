<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">CPP</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <?php if (isset($_GET['act'])) { ?>
          <li class="breadcrumb-item"><a href="mech.php">CPP</a></li>
          <li class="breadcrumb-item active">
          <?php
          $query = $conn->query("SELECT * FROM `main_act` where `eno`='" . $_GET['act'] . "'");
          if (!$query) die($conn->error);
          while ($row = $query->fetch_assoc()) {
            echo $row['act_name'];
          }
        } else echo "<li class='breadcrumb-item active'>Main Plant</a></li>";
          ?>
      </ol>


     
        
        <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Contacts - CPP</div>
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
                                    echo"<tr>";
                                    ?>
                                    <!-- <td><?php //echo $row['eno']?></td> -->
                                    <td><?php echo $row['icno']?></td>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['designation']?></td>
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







      </div>
    </div>
  </main>
  <br>
  <footer class="py-4 bg-light mt-auto">
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
                  <h4 class="modal-title">View</h4>
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
                  <h4 class="modal-title">Update/Delete</h4>
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
                    <button type="submit" class="btn btn-primary" name="bntDelete" value="delete">Delete</button>
                    

                  </form>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>          

          
<?php include "footer.php" ?>



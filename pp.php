<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Main Plant - Production Process</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <?php if (isset($_GET['act'])) { ?>
          <li class="breadcrumb-item"><a href="pp.php">Production Process</a></li>
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
                <div class="card-header"><i class="fas fa-table mr-1"></i>Contacts -Production Process</div>
                <div class="card-body">
                    <div class="table-responsive table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                  
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
                                <?php $query = $conn->query("SELECT * FROM `employee` WHERE `cat1`='34' or `cat2`='34' or `cat3` = '34'");
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
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModalview" id="getUser" data-id="<?php echo $row['icno'] ?>"><i class="fa fa-eye"></i></button>
                                   
                                    
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


<?php include "footer.php" ?>

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

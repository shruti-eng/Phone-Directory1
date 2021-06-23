<!DOCTYPE html>
<html lang="en">
<?php include "header.php";
?>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">All Contacts</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <?php if (isset($_GET['act'])) { ?>
          <li class="breadcrumb-item"><a href="mech.php">View All</a></li>
          <li class="breadcrumb-item active">
          <?php
          $query = $conn->query("SELECT * FROM `main_act` where `eno`='" . $_GET['act'] . "'");
          if (!$query) die($conn->error);
          while ($row = $query->fetch_assoc()) {
            echo $row['act_name'];
          }
        } else echo "<li class='breadcrumb-item active'>Mehcanical-Process</a></li>";
          ?>
      </ol>


      <div class="card mb-4">
        <div class="card-header">

          <!-- Trigger the modal with a button  1 -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Add New </button>

          <!-- Modal 1-->
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


                  <form name="Form1" action="" method="POST" role="form">


                    <div class="form-group">
                      <label>I/C number<font color="red">*</font></label>
                      <input class="form-control" placeholder="Enter Contact Number" maxlength="11" name="txtICNo" required=required>
                    </div>

                    <div class="form-group">
                      <label>Employee Name<font color="red">*</font></label>
                      <input class="form-control" placeholder="Enter Name" name="txtFName" required=required>
                    </div>

                    <div class="form-group">
                      <label>Section</label>
                      <input class="form-control" placeholder="Enter Section Name" name="txtSecName">
                    </div>

                    <div class="form-group">
                      <label>Designation</label>
                      <input class="form-control" placeholder="Enter Designation" name="txtDesignation">
                    </div>

                    <div class="form-group">
                      <label>Email Address</label>
                      <input type="email" class="form-control" placeholder="abcd@gmail.com" name="txtEmailAddress">
                    </div>

                    <div>
                      <input type="radio" value="radio_group" name="home" />&nbsp Home
                      &nbsp &nbsp &nbsp
                      <input type="radio" value="radio_group" name="office" />&nbsp Office

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


          <!-- Trigger the modal with a button  2 -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Update </button>

          <!-- Modal 2-->
          <div id="myModal2" class="modal fade" role="dialog">
            <div class="modal-dialog .modal-dialog-centered  modal-lg ">

              <!-- Modal content  2-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal 2.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>


          <!-- Trigger the modal with a button  3 -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal3">Delete </button>

          <!-- Modal 3 -->
          <div id="myModal3" class="modal fade" role="dialog">
            <div class="modal-dialog .modal-dialog-centered  modal-lg ">

              <!-- Modal content 3-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                  <p>Some text in the modal 3.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- <a class="btn btn-primary" data-toggle="collapse" href="#logchartdiv" role="button" aria-expanded="false" aria-controls="collapseExample" style="float:right;">
    Add
	  </a>



    <a class="btn btn-primary" data-toggle="collapse" href="#logchartdiv" role="button" aria-expanded="false" aria-controls="collapseExample" style="float:right;">
    Add
	  </a> -->



          <div class="collapse" id="logchartdiv" width="50%">
            <canvas id="logchart" width="50%" height="15"></canvas>
          </div>


        </div>
        <div class="card-body">


          <div class="table-hover">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Activity</th>
                  <th>Section Weightage</th>
                  <th>Exctuted Qty in %</th>
                  <th>Contribution to overall Section Job completion%</th>
                </tr>
              </thead>
              <tbody>
                <?php $query = $conn->query("SELECT * FROM `main_act` WHERE `section`='mech-p'");
                if (!$query) die($conn->error);
                $i = 1;
                while ($row = $query->fetch_assoc()) {
                  echo "<tr class='active'>";
                  echo "<td>" . $i . "</td>";
                  $i++;
                  echo "<td><a href=\"mech-act.php?act=" . $row['eno'] . "\">" . $row['act_name'] . "</td>";
                  echo "<td>" . $row['section_weight'] . "</td>";
                  $query2 = $conn->query("SELECT * FROM `sub_act` WHERE `main_act`='" . $row['eno'] . "'");
                  //echo "SELECT * FROM `sub_act` WHERE `main_act`='".$row['eno']."'";
                  if (!$query2) die($conn->error);
                  $temp = 0;
                  while ($row2 = $query2->fetch_assoc()) {
                    $temp = $temp + ($row2['qty_exec'] * $row2['weight'] / $row2['qty_plan']);
                  }
                  echo "<td>" . round($temp, 2) . "</td>";
                  echo "<td>" . round(($temp / 100 * $row['section_weight']), 2) . "</td>";
                  echo "</tr>";
                } ?>


              </tbody>
            </table>
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
<?php include "footer.php" ?>


<script src="assets/demo/datatables-demo.js"></script>
<script>
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  var ctx = document.getElementById("logchart");
  var logchart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [

        <?php $query = $conn->query("SELECT * FROM `sec_act_log` WHERE `section`='mech-p'");
        if (!$query) die($conn->error);
        while ($row = $query->fetch_assoc()) {
          echo "\"" . date("d-m-y", strtotime($row['date'])) . "\", ";
        }
        ?>

      ],
      datasets: [{
        label: "Completion in %",
        data: [<?php $query = $conn->query("SELECT * FROM `sec_act_log` WHERE `section`='mech-p'");
                if (!$query) die($conn->error);
                while ($row = $query->fetch_assoc()) {
                  echo $row['qty'] . ", ";
                } ?>],
        backgroundColor: '#007bff',
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'Date'
          },
          gridLines: {
            display: false
          },
          ticks: {
            maxTicksLimit: 6
          }
        }],
        yAxes: [{
          ticks: {
            min: 0,
            maxTicksLimit: 5
          },
          gridLines: {
            display: true,
          }
        }],
      },
      tooltips: {
        mode: 'index',
        intersect: false
      },
      hover: {
        mode: 'index',
        intersect: false
      },
      legend: {
        display: true,
      }
    }
  });
</script>
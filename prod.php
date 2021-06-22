<!DOCTYPE html>
<html lang="en">
    <?php include"header.php";
    ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Production Process Status</h1>
                        <ol class="breadcrumb mb-4">
						<li class="breadcrumb-item"><a href="index.php">Overall Status</a></li>
                            <?php if(isset($_GET['act'])){?>
							<li class="breadcrumb-item"><a href="prod.php">Production Process</a></li>
							<li class="breadcrumb-item active">
							 <?php
                                    $query=$conn->query("SELECT * FROM `main_act` where `eno`='".$_GET['act']."'");
                                    if (!$query) die($conn->error);
                                    while($row = $query->fetch_assoc())
                                    {
							echo $row['act_name'];}
							
							}
							else echo "<li class='breadcrumb-item active'>Production Process</a></li>";
							?>
                        </ol>
                        
                        <div class="row">
                           <!-- <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Sub Activity Weightage %</div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Subactivities weightage and Progress in %</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>-->
                        </div>
                       <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Sectional Activites Status Table<a class="btn btn-primary" data-toggle="collapse" href="#logchartdiv" role="button" aria-expanded="false" aria-controls="collapseExample" style="float:right;">
    Show Progress
	  </a>
	   
       <div class="collapse" id="logchartdiv" width="50%">
  <canvas id="logchart" width="50%" height="15"></canvas>
</div></div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
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
										 <?php $query=$conn->query("SELECT * FROM `main_act` WHERE `section`='prod-p'");
											if (!$query) die($conn->error);
											$i=1;
											while($row = $query->fetch_assoc())
											{
												echo "<tr>";
												echo "<td>".$i."</td>";
												$i++;
												echo"<td> <a href=\"prod-act.php?act=".$row['eno']."\">".$row['act_name']."</td>";
												echo"<td>".$row['section_weight']."</td>";
												$query2=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$row['eno']."'");
												//echo "SELECT * FROM `sub_act` WHERE `main_act`='".$row['eno']."'";
												if(!$query2) die($conn->error);
												$temp=0;
												while ($row2=$query2->fetch_assoc()){
													$temp=$temp+($row2['qty_exec']*$row2['weight']/$row2['qty_plan']);
												}
												echo"<td>".round($temp,2)."</td>";
												echo"<td>".round(($temp/100*$row['section_weight']),2)."</td>";
												echo "</tr>";
											}?>
                                           
                                           
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
                            <div class="text-muted">Copyright &copy;2020 Developed By Chaitanya Allam, SO/E, Inst-P</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       <?php include "footer.php"?>
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
var ctx = document.getElementById("logchart");
var logchart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [			
			
			<?php $query=$conn->query("SELECT * FROM `sec_act_log` WHERE `section`='prod-p'");
                                    if (!$query) die($conn->error);
									while($row=$query->fetch_assoc()){
										echo "\"".date("d-m-y", strtotime($row['date']))."\", ";
									}
	?>
		
			],
    datasets: [{
      label: "Completion in %",
      data: [<?php $query=$conn->query("SELECT * FROM `sec_act_log` WHERE `section`='prod-p'");
                                    if (!$query) die($conn->error);
									while($row=$query->fetch_assoc()){
										echo $row['qty'].", ";
									}?>],
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

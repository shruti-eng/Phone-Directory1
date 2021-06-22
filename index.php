<!DOCTYPE html>
<html lang="en">
    <?php include"header.php";
    ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Overall MTA Work Status (<span id=prog></span> Complete)&nbsp&nbsp<i class="fa fa-chart-line" aria-hidden="true" onclick="window.open('overallprogress.php','Job Progress', 'width=750, height=500');" style="cursor:pointer;"></i></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Overall Status</li>
                        </ol>
                        <div class="row"> 
                            <div class="col-xl col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Mechanical-Process<h3 id="mech-prog"></h3></div>
                                   
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="mech.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl col-md-6">
                                <div class="card bg-elec text-white mb-4">
                                    <div class="card-body">Electrical-Process<h3 id="elec-prog"></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="elec.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							                            <div class="col-xl col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Inst-Process<h3 id="inst-prog"></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="inst.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							<div class="col-xl col-md-6">
                                <div class="card bg-isi text-white mb-4">
                                    <div class="card-body">ISI<h3 id="isi-prog"></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="isi.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-md-6">
                                <div class="card bg-proc text-white mb-4">
                                    <div class="card-body">Production-Process<h3 id="prod-prog"></h3></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="prod.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                                                        

                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Sectional Job quantum in %</div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Sectional and Overall Job Progress in %</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                        </div>
                       <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Overall Status Table</div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Section</th>
                                                <th>Sectional Weightage%</th>
                                                <th>Sectional Job Completion%</th>
                                                <th>Overall Job Completion%</th>
                                            </tr>
                                        </thead>

                                        <tbody>
										 <?php $query=$conn->query("SELECT * FROM `gm`");
											if (!$query) die($conn->error);
											$x=0;
											while($row = $query->fetch_assoc())
											{
												echo "<tr>";
												echo"<td>";
												if($row['section']=="mech-p")
												echo "<a href='mech.php'>Mechanical-Process</a>";
											    else if($row['section']=="elec-p")
												echo "<a href='elec.php'>Electrical-Process</a>";
												else if($row['section']=="inst-p")
												echo "<a href='inst.php'>Instrumentation-Process</a>";
												else if($row['section']=="isi")
												echo "<a href='isi.php'> ISI</a>";
												else if($row['section']=="prod-p")
												echo "<a href='prod.php'>Production-Process</td>";
												echo"</td>";
												echo"<td>".$row['weight']."</td>";
												$query3=$conn->query("SELECT * FROM `main_act` WHERE section='".$row['section']."'");
												if (!$query3) die($conn->error);
												$temp2=0;
												while($row3 = $query3->fetch_assoc())
												{
													$query2=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$row3['eno']."'");
												//echo "SELECT * FROM `sub_act` WHERE `main_act`='".$row['eno']."'";
													if(!$query2) die($conn->error);
													$temp=0;
													while ($row2=$query2->fetch_assoc()){
													$temp=$temp+($row2['qty_exec']*$row2['weight']/$row2['qty_plan']);
													}
													$temp2=$temp2+round(($temp/100*$row3['section_weight']),2);
												}
												echo"<td>".round($temp2,2)."</td>";
												echo"<td>".round($temp2*$row['weight']/100,2)."</td>";
												$sec[]=round($temp2,2);
												$overall[]=round($temp2*$row['weight']/100,2);
												$x++;
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
                <footer class="py-4 bg-light mt-auto card-footer">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;2020 Developed By Chaitanya Allam, SO/E, Inst-P, <a href="mailto:chaitanya@man.hwb.gov.in" style="font-size:0.8rem">Email:chaitanya@man.hwb.gov.in</a></div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
       <?php include "footer.php"?>
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Mech-P", "Elec-P", "Inst-P", "ISI", "Prod-P"],
    datasets: [{data: [ 
    <?php $query=$conn->query("SELECT * FROM `gm`");
                                    if (!$query) die($conn->error);
    while($row = $query->fetch_assoc())
                                    {
        echo $row['weight'].", ";}
      ?>],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#777'],
    }],
  },
});
var ctx = document.getElementById("myBarChart");
var myPieChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Mech-P", "Elec-P", "Inst-P", "ISI", "Prod-P"],
    datasets: [{
		label: 'Overall Completed in %',
		data: [ <?php foreach($overall as $item){
		 echo $item.", ";
		}?>
	
    ],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#777'],
    },
	{
		label: 'Sectional job %',
		data: [ 
    <?php foreach($sec as $item){
	echo $item.", ";}
      ?>],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#777'],
    }
	],
	},
	options:     {legend: {
      display: false
    }},
});
$("#mech-prog").html('<?php echo $sec[0];?>%');
$("#elec-prog").html('<?php echo $sec[1];?>%');
$("#inst-prog").html('<?php echo $sec[2];?>%');
$("#isi-prog").html('<?php echo $sec[3];?>%');
$("#prod-prog").html('<?php echo $sec[4];?>%');
$("#prog").html('<?php echo $overall[0]+$overall[1]+$overall[2]+$overall[3]+$overall[4]."%";?>')
</script>

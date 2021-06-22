    <?php
	include"header.php";
	?>
<!DOCTYPE html>
<html lang="en">

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">In-Sevice Inspection Status</h1>
                        <ol class="breadcrumb mb-4">
						<li class="breadcrumb-item"><a href="index.php">Overall Status</a></li>
                            <?php if(isset($_GET['act'])){?>
							<li class="breadcrumb-item"><a href="isi.php">In-Sevice Inspection-Process</a></li>
							<li class="breadcrumb-item active">
							 <?php
                                    $query=$conn->query("SELECT * FROM `main_act` where `eno`='".$_GET['act']."'");
                                    if (!$query) die($conn->error);
                                    while($row = $query->fetch_assoc())
                                    {
							echo $row['act_name'];}
							
							}
							else echo "<li class='breadcrumb-item active'>In-Sevice Inspection-Process</a></li>";
							?>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
							<i class="fas fa-table mr-1"></i>Activity Status Table
							<div class="btn-group" style="float:right;">
							<?php if(isset($_SESSION['section'])){if($_SESSION['section']=='isi'){?><button style="float:right;" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#form-modal">Update</button><?php }}?>
							<a class="btn btn-outline-secondary btn-sm" data-toggle="collapse" href="#logchartdiv" role="button" aria-expanded="false" aria-controls="collapseExample" style="float:right;">
							Show Progress
							</a>
							</div>
							<?php $query=$conn->query("SELECT * FROM `main_act_log` WHERE `main_act_no`='".$_GET['act']."'ORDER BY `eno` DESC");
				if (!$query) die($conn->error);
				while($row=$query->fetch_assoc()){
				echo "<div class='small'>Last Update at: ".date("d-m-Y g:i:sA",strtotime($row['time']))." By ".$row['name']."</div>";
				break;}?>
				</div>
	   
       <div class="collapse" id="logchartdiv" width="50%">
  <canvas id="logchart" width="50%" height="15"></canvas>
</div>
                            <div class="card-body">
                                <div class="table-responsive table-hover">
                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Sub Activity</th>
                                                <th>Weightage%</th>
                                                <th>Planned Qty</th>
                                                <th>Executed Qty</th>
                                            </tr>
                                        </thead>

                                        <tbody>
										 <?php $query=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
											if (!$query) die($conn->error);
											$i=1;
											while($row = $query->fetch_assoc())
											{
												echo "<tr>";
												echo "<td>".$i."</td>";
												$i++;
												echo"<td>".$row['act_name']."</td>";
												echo"<td>".$row['weight']."</td>";
												echo"<td>".$row['qty_plan']."</td>";
												echo"<td>".$row['qty_exec']."&nbsp&nbsp<i class=\"fa fa-chart-line\" aria-hidden=\"true\" onclick=\"progress_show('".$row['eno']."')\" style=\"cursor:pointer;\"></i></a></td>";
												echo "</tr>";
											}?>
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           <!-- <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-pie mr-1"></i>Sub Activity Weightage %</div>
                                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                                    
                                </div>
                            </div>-->
                            <div class="col-xl-12">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Subactivities weightage and Progress in %</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
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
		
       <?php include "footer.php"?>
	   <div class="modal fade" id="form-modal" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content" style="float:right;">
		<div class="modal-header"><button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><h4 class="modal-title" id="myModalLabel">Update</h4>
		</div>
		<div class="modal-body">
		<div class="table-responsive table-hover">
		<form id="table">
                                     <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
												<th>Sub Activity</th>
                                                <th>Weightage%</th>
                                                <th>Planned Qty</th>
                                                <th>Up to Date Qty</th>
												<th>Updated Qty</th>
                                            </tr>
                                        </thead>

                                        <tbody>
										 <?php $query=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
											if (!$query) die($conn->error);
											$i=1;
											while($row = $query->fetch_assoc())
											{
												echo "<tr>";
												echo "<td>".$i."</td>";
												$i++;
												echo"<td>".$row['act_name']."</td>";
												echo"<td>".$row['weight']."</td>";
												echo"<td>".$row['qty_plan']."</td>";
												echo"<td>".$row['qty_exec']."</td>";
												echo"<td><input type='text' name='sub_act-".$row['eno']."'></input></td>";
												echo "</tr>";
											}?>
                                           
                                           
                                        </tbody>
                                    </table></form>
		
        </div>
		<div class="modal-footer">
		<button class="btn btn-primary" id="save">Save</button>
		</div>
		
		</div>
		</div>
		</div>
		</div>
		<div class="modal fade" id="success" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="dialog">
		<div class="modal-content" style="float:right;">
		<div class="modal-header"><h4 class="modal-title" id="myModalLabel1">Data Saved Successfully</h4>
		</div>
		<div class="modal-footer">
		<button class="btn btn-primary" id="close">Close</button>
		</div>
		</div>
		
		</div>
		</div>
		<div class="modal fade" id="fail" tabIndex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="dialog">
		<div class="modal-content" style="float:right;">
		<div class="modal-header"><h4 class="modal-title" id="myModalLabel2">Data Saving Failed</h4>
		</div>
		<div class="modal-footer">
		<button class="btn btn-primary" id="close2">Close</button>
		</div>
		</div>
		</div>
		</div>
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
//Chart.defaults.global.scaleStartValue = 0;

// Pie Chart Example
/*var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["isi", "isi", "isi", "ISI", "Prod-P"],
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
});*/
var ctx = document.getElementById("myBarChart");
var myPieChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [
	<?php $query=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
                                    if (!$query) die($conn->error);
									while($row=$query->fetch_assoc()){
										echo "\"".$row['act_name']."\", ";
									}
	?>
	
	],
    datasets: [{
		label: 'Weightage %',
		data: [ 
	
    <?php
	$query=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
    if (!$query) die($conn->error);
    while($row = $query->fetch_assoc())
                                    {
        echo $row['weight'].", ";}
      ?>],
      backgroundColor: '#007bff'
    },
	{
		label: 'Completed Weightage%',
		data: [ 
	
    <?php $query=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
    if (!$query) die($conn->error);
    while($row = $query->fetch_assoc())
                                    {
                                      echo $row['qty_exec']*$row['weight']/$row['qty_plan'].", ";}
      ?>],
      backgroundColor: '#28a745',
    }
	],
	},
	options:     {
		
		scaleBeginAtZero: true,
		legend: {
			display: true
				},
	scales: {         
			xAxes: [
					{
					ticks: {
					callback: function(label) {
					if (/\s/.test(label)) {
					return label.split(" ");
					}else{
					return label;
					}              
					}		
					},
	        barPercentage:0.5,
					}		
					],
			yAxes: [
					{
					ticks: {
						beginAtZero :true,
					}}],
			
			},
			
	},
	
});
</script>
<script type="text/javascript">
$("#save").click(function(){
	$.ajax({
        type:"GET",
        url: 'save.php?act=<?php echo $_GET['act'];?>&sec=isi',
        data: $("#table").serialize(),
        success: function(response){
            console.log(response); 
            $f1=response;
			if(response=="success"){
		   $("#form-modal").modal('toggle');
		   $("#success").modal('toggle');
           $("#save").trigger("reset");
            }
			else
		$("#fail").modal('toggle');}
    });
});
$("#close").click(function(){
	location.reload();
});
$("#close2").click(function(){
	location.reload();
});
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';
var ctx = document.getElementById("logchart");
var logchart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [			
			
			<?php $query=$conn->query("SELECT * FROM `main_act_log` WHERE `main_act_no`='".$_GET['act']."'");
                                    if (!$query) die($conn->error);
									while($row=$query->fetch_assoc()){
										echo "\"".date("d-m-y", strtotime($row['date']))."\", ";
									}
	?>
		
			],
    datasets: [{
      label: "Completion in %",
      data: [<?php $query=$conn->query("SELECT * FROM `main_act_log` WHERE `main_act_no`='".$_GET['act']."'");
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
function progress_show(eno){
           myWindow=window.open("subact_progress.php?eno="+eno,"Job Progress", "width=750, height=650");
		  // myWindow.resizeTo(751, 650); 
		   myWindow.moveTo(0, 0); 
		   //myWindow.resizeTo(750, 600);                             // Resizes the new window
  		   myWindow.focus();          
        }
</script>

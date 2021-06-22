<style>
    @media print {
   .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
   }
   .col-sm-12 {
        width: 100%;
   }
   .col-sm-11 {
        width: 91.66666667%;
   }
   .col-sm-10 {
        width: 83.33333333%;
   }
   .col-sm-9 {
        width: 75%;
   }
   .col-sm-8 {
        width: 66.66666667%;
   }
   .col-sm-7 {
        width: 58.33333333%;
   }
   .col-sm-6 {
        width: 50%;
   }
   .col-sm-5 {
        width: 41.66666667%;
   }
   .col-sm-4 {
        width: 33.33333333%;
   }
   .col-sm-3 {
        width: 25%;
   }
   .col-sm-2 {
        width: 16.66666667%;
   }
   .col-sm-1 {
        width: 8.33333333%;
   }
}
    </style>
<?php
if(isset($_SESSION['app'])){
if($_SESSION['app']!="mta")
session_unset();}
else session_unset();
$db="mta20";
$hn="127.0.0.1";
$un="root";
$pw="";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HWPM MTA-20 Status</title>
	<link rel = "icon" href = "logo.png" type = "image/x-icon"> 
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="js/all.min.js" crossorigin="anonymous"></script>
</head>
<div class="card mb-4">
<center>
    <h1>MTA-20 Activity Status</h1>
</center>    

<?php echo "<h2>";
$query=$conn->query("SELECT * FROM `main_act` where `eno`='".$_GET['act']."'");
if (!$query) die($conn->error);
while($row = $query->fetch_assoc())
{
echo $row['act_name'];}
echo"</h2>";

$query=$conn->query("SELECT * FROM `main_act_log` WHERE `main_act_no`='".$_GET['act']."'ORDER BY `eno` DESC");
				if (!$query) die($conn->error);
				while($row=$query->fetch_assoc()){
				echo "<div class='small'>Last Update at: ".date("d-m-Y g:i:sA",strtotime($row['time']))." By ".$row['name']."</div>";
				break;}?>
	  <div class="collapse" id="logchartdiv" width="50%">
  <canvas id="logchart" width="50%" height="15"></canvas>
</div></div>
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
												echo"<td>".$row['qty_exec']."</td>";
												echo "</tr>";
                                            }?>
                                        </tbody>
                                     </table>
                                </div>
                            </div>
<script>
    //window.print();
</script>
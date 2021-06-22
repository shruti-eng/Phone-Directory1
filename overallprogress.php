<?php $db="mta20";
$hn="127.0.0.1";
$un="root";
$pw="";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
//$eno=$_GET['eno'];
?>		<head>
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
	<script src="js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        
</head>
    
<div class="card">
  <div class="card-header bg-primary text-white">
    <h3>Overall MTA Progress</h3>
  </div>
 
  <div class="card-body">
  <canvas id="myBarChart"></canvas>
  </div>
</div>

		

		<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [			
			
			<?php $query=$conn->query("SELECT * FROM `sec_act_log`");
                                    if (!$query) die($conn->error);
                                    $prev="";
									while($row=$query->fetch_assoc()){
                                        if($row['date']!=$prev)
                                        echo "\"".date("d-m-y", strtotime($row['date']))."\", ";
                                        $prev=$row['date'];                                        
									}
	?>
		
			],
    datasets: [{
      label: "Completion in %",
      fill: false,
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [<?php $query=$conn->query("SELECT * FROM `sec_act_log`");
                                    if (!$query) die($conn->error);
                                    $val=0;
                                    $prev="";
                                    $instp=0;
                                    $elecp=0;
                                    $mechp=0;
                                    $isi=0;
                                    $prodp=0;

									while($row=$query->fetch_assoc()){
                                        if($prev=="")
                                        $prev=$row['date'];
                                        if($row['date']!=$prev)
                                        {
                                        $val=round(($instp*0.16),2)+round(($mechp*0.7),2)+round(($elecp*0.095),2)+round(($prodp*0.01),2)+round(($isi*0.035),2);
                                        echo "\"".$val."\", ";
                                        $val=0;
                                        }
                                        if($row['section']=='isi')
                                        $isi=$row['qty']*1.0;
                                        if($row['section']=='mech-p')
                                        $mechp=$row['qty']*1.0;
                                        if($row['section']=='elec-p')
                                        $elecp=$row['qty']*1.0;
                                        if($row['section']=='inst-p')
                                        $instp=$row['qty']*1.0;
                                        if($row['section']=='prod-p')
                                        $prodp=$row['qty']*1.0;
                                        $prev=$row['date'];                                          
                                    }
                                    $val=round(($instp*0.16),2)+round(($mechp*0.7),2)+round(($elecp*0.095),2)+round(($prodp*0.01),2)+round(($isi*0.035),2);
                                    echo "\"".$val."\", ";
                                    ?>],
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
          gridLines: {
          display: true
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
      display: false
    }
  }
});
//$(document).ready(function(){location.reload();})

</script>


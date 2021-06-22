<?php
session_start();
if(!isset($_SESSION['app']))
	die('unauthorised');
if($_SESSION['app']!='mta')
	die('unauthorised');
$db="mta20";
$hn="localhost";
$un="root";
$pw="";
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
for($i=1;$i<325;$i++)
if(isset($_GET['sub_act-'.$i]))
{
	if($_GET['sub_act-'.$i]!="")
	{$query=$conn->query("UPDATE `sub_act` SET `qty_exec`='".$_GET['sub_act-'.$i]."' WHERE `eno`='".$i."'");
	if (!$query) die($conn->error);
	$query=$conn->query("SELECT * FROM `sub_act_log` WHERE `sub_act_no`='".$i."' AND `date`='".date("Y-m-d")."'");
	if($query->num_rows==0){
	$query=$conn->query("INSERT INTO `sub_act_log` (`eno`, `name`, `time`, `date`, `sub_act_no`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$i."', '".$_GET['sub_act-'.$i]."')");
	if (!$query) die($conn->error);
	//echo ("INSERT INTO `sub_act_log` (`eno`, `name`, `time`, `date`, `sub_act_no`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$i."', '".$_GET['sub_act-'.$i]."')");
	}
	else{
	$query=$conn->query("UPDATE `sub_act_log` SET `qty`='".$_GET['sub_act-'.$i]."' WHERE `sub_act_no`='".$i."' AND `date`='".date("Y-m-d")."'");
	if (!$query) die($conn->error);
	//echo ("UPDATE `sub_act_log` SET `qty`='".$_GET['sub_act-'.$i]."' WHERE `sub_act_no`='".$i."' AND `date`='".date("Y-m-d")."'");
	}	}
	
}
//Main Activity Progress Update log
$query2=$conn->query("SELECT * FROM `sub_act` WHERE `main_act`='".$_GET['act']."'");
if(!$query2) die($conn->error);
$temp=0;
while ($row2=$query2->fetch_assoc()){
$temp=$temp+($row2['qty_exec']*$row2['weight']/$row2['qty_plan']);
}
	$temp=round($temp,2);
	$query=$conn->query("SELECT * FROM `main_act_log` WHERE `main_act_no`='".$_GET['act']."' AND `date`='".date("Y-m-d")."'");
	if($query->num_rows==0){
	$query=$conn->query("INSERT INTO `main_act_log` (`eno`, `name`, `time`, `date`, `main_act_no`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$_GET['act']."', '".$temp."')");
	if (!$query) die($conn->error);
	//echo ("INSERT INTO `sub_act_log` (`eno`, `name`, `time`, `date`, `sub_act_no`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$i."', '".$_GET['sub_act-'.$i]."')");
	}
	else{
	$query=$conn->query("UPDATE `main_act_log` SET `qty`='".$temp."' WHERE `main_act_no`='".$_GET['act']."' AND `date`='".date("Y-m-d")."'");
	if (!$query) die($conn->error);
	//echo ("UPDATE `sub_act_log` SET `qty`='".$_GET['sub_act-'.$i]."' WHERE `sub_act_no`='".$i."' AND `date`='".date("Y-m-d")."'");
	}
//Sectional Progress log
$query3=$conn->query("SELECT * FROM `main_act` WHERE section='".$_GET['sec']."'");
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
$query=$conn->query("SELECT * FROM `sec_act_log` WHERE `section`='".$_GET['sec']."' AND `date`='".date("Y-m-d")."'");
	if($query->num_rows==0){
	$query=$conn->query("INSERT INTO `sec_act_log` (`eno`, `name`, `time`, `date`, `section`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$_GET['sec']."', '".$temp2."')");
	if (!$query) die($conn->error);
	//echo ("INSERT INTO `sub_act_log` (`eno`, `name`, `time`, `date`, `sub_act_no`, `qty`) VALUES (NULL, '".$_SESSION['name']."', CURRENT_TIMESTAMP, '".date("Y-m-d")."', '".$i."', '".$_GET['sub_act-'.$i]."')");
	}
	else{
	$query=$conn->query("UPDATE `sec_act_log` SET `qty`='".$temp2."' WHERE `section`='".$_GET['sec']."' AND `date`='".date("Y-m-d")."'");
	if (!$query) die($conn->error);
	//echo ("UPDATE `sub_act_log` SET `qty`='".$_GET['sub_act-'.$i]."' WHERE `sub_act_no`='".$i."' AND `date`='".date("Y-m-d")."'");
	}



	
	echo "success";
?>
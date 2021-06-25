<?php
session_start();
$db="tele";
$hn="localhost";
$un="root";
$pw="";
$user=$_GET['u'];
$pass=$_GET['p'];

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = $conn->query("SELECT * FROM `adminuser` WHERE `username` = '".$user."' AND `password` = '".$pass."'");
$len=0;
$len=$query->num_rows;
if($len!=0)
{



date_default_timezone_set("Asia/Kolkata");
$date=date("Ymd");

$i=0;
while($res=$query->fetch_assoc()){ 
$temp=$res;
if($i==0)
{
	
	$_SESSION['username']=$res['name'];
	echo("Welcome--Mr.");
	echo $res['name'];
	echo ("--");
	echo $res['design'];
	
}
	else 
	echo "Login failed";
	$_SESSION['time']=time();
	$_SESSION['un']=$user;
	$_SESSION['pw']=$pass;
	$_SESSION['design']=$res['design'];
	$_SESSION['section']=$res['section'];
	$_SESSION['name']=$res['name'];
	$_SESSION['app']="mta";

	
	$i++;
	break;
}

}

else
echo("user name not found");
?>
<?php
$db="mta20";
$hn="localhost";
$un="root";
$pw="";
session_start();
$conn = new mysqli($hn, $un, $pw, $db);
$user= mysqli_real_escape_string($conn,$_GET['u']);
$pw= mysqli_real_escape_string($conn,$_GET['p']);
$np= mysqli_real_escape_string($conn,$_GET['np']);
$query=$conn->query("SELECT * FROM `user` where `icno`='".$user."' AND `password`='".$pw."'");
$rows=$query->num_rows;
$yes="yes";
if($rows>0)
{
	$query=$conn->query("UPDATE `user` SET `password`='".$np."' WHERE `icno`='".$user."'");
	 if(!$query)
	{
		die($conn->error);
	}
	else 
    {
		echo "Pass Word Changed";
	}		
}
else
	echo "Wrong Username or Password";
?>
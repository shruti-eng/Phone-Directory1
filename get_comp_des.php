<?php
require_once("config.php");
 $id = $_GET['id'];
 $query_string = "SELECT * FROM `complaint` where `eno`='" . $id . "'";
 $query = $conn->query($query_string);
 $num_rows = $query->num_rows;
 if($num_rows>0)
 {
     $row=$query->fetch_assoc();
     echo($row['details']); 
 }
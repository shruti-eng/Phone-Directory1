<?php
 
 $DBhost = "localhost";
 $DBuser = "root";
 $DBpass = "";
 $DBname = "telephone";
 
 try {
  $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname",$DBuser,$DBpass);
  $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $ex){
  die($ex->getMessage());
 }
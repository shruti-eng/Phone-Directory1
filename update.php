

<?php

include_once("config.php");
$id = mysqli_real_escape_string($conn, $_GET('eno'));
echo $id;
$name= mysqli_real_escape_string($conn, $_GET['name']);
$icno=mysqli_real_escape_string($conn, $_GET['icno']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
$desig= mysqli_real_escape_string($conn,$_GET['desig']);
$query_string=" UPDATE `master` SET `icno`=$icno , `name`= $name, `section`= $section, `desig`= $desig  WHERE `eno` = $id  " ;
$query=$conn->query($query_string);
if(($query))
{
    echo "Updated";
}
else 
 {echo "Something went wrong";}

?>
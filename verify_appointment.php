<?php
include_once('connection.php');
 
if( isset($_GET['verify']) )
{
    $id = $_GET['verify'];
    $sql= "UPDATE FROM appointment WHERE id='$id'";
    $res= mysql_query($sql) or die("Failed".mysql_error());
}

if( isset($_GET['verify']) )  
{  
$id = $_GET['verify'];  
$res= mysql_query("SELECT * FROM appointment WHERE appointmentId='$id'");  
$row= mysql_fetch_array($res);  
}  
?>
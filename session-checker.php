<?php 
session_start();
if(!isset($_SESSION['usertype']))
{
	header("location: login.php");
}
?>
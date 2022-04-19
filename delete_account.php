<?php
require_once "config.php";
include("session-checker.php");
if(isset($_GET['id'])){
	$sql = "DELETE FROM usertable WHERE id = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", trim($_GET["id"]));
		if(mysqli_stmt_execute($stmt)){
			$_SESSION['delete-account']="User Account Deleted!";
            header("location: manage_accounts.php");
			exit();
		}
		else{
			$_SESSION['delete-account-failed']= "Error on delete statement";
		}
	}
}
?>



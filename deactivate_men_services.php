<?php
require_once "config.php";
include("session-checker.php");

if(isset($_GET['deactivate']))
{
    $id = $_GET['deactivate'];
    $sql= "UPDATE men_service_table SET status='INACTIVE' WHERE serviceId = ?";
    
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $id);
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$action = 'Deactivate';
				$module = 'Men-Services';
				$usertype = $_SESSION['usertype'];
				$name = $_SESSION['name'];
				mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
				if(mysqli_stmt_execute($stmt))
				{
					$_SESSION['deactivate-men-success'] = 'Service is now Deactivated!';
					header("location: manage_men_services.php");
					exit();
				}
				else
				{
					$_SESSION['deactivate-men-error'] = "Error on inserting logs";
				}
			}
			else
			{
				$_SESSION['activate-men-error'] = "Error on log statement";
			}
		}
		else
		{
			$_SESSION['activate-men-error'] = "Error on deactivate statement";
		}	
	}
	else
	{
		$_SESSION['activate-men-error'] = "Error on prepare statement";
	}
}
?>
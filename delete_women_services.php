<?php
require_once "config.php";
include("session-checker.php");

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
	$sql= "DELETE FROM women_service_table WHERE serviceId = ?";
    $serviceImage = $_FILES['serviceImage']['name'];
	
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $id);
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$action = 'Delete';
				$module = 'Women-Services';
				$usertype = $_SESSION['usertype'];
				$name = $_SESSION['name'];
				mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
				if(mysqli_stmt_execute($stmt))
				{
					unlink("images/WomenServicesImages/".$serviceImage);
					$_SESSION['notify'] = 'Service is now Deleted!';
					header("location: manage_men_services.php");
					exit();
				}
				else
				{
					echo "Error on inserting logs";
				}
			}
			else
			{
				echo "Error on log statement";
			}
		}
		else
		{
			echo "Error on delete statement";
		}	
	}
	else
	{
		echo "Error on prepare statement";
	}
}
?>
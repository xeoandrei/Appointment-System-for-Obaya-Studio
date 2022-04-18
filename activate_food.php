<?php
require_once "config.php";
include("session-checker.php");

if(isset($_GET['activate']))
{
    $id = $_GET['activate'];
    $sql= "UPDATE food SET status='ACTIVE' WHERE foodId = ?";
    
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $id);
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$action = 'Activate';
				$module = 'Foods';
				$usertype = $_SESSION['usertype'];
				$name = $_SESSION['name'];
				mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
				if(mysqli_stmt_execute($stmt))
				{
					$_SESSION['activate-food-success'] = 'Food Item is now Activated!';
					header("location: manage_food.php");
					exit();
				}
				else
				{
					$_SESSION['activate-food-error'] = "Error on inserting logs";
				}
			}
			else
			{
				$_SESSION['activate-food-error'] = "Error on log statement";
			}
		}
		else
		{
			$_SESSION['activate-food-error'] = "Error on activate statement";
		}	
	}
	else
	{
		$_SESSION['activate-food-error'] = "Error on prepare statement";
	}
}
?>
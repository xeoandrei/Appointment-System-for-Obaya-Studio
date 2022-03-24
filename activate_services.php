<?php
require_once "config.php";
include("session-checker.php");
/*if(isset($_POST['btnsubmit']))
{*/
	$sql = "UPDATE men_service_table SET status = 'ACTIVE' WHERE serviceId = ?";
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", trim($_GET['serviceId']));
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbllogs VALUES (?, ?, ?, ?, ?, ?)";
				if($stmt = mysqli_prepare($link, $sql))
				{
					$action = 'Activate';
				    $module = 'Men-Services';
				    $usertype = $_SESSION['usertype'];
				    $name = $_SESSION['name'];
					mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
					if(mysqli_stmt_execute($stmt))
					{
						$_SESSION['notify'] = 'Service is now Activated!';
						header("location: manage_men_services.php");
						exit();
					}
					else
					{
						echo "Error at the inserting logs!";
					}
				}	
		}
		else
		{
			echo "Error on activate statement";
		}	
	}
/*}*/
?>
<!--<html>
<head>
</head>
<FORM ACTION = "<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?> "METHOD = "POST">
	<input type = "hidden" name = "username" value = "<?php echo trim($_GET["serviceId"]); ?>" />
	<br><br><br><br><br><br><label class="form-controlthird"><p>Do You Want to Activate this Account?</p><br>
	<div class = "work">
		<input type = "submit" name = "btnsubmit" value = "Save" class= "submitZZ">
		<a href = "accounts.php" class="submitZZ">Cancel</a>
	</div>
</FORM>
</html>-->
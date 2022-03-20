<?php
require_once "config.php";
include ("session-checker.php");
if(isset($_POST['btnsubmit']))
{
	//commit update
	$sql = "UPDATE men_service_table SET name = ?, description = ?, cost = ?, status = ? WHERE serviceId = ?";
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "sssss", $_POST['serviceName'], $_POST['serviceDescription'], $_POST['serviceCost'], $_POST['serviceStatus'], $_GET['serviceId']);
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$action = 'Update';
				$module = 'Men-Services';
				$usertype = $_SESSION['usertype'];
				$name = $_SESSION['name'];
				mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
				if(mysqli_stmt_execute($stmt))
				{
					$_SESSION['notify'] = 'Service was Successfully Updated!';
					header("location: manage_services.php");
					exit();
				}
				else
				{
					echo "Error on inserting logs";
				}
			}
		}
		else
		{
			echo "Error on update statement";
		}
	}
}
else
{
	//load service details on the update form
	if(isset($_GET['serviceId']) && !empty(trim($_GET['serviceId'])))
	{
		$sql = "SELECT * FROM men_service_table WHERE serviceId = ?";
		if($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $_GET['serviceId']);
			if(mysqli_stmt_execute($stmt))
			{
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) == 1)
				{
					$men_service = mysqli_fetch_array($result, MYSQLI_ASSOC);
				}
				else
				{
					header("location: error.php");
					exit();
				}
			}
			else
			{
				echo "Error on select statement";
			}
		}
	}
}
?>
<html>
<strong>
<head><link rel="stylesheet" href="design.css">
	<title>Update Services</title></head>
<body>
	<center>
	<br><p>Update Services</p>
	<form action = "<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method = "POST">
		<label class="form-controlthird">Service Name: <input type= "text" name = "serviceName" class="form-controlsecond" 
			value="<?php echo $men_service['name']; ?>"><br>
        <label class="form-controlthird">Description: </label><textarea rows = "6" cols = "70" name = "serviceDescription" placeholder ="Enter description here...">
            <?php echo $men_service['description']; ?></textarea><br>
        <label class="form-controlthird">Cost: <input type= "number" name = "serviceCost" class="form-controlsecond" 
			min="0" max="9999" value = "<?php echo $men_service['cost']; ?>"> 
			<!--onKeyPress="if(this.value.length==4) return false;"> <br> -->
		<label class="form-controlthird">Current Status: <?php echo $men_service['status']; ?><br>
		<label class="form-controlthird">Change Status to:
            <select name = "serviceStatus" id = "serviceStatus" class="form-controlsecond">
			    <option value = "ACTIVE">Active</option>
			    <option value = "INACTIVE">Inactive</option>
		    </select><br>
		<div class = "work">
		    <input type = "submit" name = "btnsubmit" value = "Save" class= "submitZZ">
		    <a href = "manage_services.php" class="submitZZ">Cancel</a>
		</div>
	</form>
	</center>	
</body>
</strong>
</html>
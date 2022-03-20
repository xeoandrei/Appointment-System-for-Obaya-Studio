<?php
	include("session-checker.php");
	require_once "config.php";
    include "connection.php";
	if(isset($_POST['btnsubmit']))
	{
        // $serviceId = mysqli_real_escape_string($con, $_POST['serviceId']);
        // $serviceDateCreated = mysqli_real_escape_string($con, $_POST['serviceDateCreated']);
        $serviceName = mysqli_real_escape_string($con, $_POST['serviceName']);
        $serviceDescription = mysqli_real_escape_string($con, $_POST['serviceDescription']);
        $serviceCost = mysqli_real_escape_string($con, $_POST['serviceCost']);
        $serviceStatus = mysqli_real_escape_string($con, $_POST['serviceStatus']);
		//check if the id is existing
		$sql = " SELECT * FROM men_Service_table WHERE serviceId = ?";
		if($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $_POST['serviceId']);
			if(mysqli_execute($stmt))
			{
				$result = mysqli_stmt_get_result($stmt);
				if(mysqli_num_rows($result) != 1)
				{
					//insert
					$sql = "INSERT INTO men_service_table (name, description, cost, status) VALUES (?, ?, ?, ?)";
					if($stmt = mysqli_prepare($link, $sql))
					{
						mysqli_stmt_bind_param($stmt, "ssss", $_POST['serviceName'], $_POST['serviceDescription'], $_POST['serviceCost'], $_POST['serviceStatus']);
						if(mysqli_stmt_execute($stmt))
						{
							$_SESSION['notify'] = 'A New Account is Successfully Created!';
							header("location: manage_services.php");
							exit();
						}
						else
						{
							echo "Error on insert statement";
						}
					}
				}
				else
				{
					echo "Username is already in use";
				}
			}
			else
			{
				echo "Error on select statment";
			}
		}
	}
?>
<html>
<strong>
<head>
	<link rel="stylesheet" href="design.css">
	<title>Add Service</title>
</head>
<body>
<center>
	<br><br><p>Add Service</p>
	<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
		<label class="form-controlthird">Service Name: <input type = "text" name = "serviceName" class="form-controlsecond" required> <br>
		<label class="form-controlthird">Description: <textarea rows = "6" cols = "70" name = "serviceDescription" 
        placeholder ="Enter description here..."></textarea><br>
        <label class="form-controlthird">Cost: <input type= "number" name = "serviceCost" class="form-controlsecond" 
        min="0" max="9999" onKeyPress="if(this.value.length==4) return false;" required> <br>
		<label class="form-controlthird">Status: <select name = "serviceStatus" id = "service" class="form-controlsecond black" required>
			<option value = "ACTIVE">ACTIVE</option>
			<option value = "INACTIVE">INACTIVE</option>
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
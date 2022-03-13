<?php
require_once "config.php";
// session_start();
// if(!isset($_SESSION['id']))
// {
// 	header("location: manage-services.php");
// }
if(isset($_POST['btnsubmit']))
{
	//commit update
	$sql = "UPDATE men_service_table SET name = ?, description = ?, cost = ?, status = ? WHERE id = ?";
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "sssss", $_POST['txtName'], $_POST['txtDescription'], $_POST['txtCost'], $_POST['cmbStatus'], $_GET['id']);
		if(mysqli_stmt_execute($stmt))
		{
			$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$action = 'Update';
				$module = 'Men-Services';
				mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $_GET['id'], $_SESSION['id'], $module);
				if(mysqli_stmt_execute($stmt))
				{
					$_SESSION['notify'] = 'Service was Successfully Updated!';
					header("location: manage-services.php");
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
	if(isset($_GET['id']) && !empty(trim($_GET['id'])))
	{
		$sql = "SELECT * FROM men_service_table WHERE id = ?";
		if($stmt = mysqli_prepare($link, $sql))
		{
			mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
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
		<label class="form-controlthird">Service Id: <input type= "text" name = "txtId" class="form-controlsecond" 
			value="<?php echo $men_service['id']; ?>"disabled><br>
		<label class="form-controlthird">Service Name: <input type= "text" name = "txtName" class="form-controlsecond" 
			value="<?php echo $men_service['name']; ?>"><br>
        <label class="form-controlthird">Description: </label><textarea rows = "6" cols = "70" name = "txtDescription" placeholder ="Enter description here...">
            <?php echo $men_service['description']; ?></textarea><br>
        <label class="form-controlthird">Cost: <input type= "number" name = "txtCost" class="form-controlsecond" 
			min="0" max="9999" value = "<?php echo $men_service['cost']; ?>"> 
			<!--onKeyPress="if(this.value.length==4) return false;"> <br> -->
		<label class="form-controlthird">Current Status: <?php echo $men_service['status']; ?><br>
		<label class="form-controlthird">Change Status to:
            <select name = "cmbStatus" id = "cmbStatus" class="form-controlsecond">
			    <option value = "">--Select Service Type--</option>
			    <option value = "ACTIVE">Active</option>
			    <option value = "INACTIVE">Inactive</option>
		    </select><br>
		<div class = "work">
		    <input type = "submit" name = "btnsubmit" value = "Save" class= "submitZZ">
		    <a href = "manage-services.php" class="submitZZ">Cancel</a>
		</div>
	</form>
	</center>	
</body>
</strong>
</html>
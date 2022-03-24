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
					header("location: manage_men_services.php");
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
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/e54d8b55e8.js" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Ubuntu&display=swap"
    rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | Update Services</title>
</head>
<body>
<?php include "navbar/navbar-admin.php"; ?>
	<div class="container-fluid row">	
            <!-- CARD -->
			<div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 col-md-8">
				<div class="mt-5">
                    <h5 class="fw-bold my-3">Update Services</h5>
					<div class="card-body">
						<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
							<div class="row">
                            	<div class="mb-3 col-6">
									<input type="text" class="form-control" value="<?php echo $men_service['name'];?>" name="serviceName" required>
								</div>	 
								<div class="mb-3 col-6">
        							<input type= "number" class="form-control" value = "<?php echo $men_service['cost'];?>" name = "serviceCost" min="0" max="9999" onKeyPress="if(this.value.length==4) return false;" required>
								</div>	
								<div class="mb-3 col-6">
									<?php echo $men_service['status'];?>
									<select name="serviceStatus" value = "<?php echo $men_service['status'];?>" class="form-select" id="" required>
										<option value = "<?php echo $men_service['status'];?>" selected="true" disabled="disabled">Select Status</option>  
										<option value = "ACTIVE">ACTIVE</option>
										<option value = "INACTIVE">INACTIVE</option>
									</select>
								</div>	
								<div class="mb-3 col-6">
									<textarea class="form-control" rows = "4" name="serviceDescription" required><?php echo $men_service['description'];?></textarea>
								</div>
								<div class = "mb-3 col-6">
									<input type = "submit" class= "form-control btn btn-primary" name = "btnsubmit" value = "Save">
								</div>	
								<div class = "mb-3 col-6">
									<a href = "manage_men_services.php" class="form-control btn btn-dark">Cancel</a>
								</div>	
							</div>						
						</form>
					</div>		
				</div>
			</div>	
	</div>
</body>
</html>
<!--  -->
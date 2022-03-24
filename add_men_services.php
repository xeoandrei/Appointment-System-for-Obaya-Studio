<?php
	include("session-checker.php");
	require_once "config.php";
    include "connection.php";
	if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR')){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) {
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
    }
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
							header("location: manage_men_services.php");
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

    <title>Obaya Studio | Add Services</title>
</head>
<body>
<?php include "navbar/navbar-admin.php"; ?>
	<div class="container-fluid row">	
            <!-- CARD -->
			<div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 col-md-8">
				<div class="mt-5">
                    <h5 class="fw-bold my-3">Add Services</h5>
					<div class="card-body">
						<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
							<div class="row">
                            	<div class="mb-3 col-6">
									<input type="text" class="form-control" placeholder="Service Name" name="serviceName" required>
								</div>	 
								<div class="mb-3 col-6">
        							<input type= "number" class="form-control" placeholder="Service Cost" name = "serviceCost" min="0" max="9999" onKeyPress="if(this.value.length==4) return false;" required>
								</div>	
								<div class="mb-3 col-6">
									<select name="serviceStatus" class="form-select" id="" required>
										<option value = "" selected="true" disabled="disabled">Select Status</option>  
										<option value = "ACTIVE">ACTIVE</option>
										<option value = "INACTIVE">INACTIVE</option>
									</select>
								</div>	
								<div class="mb-3 col-6">
									<textarea class="form-control" rows = "4" placeholder="Enter description here..." name="serviceDescription" required></textarea>
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
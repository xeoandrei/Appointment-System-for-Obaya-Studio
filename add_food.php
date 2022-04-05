<?php
include("session-checker.php");
require_once "config.php";

if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR'))
{
	echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
} 
elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) 
{
	echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
}
if(isset($_POST['btnAdd']))
{
	// $foodId = mysqli_real_escape_string($link, $_POST['foodId']);
	// $foodDateCreated = mysqli_real_escape_string($link, $_POST['foodDateCreated']);
	$foodName = mysqli_real_escape_string($link, $_POST['foodName']);
	$foodDescription = mysqli_real_escape_string($link, $_POST['foodDescription']);
	$foodCost = mysqli_real_escape_string($link, $_POST['foodCost']);
	$foodStatus = mysqli_real_escape_string($link, $_POST['foodStatus']);
	$foodImage = $_FILES['foodImage']['name'];

	//check if the id is existing
	$sql = " SELECT * FROM food WHERE foodId = ?";
	if($stmt = mysqli_prepare($link, $sql))
	{
		mysqli_stmt_bind_param($stmt, "s", $_POST['foodId']);
		if(mysqli_execute($stmt))
		{
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result) != 1)
			{
				//check for allowed food image formats
				$allowed_extension = array('gif', 'png', 'jpg', 'jpeg');
				$filename = $_FILES['foodImage']['name'];
				$file_extension = pathinfo($filename, PATHINFO_EXTENSION);

				if (!in_array($file_extension, $allowed_extension))
				{
					echo 'You are allowed to only upload images with only jpg, png, jpeg and gif formats';
				}
				else
				{
					//check if food image filename is existing
					if(file_exists("images/FoodImages/" . $_FILES['foodImage']['name']))
					{
						$filename = $_FILES['foodImage']['name'];
						echo 'Image Already exists';
					}
					else
					{
						//insert
						$sql = "INSERT INTO food (name, description, cost, status, image) VALUES (?, ?, ?, ?, ?)";
						if($stmt = mysqli_prepare($link, $sql))
						{
							mysqli_stmt_bind_param($stmt, "sssss", $_POST['foodName'], $_POST['foodDescription'], $_POST['foodCost'], $_POST['foodStatus'], $_FILES['foodImage']['name']);
							if(mysqli_stmt_execute($stmt))
							{
								$sql = "INSERT INTO tbl_logs VALUES (?, ?, ?, ?, ?, ?)";
                        		if($stmt = mysqli_prepare($link, $sql))
								{
									$action = 'Create';
                            		$module = 'Foods';
                            		$usertype = $_SESSION['usertype'];
                            		$name = $_SESSION['name'];
                            		mysqli_stmt_bind_param($stmt, "ssssss", date("m/d/Y"), date("h:i:sa"), $action, $usertype, $name, $module);
                            		if(mysqli_stmt_execute($stmt))
                            		{
										move_uploaded_file($_FILES["foodImage"]["tmp_name"], "images/FoodImages/".$_FILES["foodImage"]["name"]);
										$_SESSION['notify'] = 'A New Food Item is Successfully Created!';
										header("location: manage_food.php");
										exit();
                            		}
                            		else
                            		{
                                		echo "Error on inserting logs";
                            		}	
								}
								else
								{
									echo "Error on before inserting logs";
								}
							}
							else
							{
								echo "Error on insert food item statement";
							}
						}
						else
						{
							echo "Error on before inserting food item";
						}
					}
				}		
			}
			else
			{
				echo "Food item is already in use";
			}
		}
		else
		{
			echo "Error on select statment";
		}
	}
	else
	{
		echo "Error on prepare statment";
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

<title>Obaya Studio | Add Food</title>
</head>
<body>
<?php include "navbar/navbar-admin.php"; ?>
<div class="container-fluid row">	
		<!-- CARD -->
		<div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 col-md-8">
			<div class="mt-5">
				<h5 class="fw-bold my-3">Add Food Items</h5>
				<div class="card-body">
					<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post" enctype = "multipart/form-data">
						<div class="row">
							<div class="mb-3 col-6">
								<input type="text" class="form-control" placeholder="Food Name" name="foodName" required>
							</div>	 

							<div class="mb-3 col-6">
								<input type= "number" class="form-control" placeholder="Food Cost" name = "foodCost" min="0" max="9999" onKeyPress="if(this.value.length==4) return false;" required>
							</div>	

							<div class="mb-3 col-6">
								<select name="foodStatus" class="form-select" id="" required>
									<option value = "" selected="true" disabled="disabled">Select Status</option>  
									<option value = "ACTIVE">ACTIVE</option>
									<option value = "INACTIVE">INACTIVE</option>
								</select>
							</div>	

							<div class="mb-3 col-6">
								<input type="file" class="form-control" placeholder="Food Image" name="foodImage" required>
							</div>

							<div class="mb-3 col-6">
								<textarea class="form-control" rows = "4" placeholder="Enter description here..." name="foodDescription" required></textarea>
							</div>

							<div class = "row">
								<div class = "mb-3 col-6">
									<input type = "submit" class= "form-control btn btn-primary" name = "btnAdd" value = "Save">
								</div>	

								<div class = "mb-3 col-6">
									<a href = "manage_food.php" class="form-control btn btn-dark">Cancel</a>
								</div>	
							</div>	
						</div>						
					</form>
				</div>		
			</div>
		</div>	
</div>	
</body>
</html>

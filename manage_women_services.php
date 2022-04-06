<?php
include "config.php";
session_start();

//check if the session contains data
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email == false && $password == false)
{
    header('Location: index.php');
}
//if session usertype is admin or staff
if (($_SESSION['usertype'] == 'ADMINISTRATOR'))
{
    echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
} 
elseif (($_SESSION['usertype'] == 'STAFF'))
{
    echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
}

?>
<html>
<head>
	<title>Manage Women Services</title>
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
    <link rel="stylesheet" href="css/management.css">
	
</head>
<body>
<?php 
include 'navbar/navbar-admin.php';
?>
   <div class="container-fluid">
		<div class="col-lg-12 col-md-12">
			<div class="card shadow p-3 mb-5 bg-body rounded">
				<div class="card-header bg-dark text-white">
                    <div class="float-start mt-2">
						Services List | User: <?php echo $_SESSION['name'];?>  
					</div>
					<div class="float-end mt-2">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row">
                            <input class="form-control col me-2" type="text" placeholder="Search" name="txtsearch">
                            <INPUT TYPE = "submit" NAME = "btnsubmit" VALUE = "Go" class= "btn btn-outline-success col-4 me-2">
							<a href="add_women_services.php" class=" btn btn-primary col me-2">Add Service</a>
						</form>
					</div>
				</div>
				<div class="card-body"></div>
		            <?php
		                if(isset($_POST['btnsubmit']))
		                {
			                $sql = "SELECT * FROM women_service_table WHERE serviceId = ? OR (serviceId LIKE ? OR name LIKE ? OR description LIKE ? OR cost LIKE ? OR status LIKE ? OR date_created LIKE ?) ORDER BY serviceId";
			                if($stmt = mysqli_prepare($link, $sql))
			                {
				                $search = '%' . $_POST['txtsearch'] . '%';
				                mysqli_stmt_bind_param($stmt, "sssssss", $_SESSION['serviceId'], $search, $search, $search, $search, $search, $search);
				                if(mysqli_stmt_execute($stmt))
				                {
					                $result = mysqli_stmt_get_result($stmt);
					                build_table($result);
				                }
				                else
				                {
					                echo "Error on search button";
				                }
			                }
		                }
		                //loading accounts data from the database
		                else 
                        {
                            $select = 'SELECT * FROM women_service_table ORDER BY serviceId'; 
                            if ($result = mysqli_query($link, $select)) 
                            {
                                build_table($result);
                            }
                        }
		            ?>	
                    </div>
                </div>
            </div> 
        </div>
    </div>	                                    
<?php
	function build_table($result)
	{
		if(mysqli_num_rows($result) > 0)
		{
            //table header
			echo "<div class='table-responsive'>";
		    echo "<table class='table table-sm'>";
		    echo "<thead>";
		    echo "<tr>";
            echo "<th scope='col'>Service ID</th>";
			echo "<th scope='col'>Date Created</th>";
			echo "<th scope='col'>Service</th>";
			echo "<th scope='col'>Description</th>";
			echo "<th scope='col'>Cost</th>";
			echo "<th scope='col'>Image</th>";
            echo "<th scope='col'>Status</th>";
            // echo "<th scope='col'>Created By</th>";
            echo "<th scope='col'>Actions</th>";
			echo "</tr>";
		    echo "</thead>";
		    echo "<tbody>";
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
                //echo "<th scop='row'>" . $row['id'] . "</td>";
				echo "<th scope='row'>" . $row['serviceId'] . "</td>";
				echo "<td>" . $row['date_created'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
				//for image filename only
				//echo "<td>" . $row['image'] . "</td>";
				//fetching image from womenservicesimages folder
				$image = 'images/WomenServicesImages/'.$row["image"];
				echo "<td>" ."<img src=$image height = '92px' width = '92px'". "</td>";
                echo "<td>" . $row['status'] . "</td>";
                // echo "<td>" . $row['createdby'] . "</td>";
				echo "<td>";
					echo "<div class='dropdown'>";
						echo "<button class='btn btn-primary dropdown-toggle' type='button'";
							echo "id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>";
							echo "Action";
			   			echo "</button>";
						echo  "<ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>";   
							echo "<li><a class='dropdown-item' href = 'update_women_services.php?serviceId=" . $row['serviceId'] . "'>Update </a></li>";
							echo "<li><hr class='dropdown-divider'></li>";
							$serviceId = $row["serviceId"];
							if($row['status'] =="ACTIVE")
                			{
                    			echo "<li><a class='dropdown-item' href = 'deactivate_women_services.php?deactivate=" . $row['serviceId'] . "'>Deactivate </a></li>";
								echo "<li><hr class='dropdown-divider'></li>";
							}
                			else if($row['status'] == "INACTIVE")
                			{
								echo "<li><a class='dropdown-item' href = 'activate_women_services.php?activate=" . $row['serviceId'] . "'>Activate </a></li>";
								echo "<li><hr class='dropdown-divider'></li>";
							}
							echo "<li><a class='dropdown-item' href = 'delete_women_services.php?delete=" . "delete" . "&" . "id" . "=" . $row['serviceId'] . "&" . "image" . "=" . $row["image"] . "'>Delete </a></li>";
							$del_image = $row["image"];
							echo "<input type = 'hidden' name = 'delImage' value = '$del_image'";
							echo "
								<ul>			 		
							</div>";
					echo "</td>";
 					echo "</tr>";
					}
			echo "</tbody>";
		    echo "</table>";
	    	echo "</div>";
		}		
		else
		{
			echo "No Service/s Found!";
		}
	}
?>
</body>
</html>


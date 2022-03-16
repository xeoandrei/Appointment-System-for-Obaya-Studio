<?php
require_once "config.php";
session_start();
if (($_SESSION['usertype'] == 'ADMINISTRATOR')){
    echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } 
elseif (($_SESSION['usertype'] == 'STAFF')){
    echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
    }
else{
    header("location: management.php");
}
?>
<?php
require_once "connection.php";
//check if the session contains data
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email == false && $password == false){
    header('Location: index.php');
}
?>
<html>
<head>
	<title>Manage Men Services</title>
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
    <link rel="stylesheet" href="design.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <link rel="stylesheet" href="css/modals.css">
    <script src="modals.js" defer></script>
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
                            <INPUT TYPE = "submit" NAME = "btnsubmit" VALUE = "Go" class= "btn btn-outline-success col-4 me-2"></h4>
						</form>
					</div>
				</div>
				<div class="card-body"></div>
		            <?php
		                if(isset($_POST['btnsubmit']))
		                {
			                $sql = "SELECT * FROM men_service_table WHERE serviceId = ? OR (serviceId LIKE ? OR name LIKE ? OR description LIKE ? OR cost LIKE ? OR status LIKE ? OR createdby LIKE ? OR date_created LIKE ?) ORDER BY serviceId";
			                if($stmt = mysqli_prepare($link, $sql))
			                {
				                $search = '%' . $_POST['txtsearch'] . '%';
				                mysqli_stmt_bind_param($stmt, "ssssssss", $_SESSION['serviceId'], $search, $search, $search, $search, $search, $search, $search);
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
                            $select = 'SELECT * FROM men_service_table ORDER BY serviceId'; 
                            if ($result = mysqli_query($link, $select)) 
                            {
                                build_table($result);
                            }
                        }
		            ?>	
		            <?php
                        if (isset($_SESSION['notify'])) 
                        {
                            echo '
                                <div class = "modal active">
                                    <div class = "modal-header">
                                        NOTIFICATION!
                                    <button data-close-button>&times;</button>
                                    </div>
                                    <div class = "modal-body">
                                        <br>'.$_SESSION["notify"].'
                                    </div>
                                </div> 
                                <div id="overlay" class="active"></div>
                                ';
                            unset($_SESSION['notify']);
                        }
                    ?>
                    <div id="overlay"></div>
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
            echo "<th scope='col'>Status</th>";
            echo "<th scope='col'>Created By</th>";
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
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['createdby'] . "</td>";
				echo "<td>";
				echo "<button> <a href = 'update-services.php?serviceId=" . $row['serviceId'] . "'>Update </a></button>";
				if($row['status'] =="ACTIVE")
                {
                    echo "<button><a data-target = '#deactivate-services-serviceId-" . $row['serviceId'] . "'>Deactivate </a></button>";
                }
                else if($row['status'] == "INACTIVE")
                {
                	echo "<button><a data-target = '#activate-services-serviceId-" . $row['serviceId'] . "'>Activate </a></button>";
                }
				else
                {
                    echo "<button><a data-target = '#activate-services-serviceId-" . $row['serviceId'] . "'>Activate </a></button>";
                }
				echo "<button><a data-target = '#delete-services-serviceId-" . $row['serviceId'] . "'>Delete </a></button>";
				echo '
					<div id = "activate-services-serviceId-' . $row['serviceId'] . '" class = "modal">
						<div class = "modal-header">
							ACTIVATE
							<button data-close-button>&times;</button>
						</div>
					    <div class = "modal-body">
							Do you want to Activate this Account?<br>
							<a href = "activate-services.php?serviceId='.$row['serviceId'].'"><br>Yes</a>
						</div>
					</div> 
					<div id = "deactivate-services-serviceId-' . $row['serviceId'] . '" class = "modal">
						<div class = "modal-header">
							DEACTIVATE
							<button data-close-button>&times;</button>
						</div>
						<div class = "modal-body">
							Do you want to Deactivate this Account?<br>
							<a href = "deactivate-services.php?serviceId='.$row['serviceId'].'"><br>Yes</a>
						</div>
					</div> 
					<div id = "delete-services-serviceId-' . $row['serviceId'] . '" class = "modal">
						<div class = "modal-header">
							DELETE
							<button data-close-button>&times;</button>
						</div>
						<div class = "modal-body">
							Do you want to Delete this Account?<br>
							<a href = "delete-services.php?serviceId='.$row['serviceId'].'"><br>Yes</a>
						</div>
					</div> 		
				';
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


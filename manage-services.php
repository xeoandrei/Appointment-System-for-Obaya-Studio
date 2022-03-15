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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
                <a class="navbar-brand mx-5" href="index.php">
                    <img src="images/logo3.png" style="height: 90px; margin-right: 1em;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="management.php">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Appointments</a>
                        </li>
            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                    <a class="dropdown-item" href="manage-services.php">For Men</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="manage-services.php">For Women</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Food</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Feedback</a>
                        </li>
						<?php
                        if(($_SESSION['usertype']) == 'ADMINISTRATOR')
	                    {
                            echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="manage_accounts.php">Staff</a>';
                                echo '<li class="nav-item">';
                            echo '</li>';
                        }
		                ?>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto">
						<li class="nav-item my-3">
                            <?php 
                            if(($_SESSION['usertype']) == 'ADMINISTRATOR') 
                            {
                                echo '<a href="signup-user.php" class="btn btn-primary">Create Account</a>';
                            }
                            ?>
						</li>
                        <li class="nav-item mx-3 my-3">
                            <a href="logout.php" class="btn btn-danger me-3">Logout</a>
                        </li>
                    </ul>
                </div>  
        </nav>
<html>
<center>
<head>
    <link rel="stylesheet" href="design.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <link rel="stylesheet" href="css/modals.css">
    <script src="modals.js" defer></script>
    <br><title>Manage Services</title>
</head>
<body>
		<FORM ACTION = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" METHOD = "POST">
			<h2>Service Management Form</h2>
			<h4>Sort By: <input type = "text" name = "txtsearch" class="inputsearch">
			<INPUT TYPE = "submit" NAME = "btnsubmit" VALUE = "Search" class= "search"></h4>
			<a href="add-services.php" class="buttonaddeq">Add New Service</a>	
		</FORM>
		<?php
		if(isset($_POST['btnsubmit']))
		{
			$sql = "SELECT * FROM men_service_table WHERE id = ? OR (id LIKE ? OR name LIKE ? OR description LIKE ? OR cost LIKE ? OR status LIKE ? OR createdby LIKE ? OR date_created LIKE ?) ORDER BY id";
			if($stmt = mysqli_prepare($link, $sql))
			{
				$search = '%' . $_POST['txtsearch'] . '%';
				mysqli_stmt_bind_param($stmt, "ssssssss", $_SESSION['id'], $search, $search, $search, $search, $search, $search, $search);
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
            $select = 'SELECT * FROM men_service_table ORDER BY id';
            
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
        <br><a href="management.php" class="button2">Return to Dashboard</a>
        <div id="overlay"></div>
	</body>
</center>	
</html>
<?php
	function build_table($result)
	{
		if(mysqli_num_rows($result) > 0)
		{
			echo "<table border = '1' width = '100' cell spacing = '0'";
			echo "<tr bgcolor='transparent'>";
			echo "<th>#</th>";
			echo "<th>Date Created</th>";
			echo "<th>Service</th>";
			echo "<th>Description</th>";
			echo "<th>Cost</th>";
            echo "<th>Status</th>";
            echo "<th>Created By</th>";
            echo "<th>Actions</th>";
			echo "</tr><br>";
			while($row = mysqli_fetch_array($result))
			{
				echo "<tr>";
				echo "<td>" . $row['id'] . "</td>";
				echo "<td>" . $row['date_created'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['cost'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['createdby'] . "</td>";
				echo "<td>";
				echo "<button> <a href = 'update-services.php?id=" . $row['id'] . "'>Update </a></button>";
				if($row['status'] =="ACTIVE")
                {
                    echo "<button><a data-target = '#deactivate-services-id-" . $row['id'] . "'>Deactivate </a></button>";
                }
                else if($row['status'] == "INACTIVE")
                {
                	echo "<button><a data-target = '#activate-services-id-" . $row['id'] . "'>Activate </a></button>";
                }
				else
                {
                    echo "<button><a data-target = '#activate-services-id-" . $row['id'] . "'>Activate </a></button>";
                }
				echo "<button><a data-target = '#delete-services-id-" . $row['id'] . "'>Delete </a></button>";
				echo '
					<div id = "activate-services-id-' . $row['id'] . '" class = "modal">
						<div class = "modal-header">
							ACTIVATE
							<button data-close-button>&times;</button>
						</div>
					    <div class = "modal-body">
							Do you want to Activate this Account?<br>
							<a href = "activate-services.php?id='.$row['id'].'"><br>Yes</a>
						</div>
					</div> 
					<div id = "deactivate-services-id-' . $row['id'] . '" class = "modal">
						<div class = "modal-header">
							DEACTIVATE
							<button data-close-button>&times;</button>
						</div>
						<div class = "modal-body">
							Do you want to Deactivate this Account?<br>
							<a href = "deactivate-services.php?id='.$row['id'].'"><br>Yes</a>
						</div>
					</div> 
					<div id = "delete-services-id-' . $row['id'] . '" class = "modal">
						<div class = "modal-header">
							DELETE
							<button data-close-button>&times;</button>
						</div>
						<div class = "modal-body">
							Do you want to Delete this Account?<br>
							<a href = "delete-services.php?id='.$row['id'].'"><br>Yes</a>
						</div>
					</div> 		
				';
				echo "</td>";
 				echo "</tr>";
			}
			echo "</table>";
		}		
		else
		{
			echo "No Service/s Found!";
		}
	}
?>


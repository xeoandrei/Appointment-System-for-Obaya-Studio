<html>
<head>
	<title>Accounts Management</title>
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
                <a class="navbar-brand ms-3" href="#">
                    Obaya
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
                                    <a class="dropdown-item" href="services_men.html">For Men</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="services_women.html">For Women</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Food</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Feedback</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="manage_accounts.php">Staff</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger me-3">Logout</a>
                        </li>
                    </ul>
                </div>  
        </nav>
<?php
session_start();
if(isset($_SESSION['email'])){
	?>
	<div class="container-fluid">
	<a href="signup-user.php" class="btn btn-primary float-end">Create Account</a>
		<div class="col-lg-12 col-md-12">

			<div class="card">
				<div class="card-header bg-dark text-white">
					<div class="float-start mt-2">
						Accounts Table | User: <?php echo $_SESSION['email']; ?>  
					</div>
					<div class="float-end mt-2">
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row">
							<input class="form-control col me-2" type="text" placeholder="Search" name="txtsearch">
							<input class="btn btn-outline-success col-4 me-2" type="submit" value="Go">
						</form>
					</div>
				</div>
				<div class="card-body"></div>
					<?php 
					require_once "config.php";
					//search button
					// if(isset($_POST['btnsubmit'])){
					// 	$sql = "SELECT * FROM tbl_accounts WHERE username <> ? AND username LIKE ? ORDER BY username";
					// 	if($stmt = mysqli_prepare($link, $sql)){
					// 		$search = '%' . $_POST['txtsearch'] . '%';
					// 		mysqli_stmt_bind_param($stmt, "sss", $_SESSION['username'], $search, $search);
					// 		if(mysqli_stmt_execute($stmt)){
					// 			$result = mysqli_stmt_get_result($stmt);
					// 			build_table($result);
					// 		}
					// 		else{
					// 			echo "Error on search button";
					// 		}
					// 	}
					// }
					//form load
					// else{
						$sql = "SELECT * FROM usertable WHERE email <> ? ORDER BY email";
						if($stmt = mysqli_prepare($link, $sql)){
							mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);
							if(mysqli_stmt_execute($stmt)){
								$result = mysqli_stmt_get_result($stmt);
								build_table($result);
							}
							else{
								echo "Error on form load";
							}
						}
					?>
				</div>
			</div>
		</div>
	</div>
	
	<?php
}
else{
	//header("location: login.php");
}
?>

<?php
// script: error_reporting(0);
// echo $_SESSION['msg'];
// unset($_SESSION['msg']);
function build_table($result){
	if(mysqli_num_rows($result) > 0){
		//table header
		echo "<table class='table'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope='col'>ID</th>";
		echo "<th scope='col'>Username</th>";
		echo "<th scope='col'>Email</th>";
		echo "<th scope='col'>Status</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		//table data (loop each row of the result)
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<th scop='row'>" . $row['id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['status'] . "</td>";
			echo "<td>";
			echo "<a href='delete-account.php?name=" . $row['name'] . "'>Delete</a> ";
			echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else{
		echo "No user account/s found";
	}
}

// }
?>
</body>
</html>
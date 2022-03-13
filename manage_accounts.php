<?php
require_once "config.php";
session_start();
//check if the session contains data
if (($_SESSION['usertype'] == 'ADMINISTRATOR'))
{
    //display session data
    /*
				?>
				<h3><?php echo "Welcome, " . $_SESSION['username']."!"; ?></h3>
				<h3> <?php echo "User type right now is: " . $_SESSION['usertype']; ?> </h3> 
				<?php
				*/} 
else
{
    header("location: management.php");}
?>
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
                                    <a class="dropdown-item" href="services_men.php">For Men</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="services_men.php">For Women</a>
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
						<li class="nav-item my-3">
							<a href="signup-user.php" class="btn btn-primary">Create Account</a>
						</li>
                        <li class="nav-item mx-3 my-3">
                            <a href="logout.php" class="btn btn-danger me-3">Logout</a>
                        </li>
                    </ul>
                </div>  
        </nav>
<?php
if(isset($_SESSION['email'])){
	?>
	<div class="container-fluid">
		<div class="col-lg-12 col-md-12">

			<div class="card shadow p-3 mb-5 bg-body rounded">
				<div class="card-header bg-dark text-white">
					<div class="float-start mt-2">
						Accounts Table | User: <?php echo $_SESSION['email'];?>  
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
						$sql = "SELECT * FROM usertable WHERE email <> ? ORDER BY id";
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
		echo "<div class='table-responsive'>";
		echo "<table class='table table-sm'>";
		echo "<thead>";
		echo "<tr>";
		echo "<th scope='col'>ID</th>";
		echo "<th scope='col'>Username</th>";
		echo "<th scope='col'>Email</th>";
		echo "<th scope='col'>Usertype</th>";
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
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['status'] . "</td>";
			echo "<td>";
			echo "<a href='delete-account.php?name=" . $row['name'] . "'>Delete</a> ";
			echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}
	else{
		echo "No user account/s found";
	}
}

// }
?>
</body>
</html>
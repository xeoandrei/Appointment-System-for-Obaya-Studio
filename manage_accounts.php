<html>
<head>
	<title>Accounts Management</title>
	<!-- <link rel="stylesheet" type="text/css" href="accounts.css"> -->
</head>
<body>
<?php
session_start();
if(isset($_SESSION['email'])){
	?> <h1> <?php echo "ACCOUNTS TABLE"?> </h1>
	<h4> <?php echo "User: " . $_SESSION['email']; ?> </h4> <?php
}
else{
	//header("location: login.php");
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!-- <a href="index.php">Back</a> -->
<a href="signup-user.php">Create Account</a>
<br><br>Search: <input type="text" name="txtsearch"><br>
<input type="submit" name="btnsubmit" value="Go"><br>
</form>
</body>
</html>
<?php
// script: error_reporting(0);
// echo $_SESSION['msg'];
// unset($_SESSION['msg']);
function build_table($result){
	if(mysqli_num_rows($result) > 0){
		//table header
		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Username</th>";
		echo "<th>Email</th>";
		echo "<th>Status</th>";
		echo "</tr>";
		echo "<br>";
		//table data (loop each row of the result)
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['name'] . "</td>";
			echo "<td>" . $row['email'] . "</td>";
			echo "<td>" . $row['status'] . "</td>";
			echo "<td>";
			echo "<a href='delete-account.php?name=" . $row['name'] . "'>Delete</a> ";
			echo "</td>";
			echo "</tr>";
			echo "<br>";
		}
		echo "</table>";
	}
	else{
		echo "No user account/s found";
	}
}
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
// }
?>
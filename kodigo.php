<html>
<head>
	<title>Account Management</title>
	<link rel="stylesheet" type="text/css" href="accounts.css">
</head>
<body>
<?php
session_start();
if(isset($_SESSION['username'])){
	?> <h1> <?php echo "ACCOUNTS TABLE"?> </h1>
	<h4> <?php echo "Username: " . $_SESSION['username']; ?> </h4> <?php
}
else{
	header("location: login.php");
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<a href="index.php">Back</a>
<a href="create-account.php">Add Account</a>
<br><br>Search: <input type="text" name="txtsearch"><br>
<input type="submit" name="btnsubmit" value="Go"><br>
</form>
</body>
</html>
<?php
script: error_reporting(0);
echo $_SESSION['msg'];
unset($_SESSION['msg']);
function build_table($result){
	if(mysqli_num_rows($result) > 0){
		//table header
		echo "<table>";
		echo "<tr>";
		echo "<th>Username</th>";
		echo "<th>Usertype</th>";
		echo "<th>Status</th>";
		echo "<th>Created by</th>";
		echo "</tr>";
		echo "<br>";
		//table data (loop each row of the result)
		while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['username'] . "</td>";
			echo "<td>" . $row['usertype'] . "</td>";
			echo "<td>" . $row['status'] . "</td>";
			echo "<td>" . $row['createdby'] . "</td>";
			echo "<td>";
			echo "<a href='update-account.php?username=" . $row['username'] . "'>Update</a> ";
			echo "<a href='activate-account.php?username=" . $row['username'] . "'>Activate</a> ";
			echo "<a href='deactivate-account.php?username=" . $row['username'] . "'>Deactivate</a> ";
			echo "<a href='delete-account.php?username=" . $row['username'] . "'>Delete</a> ";
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
if(isset($_POST['btnsubmit'])){
	$sql = "SELECT * FROM accountstbl WHERE username <> ? AND username LIKE ? OR usertype LIKE ? ORDER BY username";
	if($stmt = mysqli_prepare($link, $sql)){
		$search = '%' . $_POST['txtsearch'] . '%';
		mysqli_stmt_bind_param($stmt, "sss", $_SESSION['username'], $search, $search);
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			build_table($result);
		}
		else{
			echo "Error on search button";
		}
	}
}
//form load
else{
	$sql = "SELECT * FROM accountstbl WHERE username <> ? ORDER BY username";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			build_table($result);
		}
		else{
			echo "Error on form load";
		}
	}
}
?>
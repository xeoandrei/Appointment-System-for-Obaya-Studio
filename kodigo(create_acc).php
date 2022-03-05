<html>
<head>
<link rel="stylesheet" type="text/css" href="update-account.css">
<title>Add new account</title>
</head>
<body>
<p>Fill up this form and submit to add a new user</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	Username: <input type = "text" name = "txtusername" required><br><br>
	Password: <input type = "password" name = "txtpassword" required><br><br>
	User type: <select name = "cmbusertype" id = "cmbusertype" required>
		<option value = "">--Select Usertype--</option>
		<option value = "ADMINISTRATOR">Administrator</option>
		<option value = "TECHNICAL">Technical</option>
		<option value = "USER">User</option>
	</select><br><br>
	<input type = "submit" name = "btnsubmit" value = "Create">
	<a href = "accounts.php?">Cancel</a>
</form>
</body>
</html>
<?php
include("session-checker.php");
require_once "config.php";
if(isset($_POST['btnsubmit'])){
	//check if the username is existing
	$sql = "SELECT * FROM accountstbl WHERE username = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", $_POST['txtusername']);
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result) != 1){
				//insert new user to the accounts table
				$sql = "INSERT INTO accountstbl VALUES (?, ?, ?, ?, ?)";
				if($stmt = mysqli_prepare($link, $sql)){
					$status = "ACTIVE";
					mysqli_stmt_bind_param($stmt, "sssss", $_POST['txtusername'], $_POST['txtpassword'], $_POST['cmbusertype'], $status, $_SESSION['username']);
					if(mysqli_stmt_execute($stmt)){
						$_SESSION['msg']="New User Account created!";
						header("location: accounts.php");
						exit();
					}
					else{
						echo "Error on insert statement";
					}
				}
			}
			else{
				echo "User already exists";
			}
		}
		else{
			echo "Error on select statement";
		}
	}
}
?>
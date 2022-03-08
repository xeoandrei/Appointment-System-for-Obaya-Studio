<html>
<head>
<link rel="stylesheet" type="text/css" href="update-account.css">
<title>Add new account</title>
</head>
<body>
<p>Fill up this form and submit to add a new user</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    name: <input type = "text" name = "txtname" required><br><br>
	email: <input type = "text" name = "txtemail" required><br><br>
	Password: <input type = "password" name = "txtpassword" required><br><br>
	<!-- User type: <select name = "cmbusertype" id = "cmbusertype" required>:
		<option value = "">--Select Usertype--</option>
		<option value = "ADMINISTRATOR">Administrator</option>
		<option value = "TECHNICAL">Technical</option>
		<option value = "USER">User</option> -->
	</select><br><br>
	<input type = "submit" name = "btnsubmit" value = "Create">
	<a href = "manage_accounts.php?">Cancel</a>
</form>
</body>
</html>
<?php
require_once "config.php";
if(isset($_POST['btnsubmit'])){
	//check if the username is existing
	$sql = "SELECT * FROM usertable WHERE email = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", $_POST['txtemail']);
		if(mysqli_stmt_execute($stmt)){
			$result = mysqli_stmt_get_result($stmt);
			if(mysqli_num_rows($result) != 1){
				//insert new user to the accounts table
				$sql = "INSERT INTO usertable VALUES (?, ?, ?, ?, ?, ?)";
				if($stmt = mysqli_prepare($link, $sql)){
					$status = "verified";
                    $id = 0;
                    $code = 0;
					mysqli_stmt_bind_param($stmt, "ssssss", $id, $_POST['txtname'], $_POST['txtemail'], $_POST['txtpassword'], $code, $status);
					if(mysqli_stmt_execute($stmt)){
						$_SESSION['msg']="New User Account created!";
						header("location: manage_accounts.php");
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
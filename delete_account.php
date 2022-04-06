<?php
require_once "config.php";
include("session-checker.php");
if(isset($_POST['btnsubmit'])){
	$sql = "DELETE FROM usertable WHERE name = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "s", trim($_POST["name"]));
		if(mysqli_stmt_execute($stmt)){
			$_SESSION['msg']="User Account Deleted!";
            header("location: manage_accounts.php");
			exit();
		}
		else{
			echo "Error on delete statement";
		}
	}
}
?>

	<body>
		<form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method = "post">
			<input type = "hidden" name = "name" value = "<?php echo trim($_GET["name"]); ?>" />
			<p> Are you sure you want to delete this account? </p><br>
			<input type = "submit" name = "btnsubmit" value = "Yes">
			<a href = "manage_accounts.php">No</a>
		</form>
	</body>



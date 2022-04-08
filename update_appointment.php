<?php
    include_once('connection.php');
    session_start();
    if(isset($_GET['update'])){
        $id = $_GET['update'];
        $sql = "SELECT * FROM appointment WHERE appointmentId = '$id'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) <= 0){
            header('location: manage_appointments.php');
        } 
    } else {
        header('location: manage_appointments.php');
    }
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | Update Appointment </title>
</head>
<body>
<?php include "navbar/navbar-admin.php"; ?>
	<div class="container-fluid row">	
            <!-- CARD -->
			<div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 col-md-8">
				<div class="mt-5">
                    <h5 class="fw-bold my-3">Update Appointment</h5>
					<div class="card-body">
						<form action = "update_appointment_process.php" method="POST">
							<div class="row">
                            	<div class="mb-3 col-6">
                                    <input type="text" class="form-control" value="<?php echo $id;?>" name="updateApptId" hidden required>
									<input type="text" class="form-control" value="Token ID: <?php echo $id;?>" name="" disabled required>
								</div>
								<div class="mb-3 col-6">
									<select name="updateApptStatus" class="form-select" required>  
										<option value = "" selected="true" disabled="disabled">Select Status</option> 
										<option value = "Pending">Pending</option>
										<option value = "Verified">Verified</option>
                                        <option value = "Finished">Done</option>
                                        <option value = "Cancelled">Cancelled</option>
									</select>
								</div>	
                                <div class = "mb-3 col-6">
                                    <input type = "submit" class= "form-control btn btn-primary" name = "btnUpdateAppointment" value = "Save">
                                </div>
                                <div class = "mb-3 col-6">
                                    <a href = "manage_appointments.php" class="form-control btn btn-danger">Cancel</a>
                                </div>	
							</div>						
						</form>
					</div>		
				</div>
			</div>	
	</div>
</body>
</html>
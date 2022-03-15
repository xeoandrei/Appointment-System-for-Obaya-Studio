<?php
require_once "connection.php";
session_start();
//check if the session contains data
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email == false && $password == false){
    header('Location: index.php');
}

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
<?php
include 'navbar/navbar-admin.php';
$sql = "SELECT * FROM customer INNER JOIN appointment ON customer.appointmentId = appointment.appointmentId";  
$result = mysqli_query($con, $sql); ?>
<div class="container">                  
                <div class="table-responsive">  
                     <table class="table table-sm">  
                          <tr>  
                               <th>Customer ID</th>  
                               <th>Name</th>
                               <th>Email</th>  
                               <th>Contact</th>
                               <th>Service</th>  
                               <th>Date Time</th>  
                               <th>Appointment ID</th>    
                               <th>Status</th>
                               <th>Action</th>      
                          </tr>  
                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["customerId"];?></td>  
                               <td><?php echo $row["name"]; ?></td> 
                               <td><?php echo $row["email"]; ?></td>  
                               <td><?php echo $row["contact"]; ?></td>
                               <td><?php echo $row["service"]; ?></td>
                               <td><?php echo $row["datetime"]; ?></td>
                               <td><?php echo $row["appointmentId"]; ?></td>   
                               <td><?php echo $row["status"]; ?></td>
                               <td>
                               <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                            $apptId = $row["appointmentId"];
                                            if($row['status']=='Pending'){
                                                echo '<li><a class="dropdown-item" href="verify_appointment.php?verify=' . $row["appointmentId"] . '">Verify</a></li>';
                                            }
                                        ?>            
                                        <?php
                                        echo '<li><a class="dropdown-item" href="delete_appointment.php?delete=' . $row['appointmentId'] . '">Delete</a></li>';
                                        ?>
                                    </ul>
                                    </div>
                               </td>
                          </tr>  
                          <?php  
                               }  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>
</body>
</html>
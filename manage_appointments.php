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
$sql = "SELECT * FROM customer INNER JOIN appointment ON customer.appointmentId = appointment.appointmentId ";  
$result = mysqli_query($con, $sql); ?>
     <div class="container">
          <div class="col-lg-12 col-md-12">
                  <div class="card shadow p-3  bg-body rounded">
                      <div class="card-header bg-dark text-white py-3">
                          Appointments
                      </div>
                    <div class="card-body">
                         <?php
                         if(isset($_SESSION['notify-success'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['notify-success'] . 
                              '</div>';
                              unset($_SESSION['notify-success']);
                         }elseif(isset($_SESSION['notify-cancelled'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['notify-cancelled'] . 
                              '</div>';
                              unset($_SESSION['notify-cancelled']);
                         }elseif(isset($_SESSION['verify-appointment'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['verify-appointment'] . 
                              '</div>';
                              unset($_SESSION['verify-appointment']);
                         }elseif(isset($_SESSION['done-appointment'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['done-appointment'] . 
                              '</div>';
                              unset($_SESSION['done-appointment']);
                         }elseif(isset($_SESSION['cancel-appointment'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['cancel-appointment'] . 
                              '</div>';
                              unset($_SESSION['cancel-appointment']);
                         }elseif(isset($_SESSION['update-appointment'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['update-appointment'] . 
                              '</div>';
                              unset($_SESSION['update-appointment']);
                         }elseif(isset($_SESSION['delete-appointment'])){
                              echo'<div class="alert alert-success text-center">
                                   ' . $_SESSION['delete-appointment'] . 
                              '</div>';
                              unset($_SESSION['delete-appointment']);
                         }
                         ?>
                         <div class="table table-responsive">
                              <table class="table table-sm">
                                   <tr>
                                        <th>Customer ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>Service</th>
                                        <th>Schedule</th>
                                        <th>Appointment ID</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Notify</th>
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
                                                  <button class="btn btn-primary dropdown-toggle" type="button"
                                                       id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                       Action
                                                  </button>
                                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                  <?php
                                                            $apptId = $row["appointmentId"];
                                                            if($row['status']=='Pending'){
                                                                 echo '<li><a class="dropdown-item" href="verify_appointment.php?verify=' . $row["appointmentId"] . '" onclick="return confirm(\'Change status of appointment to Verified?\')">Verify</a></li>';
                                                                 echo '<li><hr class="dropdown-divider"></li>';
                                                            }elseif($row['status']=='Verified'){
                                                                 echo '<li><a class="dropdown-item" href="done_appointment.php?done=' . $row["appointmentId"] . '" onclick="return confirm(\'Change status of appointment to Finished?\')">Done</a></li>';
                                                                 echo '<li><hr class="dropdown-divider"></li>';
                                                            }elseif($row['status']!='Cancelled'){
                                                            echo '<li><a class="dropdown-item" href="cancel_appointment.php?cancel=' . $row['appointmentId'] . '" onclick="return confirm(\'Are you sure you want to cancel this appointment?\')">Cancel</a></li>';
                                                            echo '<li><hr class="dropdown-divider"></li>';
                                                            }
                                                            echo '<li><a class="dropdown-item" href="update_appointment.php?update=' . $row['appointmentId'] . '">Update Status</a></li>';
                                                            echo '<li><hr class="dropdown-divider"></li>';
                                                            echo '<li><a class="dropdown-item" href="delete_appointment.php?delete=' . $row['appointmentId'] . '" onclick="return confirm(\'Are you sure you want to delete this appointment?\')">Delete</a></li>';
                                                  ?>
                                                  </ul>
                                             </div>
                                        </td>
                                        <td>
                                             <?php 
                                             if($row['status']=='Verified'){
                                                  echo '<a class="btn btn-success" href="notify_verified.php?notifverify=' . "notifverify" . "&" . "id" . "=" . $row['appointmentId'] . "&" . "email" . "=" . $row["email"] . '" onclick="return confirm(\'Notify user of Verified appointment?\')">Notify</a>';
                                             }elseif($row['status']=='Cancelled'){
                                                  echo '<a class="btn btn-danger" href="notify_cancelled.php?notifcancel=' . "notifcancel" . "&" . "id" . "=" . $row['appointmentId'] . "&" . "email" . "=" . $row["email"] . '" onclick="return confirm(\'Notify user of Cancelled appointment?\')">Notify</a>';
                                             }
                                        }
                                   }
                                             ?>
                                        </td>
                                   </tr>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</body>
</html>
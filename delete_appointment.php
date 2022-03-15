<?php
include_once('connection.php');
 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM appointment WHERE appointmentId = '$id'";
    $sql2 = "DELETE FROM customer WHERE appointmentId = '$id'";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);

    if(!$result || !$result2){
        die('Delete appointment failed.');
    } else {
        header('Location: manage_appointments.php');
    }

}
?>

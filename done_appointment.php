<?php
include_once('connection.php');
 
if(isset($_GET['done'])){
    $id = $_GET['done'];
    $sql= "UPDATE appointment SET status='Finished' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
    } else {
        header('Location: manage_appointments.php');
    }
}
?>
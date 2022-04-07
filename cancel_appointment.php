<?php
include_once('connection.php');
 
if(isset($_GET['cancel'])){
    $id = $_GET['cancel'];
    $sql= "UPDATE appointment SET status='Cancelled' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
    } else {
        header('Location: manage_appointments_cancelled.php');
    }
}
?>
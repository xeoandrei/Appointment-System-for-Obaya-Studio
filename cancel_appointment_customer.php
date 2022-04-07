<?php
include_once('connection.php');
session_start();
if(isset($_GET['cancelcus'])){
    $id = $_GET['cancelcus'];
    $sql= "UPDATE appointment SET status='Cancelled' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
    } else {
        $_SESSION['cancelapptmsg'] = 'You have successfully cancelled your appointment.';
        header('Location: appointment_details.php');
    }
}
?>
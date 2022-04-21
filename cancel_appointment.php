<?php
include_once('connection.php');
session_start();

if(isset($_GET['cancel'])){
    $id = $_GET['cancel'];
    $sql= "UPDATE appointment SET status='Cancelled' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
        $_SESSION['cancel-appointment'] = 'You have failed to change status to Cancelled of appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['cancel-appointment'] = 'You have successfully cancelled appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
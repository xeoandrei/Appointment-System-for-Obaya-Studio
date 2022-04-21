<?php
include_once('connection.php');
session_start();
 
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql= "DELETE FROM appointment WHERE appointmentId = '$id'";
    $sql2 = "DELETE FROM customer WHERE appointmentId = '$id'";
    $result = mysqli_query($con, $sql);
    $result2 = mysqli_query($con, $sql2);

    if(!$result || !$result2){
        die('Delete appointment failed.');
        $_SESSION['delete-appointment'] = 'You have failed to delete appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['delete-appointment'] = 'You have successfully deleted appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }

}
?>

<?php
include_once('connection.php');
session_start();
 
if(isset($_GET['verify'])){
    $id = $_GET['verify'];
    $sql= "UPDATE appointment SET status='Verified' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
        $_SESSION['verify-appointment'] = 'You have failed to verified appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['verify-appointment'] = 'You have successfully verified appointment with Token ID: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
<?php
include_once('connection.php');
session_start();
 
if(isset($_GET['done'])){
    $id = $_GET['done'];
    $sql= "UPDATE appointment SET status='Finished' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
        $_SESSION['done-appointment'] = 'You have failed to change status to Finished of appointment with Client Code: ' . $id . '!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['done-appointment'] = 'You have successfully changed status of appointment with Client Code: ' . $id . ' to Finished!';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
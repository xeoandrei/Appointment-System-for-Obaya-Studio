<?php
include_once('connection.php');
session_start();
if(isset($_POST['btnUpdateAppointment'])){
    $id = $_POST['updateApptId'];
    $status = $_POST['updateApptStatus'];
    $sql= "UPDATE appointment SET status='$status' WHERE appointmentId='$id'";
    $result = mysqli_query($con, $sql);

    if(!$result){
        die('Update failed.');
        $_SESSION['update-appointment'] = 'You have failed to change status to ' . $status . ' of appointment with Token ID: ' . $id . '!';
        header('location: manage_appointments.php');
    } else {
        $_SESSION['update-appointment'] = 'You have successfully changed status to ' . $status . ' of appointment with Token ID: ' . $id . '!';
        header('location: manage_appointments.php');
    }
} else {
    header('location: manage_appointments.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    asdasdasds
</body>
</html>
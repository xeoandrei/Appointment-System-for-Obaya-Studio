<?php
include_once('connection.php');
 
if(isset($_GET['notifcancel'])){
    $id = $_GET['id'];
	$email = $_GET['email'];

    $subject = "Obaya Notification for Cancelled Appointment";
    $message = "Your Token Id is $id." . " Your appointment status is now Cancelled.";
    $sender = "From: sammygarma26@gmail.com";
    if(mail($email, $subject, $message, $sender)){
        $_SESSION['email'] = $email;
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $errors['otp-error'] = "Failed while sending notification!";
    }  
}
?>
<?php
include_once('connection.php');
session_start();
 
if(isset($_GET['notifcancel'])){
    $id = $_GET['id'];
	$email = $_GET['email'];
    
    $subject = "Obaya Notification for Cancelled Appointment";

    // To send HTML mail, the Content-type header must be set
    // Create email headers
    $headers = [
        'MIME-Version' => '1.0',
        'Content-type' => 'text/html; charset=utf8',
        'From' => 'Obaya Studio sammygarma26@gmail.com',
        'Reply-To' => 'sammygarma26@gmail.com',
        'X-Mailer' => 'PHP/' . phpversion()
    ];

    
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p>Good day! We are very sorry but your appointment with the Client Code: '. "$id," . ' was cancelled and proceed as scheduled.</p>';
    $message .= '</body></html>';

    if(mail($email, $subject, $message, $headers)){
        $_SESSION['notify-cancelled'] = 'You have successfully notified ' . $email . ' for his/her cancelled appointment.';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $errors['otp-error'] = "Failed while sending notification!";
    }  
}
?>
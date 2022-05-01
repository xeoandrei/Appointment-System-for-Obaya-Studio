<?php
include_once('connection.php');
session_start();
 
if(isset($_GET['notifverify'])){
    $id = $_GET['id'];
	$email = $_GET['email'];

    $subject = "Obaya Notification for Confirmed Appointment";

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
    $message .= '<p style="color:black;">Good day! Your appointment status has been confirmed. You can view your appointment details ' . '<a href="http://localhost/Obaya-Studio/view_appointment.php">here</a>' . ' by entering your Client Code:' . " $id." . '</p>';
    $message .= '</body></html>';
    
    if(mail($email, $subject, $message, $headers)){
        $_SESSION['notify-success'] = 'You have successfully notified ' . $email . ' for his/her verified appointment.';
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }   
    else
    {
        $errors['otp-error'] = "Failed while sending notification!";
    }  
}
?>
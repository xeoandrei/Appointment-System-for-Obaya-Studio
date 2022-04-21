<?php
include_once('connection.php');
 
if(isset($_GET['notifcancel'])){
    $id = $_GET['id'];
	$email = $_GET['email'];
    
    $sender = "From: sammygarma26@gmail.com";
    $subject = "Obaya Notification for Cancelled Appointment";

    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Create email headers
    $headers .= 'From: '.$sender."\r\n".
    'Reply-To: '.$sender."\r\n" .
    'X-Mailer: PHP/' . phpversion();

    
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<p>Good day! We are very sorry but your appointment with the Token ID: '. "$id," . ' did not went as scheduled.</p>';
    $message .= '</body></html>';

    if(mail($email, $subject, $message, $headers)){
        $_SESSION['email'] = $email;
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
        $errors['otp-error'] = "Failed while sending notification!";
    }  
}
?>
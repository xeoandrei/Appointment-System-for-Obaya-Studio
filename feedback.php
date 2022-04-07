<?php
session_start();
include "connection.php";
$token=$_SESSION['feedbackTokenId'];  
        if(isset($_POST['rating'])){    
            $name = $_POST['name'];
            $rating = $_POST['rating'];
            $feedback = $_POST['feedback'];
            $tokenId = $_POST['tokenId'];
            $query ="Insert into feedback (rating, feedback, name,appointmentId) VALUES( ?, ?, ?, ?)";
            unset($_SESSION['feedbackTokenId']);
            $stmt = $con->prepare($query);
            $stmt->bind_param('isss', $rating, $feedback, $name, $token);
            $stmt->execute();
            header('Location: success_feedback.php');
            $stmt->close();
            $con->close();
    }

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/e54d8b55e8.js" crossorigin="anonymous"></script>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Ubuntu&display=swap"
    rel="stylesheet">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Obaya Studio | Feedback</title>
</head>
<body>

        
  
</body>
</html>
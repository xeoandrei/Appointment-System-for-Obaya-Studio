<?php
    include 'connection.php';
    session_start();
    if(isset($_POST['bookappt'])){

        $datetime = $_SESSION['datetime'];
        $customerName = $_SESSION['customerName'];
        $customerEmail = $_SESSION['customerEmail'];
        $contact = $_SESSION['contact'];

        $service = $_POST['service'];

        $query = "INSERT INTO appointment(datetime, status) ";
        $query .= "VALUES ('$datetime', 'Pending')";

        $result = mysqli_query($con, $query);
        if(!$result){
            die('QUERY FAILED! ' . mysql_error());
        } else {
            $result = mysqli_query($con, "SELECT appointmentId FROM appointment WHERE datetime = '$datetime'");
            while ($row = mysqli_fetch_array($result)) 
            {
                $id_val = $row['appointmentId'];  
            }
            $submitCustDetails = "INSERT INTO customer(name, email, contact, service, appointmentId) ";
            $submitCustDetails .= "VALUES ('$customerName', '$customerEmail', '$contact', '$service', '$id_val')";
            $result = mysqli_query($con, $submitCustDetails);
            if(!$result){
                die('QUERY FAILED! ' . mysql_error());
            } else {
                header('location: submit_success.php');
            }
        }
    }

    print_r($_SESSION);
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
    
</body>
</html>
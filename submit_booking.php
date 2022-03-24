<?php
    include 'connection.php';
    session_start();

    function generateCode($limit){
        $code = '';
        for($i = 0; $i < $limit; $i++) { $code .= mt_rand(0, 9); }
        return $code;
        }

    if(isset($_POST['bookappt'])){

        $datetime = $_SESSION['datetime'];
        $customerName = $_SESSION['customerName'];
        $customerEmail = $_SESSION['customerEmail'];
        $contact = $_SESSION['contact'];

        $service = $_POST['service'];
        
        $tokenId = generateCode(12);
        $tokenId_check = "SELECT * FROM appointment WHERE appointmentId = '$tokenId'";
        $tokenId_checkResult = mysqli_query($con, $tokenId_check);

        if(mysqli_num_rows($tokenId_checkResult) > 0){
            $tokenId = generateCode(12);
        }

        $_SESSION['tokenId'] = $tokenId;

        $query = "INSERT INTO appointment(appointmentId, datetime, status) ";
        $query .= "VALUES ('$tokenId', '$datetime', 'Pending')";

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

<?php
    $conn = new PDO('mysql:host=localhost;dbname=obaya_studio', 'root', '');
    include 'connection.php';
    session_start();

    function generateCode($limit){
        $code = '';
        for($i = 0; $i < $limit; $i++) {
            $code .= mt_rand(0, 9);
        }
        return $code;
    }

    $tokenId = generateCode(12);
    $tokenId_check = "SELECT * FROM appointment WHERE appointmentId = '$tokenId'";
    $tokenId_checkResult = mysqli_query($con, $tokenId_check);

    if(mysqli_num_rows($tokenId_checkResult) > 0){
        $tokenId = generateCode(12);
    }

    $_SESSION['tokenId'] = $tokenId;

    $datetime = $_SESSION['datetime'];
    $name = $_SESSION['customerName'];
    $email = $_SESSION['customerEmail'];
    $contact = $_SESSION['contact'];

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

    foreach($_POST['service'] as $key => $value){
        $sql = "INSERT INTO customer(name, email, contact, service, appointmentId) VALUES ('$name', '$email', '$contact', :service, '$id_val')";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'service' => $value
        ]);
    }
}


        
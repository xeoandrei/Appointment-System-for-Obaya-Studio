<?php
    include 'connection.php';
    session_start();
    if(isset($_POST['verifyappt'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['contact'] = $_POST['contact'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $_SESSION['datetime'] = $date . ' ' . $time;
        $datetime = $_SESSION['datetime'];
        $datetime_check = "SELECT * FROM appointment WHERE datetime = '$datetime'";
        $res = mysqli_query($con, $datetime_check);
        
        if(mysqli_num_rows($res) > 0){
            $errors['datetime'] = "Scheduled that you have selected is already taken.";
            header('Location: verifyappt.php');
        } else {
            echo 'schedule available';
        }
    } else {
        header('Location: check_schedule.php');
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | Book Appointment</title>
</head>
<body>
    <?php include "navbar/navbar.php"; ?>
    <div class="container-fluid row">
            <!-- CARD -->
            <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 ">
                <div class="mt-5">
                    <h5 class="fw-bold my-3">Book Appointment</h5>
                    <div class="card-body">
                    <!-- FORM -->
                        <form action="submit_booking.php" method="POST">
                            <div class="row">
                                <input type="text" class="form-control mb-3" name="service" placeholder="Service" required>
                                <input type="submit" name="bookappt" class="form-control mb-3 btn btn-primary">
                            </div>
                        </form>    
                    </div>
                </div>
            </div>


    
</body>
</html>

<?php
    include 'connection.php';
    session_start();

    if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR')){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) {
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
    }
?>
<!DOCTYPE html>
<html>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/login.css">

    <title>Obaya Studio | View Appointment</title>
</head>

<body>
    <?php include "navbar/navbar.php"; ?>

    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-xl-6 col-lg-8">
            <div class="card-body">
                <form action="appointment_details.php" method="post">
                    <div class="mt-5">
                        <h5 class="fw-bold my-3">View Appointment</h5>
                    </div>
                    <?php
                        if(isset($_SESSION['invalidTokenId'])){
                            echo   '<div class="alert alert-danger text-center">
                                        ' . $_SESSION['tokeniderror'] . 
                                    '</div>';
                            unset($_SESSION['tokeniderror']);
                        }
                    ?>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="tokenId" placeholder="Token Id" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control btn btn-success" type="submit" name="viewAppointmentSubmit" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <?php include "footer/footer-nobg.php"; ?>
</body>

</html>

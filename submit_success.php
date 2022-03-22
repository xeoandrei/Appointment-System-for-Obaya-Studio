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

    <title>Obaya Studio | Home</title>
</head>

<body>
    <?php include "navbar/navbar.php"; ?>

    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-xl-6 col-lg-8">
            <div class="card-body">
                <div class="my-4">
                    <img src="images/check.png" style="height:75px;" alt="">
                </div>
                <h6 class="mt-3">Your token id is: <?php echo $_SESSION['tokenId']; ?></h6>
                <h5 class="my-3">Please wait for your booking to be approved within 24 hours.</h5>
                <p>Click this <a href="view_appointment.php">link</a> to check your appointment details.</p>
            </div>
        </div>
    </div>
    </div>

    <?php include "footer/footer-nobg.php"; ?>
</body>

</html>

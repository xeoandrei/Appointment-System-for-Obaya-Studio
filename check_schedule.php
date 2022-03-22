<?php 
    include 'connection.php';
    session_start();
    unset($_SESSION['tokenId']); //remove Token ID from session.
    if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR')){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) {
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
    }
    
    $NewDate=Date('Y-m-d', strtotime('+1 days')); //Set date available 1 day from today.
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | Book Appointment</title>
</head>

<body>
    <?php include "navbar/navbar.php"; ?>
    <div class="container-fluid row">
        <!-- CARD -->
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-6 col-md-8">
            <div class="mt-5">
                <h5 class="fw-bold">Book Appointment</h5>

                <div class="card-body">
                    <!-- FORM -->
                    <form action="book_appointment.php" method="POST">
                        <?php
                        if(isset($_SESSION['schederror'])){
                            echo   '<div class="alert alert-danger text-center">
                                        ' . $_SESSION['schederror'] . 
                                    '</div>';
                            unset($_SESSION['schederror']);
                        } elseif(isset($_SESSION['emailerror'])){
                            echo   '<div class="alert alert-danger text-center">
                                        ' . $_SESSION['emailerror'] . 
                                    '</div>';
                            unset($_SESSION['emailerror']);
                        } elseif(isset($_SESSION['contactnumerror'])){
                            echo   '<div class="alert alert-danger text-center">
                                        ' . $_SESSION['contactnumerror'] . 
                                    '</div>';
                            unset($_SESSION['emailerror']);
                        }
                        ?>
                        <div class="row">
                            <div class="mb-3 col-6">
                                <input type="text" class="form-control" id="inputName" placeholder="Name" name="name" required>
                            </div>
                            <div class="mb-3 col-6">
                                <input type="date" class="form-control" name="date" min="<?php echo $NewDate; ?>" required>
                            </div>
                            <div class="mb-3 col-6">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-3 col-6">
                                <select name="time" class="form-select" id="" required>
                                    <option value="" selected="true" disabled="disabled">Select Time</option>  
                                    <option value="8:00:00">8:00AM</option>
                                    <option value="9:00:00">9:00AM</option>
                                    <option value="10:00:00">10:00AM</option>
                                    <option value="11:00:00">11:00AM</option>
                                    <option value="12:00:00">12:00PM</option>
                                    <option value="13:00:00">1:00PM</option>
                                    <option value="14:00:00">2:00PM</option>
                                    <option value="15:00:00">3:00PM</option>
                                    <option value="16:00:00">4:00PM</option>
                                    <option value="17:00:00">5:00PM</option>
                                </select>
                            </div>
                            <div class="mb-3 col">
                                <input type="text" class="form-control" id="inputContact" placeholder="Contact Number" name="contact" maxlength="11" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control btn btn-success" type="submit" name="verifyappt" value="Next" o>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</body>
</html>

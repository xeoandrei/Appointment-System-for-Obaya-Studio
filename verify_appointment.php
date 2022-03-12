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
            <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-lg-8 ">
                <div class="mt-5">
                    <img src="images/salon.png" style="height:75px;" alt="">
                    <h5 class="fw-bold my-3">Book Appointment</h5>
                    <div class="card-body">
                    <!-- FORM -->
                    <form action="book_appointment.php" method="POST">
                        <div class="row">
                                <div class="mb-3 col-6">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <input type="date" class="form-control" name="date" id="inputDate" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <input type="time" class="form-control" name="time" id="inputTime" min="8:00" max="16:00" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <input type="text" class="form-control" id="inputContact" placeholder="Contact Number" required>
                                </div>
                                <div class="mb-3 col-6">
                                    <select class="form-select" aria-label="Default select example" required>
                                        <option selected>Number of Clients</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input class="form-control btn btn-success" type="submit" name="submit" value="Next">
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
</body>
</html>

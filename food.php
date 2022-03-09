<!DOCTYPE html>

<?php
    session_start();
    if(isset($_SESSION['email'])){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } else {

    }
?>

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

    <title>Obaya Studio | Food</title>
</head>
<body>
        <section id="firstPage"> 
            <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
                <a class="navbar-brand mx-5" href="index.php">
                    <img src="images/logo3.png" style="height: 90px; margin-right: 1em;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
            
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                    <a class="dropdown-item" href="services_men.html">For Men</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="services_women.html">For Women</a>
                                </li>
                            </ul>
                        </li>
    
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">
                                Book
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                    <a class="dropdown-item" href="verify_appointment.html">Book Appointment</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="#">Cancel Appointment</a>
                                </li>
                            </ul>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Food</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About Us</a>
                        </li>
    
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <?php
                            if(isset($_SESSION['email'])){
                                echo   '<li class="nav-item mx-3 my-3">
                                            <a href="logout.php" class="btn btn-danger me-3">Logout</a>
                                        </li>';
                            } else {
                                echo   '<a class="nav-link d-lg-none" href="login.php">
                                            Log-In
                                        </a>
                                        <a class="nav-link d-none d-lg-block" href="login.php">
                                            <img src="images/user.png" style="height:40px;" alt="">
                                        </a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
        </nav>

            <section id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <img src="images/service1.jpg" class="card-img-top">
                                <div class="card-body">
                                  <h5 class="card-title">Food 1</h5>
                                </div>
                              </div>
                        </div>
    
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <img src="images/service2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">Food2</h5>
                                </div>
                              </div>
                        </div>
    
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <img src="images/service3.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">food3</h5>
                                </div>
                              </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <img src="images/service1.jpg" class="card-img-top">
                                    <div class="card-body">
                                      <h5 class="card-title">food4</h5>
                                    </div>
                                  </div>
                            </div>
                    
                    <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <img src="images/service2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">food5</h5>
                                </div>
                              </div>
                        </div>
                        
                    <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <img src="images/service2.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">food6</h5>
                                </div>
                              </div>
                        </div>
            
                    <div class="container" style="margin-top: 3rem;">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">

                            </div>
                    
                    <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                  <h5 class="card-title">Grab/Food Panda Link</h5>
                                </div>
                              </div>
                        </div>
                        
                    <div class="col-lg-4 col-sm-6">
                        
                    </div>
            </div>               
        </section>
        <section id="footer" class="py-4">
            <div class="sticky-bottom">
                <a class="mx-2 my-3"href="" style="color:#959fa3;"><i class="fab fa-twitter"></i></a>
                <a class="mx-2 my-3" href="" style="color:#959fa3;"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2 my-3" href="" style="color:#959fa3;"><i class="fab fa-instagram"></i></a>
                <a class="mx-2 my-3" href="" style="color:#959fa3;"><i class="fas fa-envelope"></i></a>
                <p class="mx-2 my-3">© Copyright 2021 Obaya</p>
          </div>
        </section>
    </body>
    </html>
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
    <?php include "navbar/navbar.php"; ?>
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
        <?php include "footer/footer.php"; ?>
    </body>
    </html>
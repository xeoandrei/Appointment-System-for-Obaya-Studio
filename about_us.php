<!DOCTYPE html>
<?php
    include "config.php";
    session_start();
    if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR')){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) {
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
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
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
    
    <title>Obaya Studio | About Us</title>
</head>

<body>
       
    <section id="firstPage" class="container-fluid"> 
        <?php include "navbar/navbar-aboutus.php"; ?>

        <div class="row marginTop">
            <div class="col-lg-6">
                    <h1 class="fw-bold whiteText">About Us</h1>
                        <div class="mt-3">
                        <p class="whiteText">
                        The origin of the word Obaya can be traced back to Sagada. It means a period of rest, 
                        a sacred day for resting to bless the coming season of harvest. 
                        Relaxation is an important aspect in the life of people. We used the word as 
                        the cornerstone of our cause, to deliver relaxation at its highest form, through hair cosmetology. </p>
                        </div>
                        <div class="whiteText">
                        Although the initial plan was to open a hair studio, our fondness for coffee sparked an idea 
                        of combining the two concepts. Hence, Obaya Studio Salon and Coffee Bar was made, making a venue 
                        where we can serve the ultimate form of relaxation through Hair Cosmetology with the Art of Espresso.
                        We are deeply rooted in delivering the signature “Obaya Experience” to our clients. 
                        It’s more than just styling hair and making drinks, it’s the signature experience that we deliver. 
                        </div>
                        <div class="whiteText mt-2"> 
                        Here at Obaya Studio, expect only the best. 
                        </div>           
                            <form>
                                <a href="feedback_verify.php" class="btn btn-outline-light btn-lg my-5"><i class="fas fa-book"></i>
                                    Send Feedback
                                </a>
                            </form>  
            </div>        
            <div class="col-lg-6 mobMargin">
            <div class="card">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="images/AboutUsImages/Square1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/AboutUsImages/Square2.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/AboutUsImages/Square3.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/AboutUsImages/Square4.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                            <img src="images/AboutUsImages/Square5.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                    </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
            <h1 class="fw-bold whiteText">Contact Us</h1>
                <div class="mt-3">
                        <p class="whiteText">
                        <i class="fas fa-location-arrow"></i> Address: Excelsis Building, 6H5H+RJP, Mabalacat, Pampanga
                        </p>
                        <p class="whiteText">
                        <i class="fas fa-hourglass"></i> Hours: Opens at 8AM ⋅ Closes at 6PM
                        </p>
                        <p class="whiteText">
                        <i class="fas fa-phone"></i> Phone: 0906 404 2623
                        </p>
                        <p class="whiteText">
                        <i class="fas fa-envelope"></i> Email: <a class="whiteText text-decoration-none" href="mailto:team.obayastudio@gmail.com" > team.obayastudio@gmail.com</a>
                        </p>
                        <p class="whiteText">
                        <i class="fab fa-facebook-messenger"></i> Messenger: <a class="whiteText text-decoration-none" text-decoration: none; href="https://www.facebook.com/messages/t/108422251306606"> Obaya Studio </a>
                        </p>
                        <p class="whiteText">
                        <i class="fa fa-instagram"></i> Instagram: <a class="whiteText text-decoration-none" text-decoration: none; href="https://www.instagram.com/obayastudio/"> Obaya Studio </a>
                        </p>
                </div>
            </div>
            <div class="col-lg-6">
                    <h1 class="fw-bold whiteText">Location</h1>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15400.26112807597!2d120.579074!3d15.2095934!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa2bb8477c37b249!2sObaya%20Studio%20Salon%20%2B%20Coffee%20Bar!5e0!3m2!1sen!2sph!4v1650446197789!5m2!1sen!2sph" width="100%" height="80%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <?php include "footer/footer.php"; ?>     
</body>
</html>
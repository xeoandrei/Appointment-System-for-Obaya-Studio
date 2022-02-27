
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
    <link rel="stylesheet" href="css/login.css">

    <title>Obaya Studio | Home</title>
</head>
<body>
    <section id = firstPageMainBG>

    <section id="firstPage" class="container-fluid"> 
        <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
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
                            <a class="nav-link" href="about_us.html">About Us</a>
                        </li>
                    </ul>
                    
                </div>

                
        </nav>
 
    
        <div class="row marginTop">
            <div class="col-lg-6">
        <a class="navbar-brand" href="login.html">
            <img src="images/logo.png" style="height: 400px;">
         </a><br>
        </div>
        <div class="col-lg-6 mobMargin">
            <h1 style="float: right;">STAFF LOGIN</h1><br><br>
        <form action="" method="POST">
            <div class="mb-3">
              <label for="txtemail" class="form-label">Email</label>
              <input type="text" name="username" class="form-control" id="txtemail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="txtpassowrd"  class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="txtpassword"><br>
              <input type="submit" name="submit" value="Login" class="btn btn-light btn-lg myButton3"><br>
        <a class="loginText" href="#">Forgot Password?</a> 
            </div>
          </form>
        
        </div>
    </div>
    </section>
    </section>
    </body>
    </html>
<?php

if(isset($_POST['submit']))
{
//     //Process for Login
// //1. Get the Data from Login form
//     $username = $_POST['username'];
//     $password = $_POST['password'];
// //2. SQL to check whether the user with username and password exists or not
//     $sql = "SELECT * FROM tbl_accounts WHERE username='$username' AND password='$password'";
// //3. Execute the Query
//     $conn = mysqli_connect('localhost', 'root', '');
//     $dbselect = mysqli_connect($conn, 'obaya_studio');
//     $res = mysqli_query($conn, $sql);

// //4. Count rows to check whether the user exists or not
//     $count = mysqli_num_rows($res);

//     if($count==1)
//     {
//     //User Available and Login Success
//     $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
//     }
// else{
//     echo "login error";
//     //User not Available and Login FAIL
}



}

?>
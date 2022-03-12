<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
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
    <link rel="stylesheet" href="css/management.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
                <a class="navbar-brand ms-3" href="index.php">
                    <img src="images/logo3.png" style="height: 90px; margin-right: 2em;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto">

                        <li class="nav-item">
                            <a class="nav-link" href="management.php">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Appointments</a>
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
    
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Food</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="food.html">Feedback</a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="manage_accounts.php">Staff</a>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger me-3">Logout</a>
                        </li>
                    </ul>
                </div>  
        </nav>
        <div class="card w-25 h-50 mx-auto shadow p-3 mb-5 bg-body rounded">
            <div class="mt-5">
                <img src="images/salon.png" style="height:75px;" alt="">
                <h5 class="fw-bold my-3">Create Account</h5>
            </div> 
            <div class="card-body">
            <form action="signup-user.php" method="POST" autocomplete="">
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="mb-3">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" minlength="8" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <class="form-control"><select name = "cmbusertype" id = "cmbusertype" class="form-control" required>
			            <option value = "">--User Type--</option>
			            <option value = "ADMINISTRATOR">Administrator</option>
			            <option value = "STAFF">Staff</option>
		                </select><br>
                    <div class="mb-4">
                        <input class="form-control btn btn-primary" type="submit" name="signup" value="Add New Account">
                    </div>
                </form>
            </div>
        </div>
        
</body>
</html>
<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
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
    <?php include "navbar/navbar.php"; ?>
        <div class="container-fluid row">
            <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-xl-4 col-lg-6">
                <div class="mt-5">
                    <img src="images/salon.png" style="height:75px;" alt="">
                    <h5 class="fw-bold my-3">Forgot Password</h5>
                    <form action="forgot-password.php" method="POST" autocomplete="">
                        <?php
                            if(count($errors) > 0){
                                ?>
                                <div class="alert alert-danger text-center">
                                    <?php 
                                        foreach($errors as $error){
                                            echo $error;
                                        }
                                    ?>
                                </div>
                                <?php
                            }
                        ?>
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" placeholder="Enter email address" required value="<?php echo $email ?>">
                        </div>
                        <div class="mb-4">
                            <input class="form-control btn btn-primary" type="submit" name="check-email" value="Continue">
                        </div>
                    </form>
                </div> 
            </div>
        </div>
        
    <?php include "footer/footer-nobg.php"; ?>
</body>
</html>
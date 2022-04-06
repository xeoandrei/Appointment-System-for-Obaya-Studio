<?php require_once "controllerUserData.php"; ?>
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
    <?php include "navbar/navbar-login.php"; ?>

    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded col-xl-6 col-lg-8">
            <div class="mt-5">
                <img src="images/salon.png" style="height:75px;" alt="">
                <h5 class="fw-bold my-3">Login</h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <?php
                            if(count($errors) > 0){
                        ?>
                    <div class="alert alert-danger text-center">
                        <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                            }
                            ?>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="email" name="email" placeholder="Email" required
                            value="<?php echo $email ?>">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control btn btn-success" type="submit" name="login" value="Login">
                    </div>
                    <a href="signup-user.php" class="btn btn-primary">Create Account</a>
                    <div class="link loginText mb-4"><a href="forgot-password.php">Forgot password?</a></div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <?php include "footer/footer-nobg.php"; ?>
</body>

</html>

<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login.php');
}
?>
<!-- <?php
    include "config.php";
    if(($_SESSION['usertype'] == 'ADMINISTRATOR')){
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
    } else {
        echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Staff Panel</a>';
    }
?> -->
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/management.css">

    <title>Obaya Studio | Home</title>
    </head>
    <body>
        <?php include 'navbar/navbar-admin.php'; ?>
        
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="card shadow p-3 mb-5 bg-body rounded">
                      <div class="card-header bg-dark text-white py-3">
                          Dashboard
                      </div>
                      <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>All Services <i class="fas fa-bars"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>All Food <i class="fas fa-pizza-slice"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>Total Appointments <i class="fas fa-book-open"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>Pending Appointments <i class="fas fa-book-open"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>Verified Appointments <i class="fas fa-book-open"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card text-center shadow-sm p-4 mb-5 bg-body rounded">
                                    <h4>Staff <i class="fas fa-users"></i></h4>
                                    <h3>4</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                
            </div>          
        </div>
</body>
</html>

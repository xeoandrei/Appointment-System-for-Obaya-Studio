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
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | About Us</title>
</head>
<body>
    <?php include "navbar/navbar.php"; ?>
        <div class="mt-5">
            <h1 class="firstPageText">About Us!</h1>
            <div class="container">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Viverra suspendisse potenti nullam ac tortor. Massa sapien faucibus et molestie ac feugiat sed lectus. Morbi non arcu risus quis varius quam quisque id diam. Integer eget aliquet nibh praesent tristique. Et egestas quis ipsum suspendisse. Eget nunc lobortis mattis aliquam faucibus purus in massa. Ullamcorper morbi tincidunt ornare massa eget egestas purus. Mattis vulputate enim nulla aliquet porttitor lacus. Mauris pharetra et ultrices neque. Lectus urna duis convallis convallis tellus id interdum velit laoreet. Ridiculus mus mauris vitae ultricies leo integer. Cras tincidunt lobortis feugiat vivamus at. Urna porttitor rhoncus dolor purus non enim praesent. Cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eget arcu dictum varius duis at consectetur. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula. Etiam erat velit scelerisque in.

Lobortis elementum nibh tellus molestie nunc non blandit massa. Libero enim sed faucibus turpis in eu mi bibendum neque. Massa placerat duis ultricies lacus sed. Fames ac turpis egestas integer eget aliquet nibh praesent tristique. Amet porttitor eget dolor morbi non arcu risus quis. Sem fringilla ut morbi tincidunt. Justo eget magna fermentum iaculis eu non diam phasellus vestibulum. Dui vivamus arcu felis bibendum ut tristique et egestas quis. Aliquam ut porttitor leo a diam sollicitudin tempor. Commodo viverra maecenas accumsan lacus vel facilisis.

Eu augue ut lectus arcu bibendum. In nulla posuere sollicitudin aliquam ultrices sagittis orci a. Lobortis feugiat vivamus at augue eget arcu dictum. Justo donec enim diam vulputate ut pharetra sit amet. Venenatis cras sed felis eget. Et netus et malesuada fames ac turpis. Libero enim sed faucibus turpis in eu mi. Placerat duis ultricies lacus sed turpis tincidunt id aliquet. Diam volutpat commodo sed egestas egestas fringilla phasellus. Tristique senectus et netus et malesuada fames. Cras sed felis eget velit. Neque ornare aenean euismod elementum nisi quis eleifend. Aliquet eget sit amet tellus cras adipiscing enim. Et netus et malesuada fames ac.

Est placerat in egestas erat imperdiet sed. Nulla at volutpat diam ut. Dis parturient montes nascetur ridiculus. Quis commodo odio aenean sed adipiscing diam donec adipiscing tristique.</p>
            </div>
            
            <form>
                <a href="feedback_verify.php" class="btn btn-outline-dark btn-lg my-5"><i class="fas fa-book"></i>
                    Send Feedback
                </a>
            </form>
        </div>
    <?php include "footer/footer.php"; ?>     
</body>
</html>
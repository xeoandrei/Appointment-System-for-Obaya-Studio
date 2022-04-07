<?php
    include 'connection.php';
    session_start();
    if(isset($_POST['submitFbTokenId'])){
        $token = $_POST['tokenId'];
        $sql = "SELECT * FROM appointment WHERE appointmentId = '$token' AND status='Finished'";
        $tokenId_checkResult = mysqli_query($con, $sql);
        if(mysqli_num_rows($tokenId_checkResult) <= 0){
            $_SESSION['tokeniderror'] = 'Token ID invalid.';
            header('Location: feedback_verify.php');
        }
        $sql2 = "SELECT * FROM feedback WHERE appointmentId ='$token'";
         $tokenId_checkResult2 = mysqli_query($con, $sql2);
         if(mysqli_num_rows($tokenId_checkResult2) > 0){
            $_SESSION['tokeniderror'] = 'You have already submitted a Feedback.';
            header('Location: feedback_verify.php');
        }
        $result = mysqli_query($con, $sql);
        $_SESSION['feedbackTokenId'] = $token;   
    } else {
        header('Location: feedback_verify.php');
    }

?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Obaya Studio | Feedback</title>
</head>
<body>

        <?php include "navbar/navbar-index.php"; ?>

        
    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
                <h2>Rate our Services</h2>
                <?php if(isset($msg)){echo $msg; } ?>
            <form action="feedback.php" method="POST">
                        <div class="form-group">
                            <label for="">Rating</label>
                            <div class="container" id="rateYo"></div>
                        </div>
                        <div class="form-group">
                            <label for="">Name(Optional)</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                        <label for="">Feedback</label>
                            <textarea class="form-control" rows = "4" placeholder="Enter feedback here..." name="feedback" required></textarea>
                            <input type="hidden" name="rating" id="rating">
                            <input type="hidden" name="tokenId" id="token Id">
                        </div>
                        <button class="form-control btn btn-success">Submit</button>
            </form>
            </div>
        </div>
</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrap.cdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script>
             $(function () {
 
                $("#rateYo").rateYo({
                fullStar: true,
                onSet: function(rating, rateYoInstance){
                    $("#rating").val(rating);
                }
                });

                });
        </script>
<?php include "footer/footer-nobg.php"; ?>
</body>
</html>
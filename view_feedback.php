<?php
session_start();
require "connection.php";
    if(isset($_POST['rating'])){
       $name = $_POST['name'];
       $rating = $_POST['rating'];
       $feedback = $_POST['feedback'];
       $query ="Insert into feedback (rating, feedback, name) VALUES(?, ?, ?)";
       $stmt = $con->prepare($query);
       $stmt->bind_param('iss', $rating, $feedback, $name);
       $stmt->execute();
       $msg="<div class='alert alert-success'>Rating Successfully Added</div>";
       $stmt->close();
       $con->close();
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
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Obaya Studio | Feedback</title>
</head>
<body>
    <?php include "navbar/navbar-admin.php"; ?>  
    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
            <div class="card-header bg-dark text-white">
                User Feedback
            </div>
                    <?php
                    $query = "select * from feedback";
                    $stmt = $con->prepare($query);
                    if($stmt->execute()){
                        $result = $stmt->get_result();
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                
                    ?> 
                    
                     <div class="card shadow p-3 mb-5 rounded">
                        <div class="card-header">
                            <div class="float-start mt-2">
                                <i>By: <?php echo $row['name']; ?> </i> 
                            </div>
                            <div class="float-end mt-2">
                                TokenId: <?php echo $row['appointmentId']; ?>
                            </div>
                        </div>           
                        <div class="card-body">
                        <div class='rateYo-<?php echo $row['id']; ?>'>
                        </div>
                                <script>
                                    $(function () {
                        
                                        $(".rateYo-<?php echo $row['id']; ?>").rateYo({
                                        readOnly:true,
                                        rating:<?php echo $row['rating'];?>
                                        });

                                        });
                                </script>
                                <div class="float-start mt-4">
                                    <h6><?php echo $row['feedback'] ?></h6>   
                                </div>
                            
                        </div>
                    </div>
                               
                    <?php          
                            }
                        }
                    }
                    ?>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
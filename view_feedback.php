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
                    <hr>
                    <h2>User feedback</h2>
                    <hr>
                    <?php
                    $query = "select * from feedback";
                    $stmt = $con->prepare($query);
                    if($stmt->execute()){
                        $result = $stmt->get_result();
                        if($result->num_rows>0){
                            while($row=$result->fetch_assoc()){
                                
                    ?> 
                    
                     <div class="card flex-row">
                        <div class="card-left">
                            <a href="#">
                            <img class="img-fluid" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIHZpZXdCb3g9IjAgMCA2NCA2NCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PCEtLQpTb3VyY2UgVVJMOiBob2xkZXIuanMvNjR4NjQKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xN2ZhZDA4OWQwOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE3ZmFkMDg5ZDA5Ij48cmVjdCB3aWR0aD0iNjQiIGhlaWdodD0iNjQiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSIxNCIgeT0iMzYuOCI+NjR4NjQ8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="card-title h5 h4-sm"><div class='rateYo-<?php echo $row['id']; ?>'></div></h4>
                                <script>
                                    $(function () {
                        
                                        $(".rateYo-<?php echo $row['id']; ?>").rateYo({
                                        readOnly:true,
                                        rating:<?php echo $row['rating'];?>
                                        });

                                        });
                                </script>
                            <?php echo $row['feedback'] ?><br>
                            by <i><?php echo $row['name']; ?></i><br>
                            <br>
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
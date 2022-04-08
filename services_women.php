<?php
include "config.php";
session_start();

if(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'ADMINISTRATOR'))
{
  echo 'Good day! ' . $_SESSION['email'] . ' <a href="management.php">Admin Panel</a>';
} 
elseif(isset($_SESSION['email']) AND ($_SESSION['usertype'] == 'STAFF')) 
{
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

    <title>Obaya Studio | Services for Women</title>
</head>
<body>
<?php
include 'navbar/navbar.php';
$sql = "SELECT * FROM women_service_table";  
$result = mysqli_query($link, $sql); ?>
        <section id="services">
                <div class="container">
                  <div class="row">
                    <?php  
                    if(mysqli_num_rows($result) > 0)
                    {
                      while($row = mysqli_fetch_array($result))
                      {  
                        $serviceStatus = $row["status"];
                        if($serviceStatus == 'ACTIVE')
                        {
                          echo "<div class='col-lg-4 col-sm-6'>";
                            echo "<div class='card'>";
                              // echo "<img src='images/service1.jpg' class='card-img-top'>";
                              //echo "<img src='ServicesImages/'". $row['image'] . "class='card-img-top'>";
                              $image = 'images/WomenServicesImages/'.$row["image"];
                              echo "<img src=$image class='card-img-top '>";
                              echo "<div class='card-body'>";
                              echo "<h5 class='card-title'>" . $row["name"] . " - ₱" . $row["cost"] . "</h5>";
                                echo "<p class='card-text'>" . $row["description"] . "</p>";
                                echo "<a href='check_schedule.php' class='btn btn-dark'>Book Now</a>";
                              echo "</div>";
                            echo "</div>";
                          echo "</div>";  
                        }
                        else{
                        }
                      }
                    }
                  ?>
                  </div>
                </div>
        </section>
      <?php include "footer/footer.php" ?>
</body>
</html>
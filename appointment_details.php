<?php
    include 'connection.php';
    session_start();
    $token = $_POST['tokenId'];
    $sql = "SELECT * FROM customer INNER JOIN appointment ON customer.appointmentId = appointment.appointmentId WHERE appointment.appointmentId = '$token'";
    $result = mysqli_query($con, $sql);  
?>
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
    <?php include "navbar/navbar.php"; ?>

    <div class="container-fluid row">
        <div class="card mx-auto shadow p-3 mb-5 bg-body rounded">
            <div class="card-body">
            <div class="table table-responsive">
                         <table class="table table-sm">
                              <tr>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Service</th>
                                   <th>Schedule</th>
                                   <th>Appointment ID</th>
                                   <th>Status</th>
                              </tr>
                              <?php  
                                        if(mysqli_num_rows($result) > 0)  
                                        {  
                                             while($row = mysqli_fetch_array($result))  
                                             {  
                                        ?>
                              <tr>
                                   <td><?php echo $row["name"]; ?></td>
                                   <td><?php echo $row["email"]; ?></td>
                                   <td><?php echo $row["service"]; ?></td>
                                   <td><?php echo $row["datetime"]; ?></td>
                                   <td><?php echo $row["appointmentId"]; ?></td>
                                   <td><?php echo $row["status"]; }}?></td>
                              </tr>
                         </table>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <?php include "footer/footer-nobg.php"; ?>
</body>
</html>
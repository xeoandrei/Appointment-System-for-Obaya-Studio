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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="css/servicesfood.css">

    <title>Obaya Studio | Book Appointment</title>
</head>
<body>
    <?php include "navbar/navbar.php"; ?>

        <div class="marginTop">
            <h1>Book Appointment</h1>
            <form class="">
                <div class="row">
                    <div class="col-lg-3"><h5>Number of Client</h5></div>
                    <div class="col-lg-3"><h5>Services</h5></div>
                    <div class="col-lg-3"><h5>Age</h5></div>
                    <div class="col-lg-3 mb-3"><h5>Gender</h5></div>

                    <div class="col-lg-3 mb-3"><h5>Client 1</h5></div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Haircut</option>
                            <option value="2">Rebond</option>
                            <option value="3">Lorem</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <input type="text" class="form-control" id="inputContact">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div class="col-lg-3 mb-3"><h5>Client 2</h5></div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Haircut</option>
                            <option value="2">Rebond</option>
                            <option value="3">Lorem</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <input type="text" class="form-control" id="inputContact">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div class="col-lg-3 mb-3"><h5>Client 3</h5></div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Haircut</option>
                            <option value="2">Rebond</option>
                            <option value="3">Lorem</option>
                        </select>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <input type="text" class="form-control" id="inputContact">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <h5>Photo Reference (Optional):</h5>
                        <button type="button" class="btn btn-secondary">Add Photo</button>
                    </div>

                    <div class="mb-3">
                        <h5>Current Hair Photo (Optional):</h5>
                        <button type="button" class="btn btn-secondary">Add Photo</button>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Confirm Appointment</button>
                    </div>
                </div>

            </form>   
        </div>

    </section>
    </section>

    
</body>
</html>

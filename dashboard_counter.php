<?php

    //Count # of services for men.
    $sql = "SELECT * from men_service_table";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $serviceRowMen = mysqli_num_rows( $result );
        
    } else {
        $serviceRowMen = 0;
    }

    //Count # of services for women.
    $sql = "SELECT * from women_service_table";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $serviceRowWomen = mysqli_num_rows( $result );
        
    } else {
        $serviceRowWomen = 0;
    }

    //Count # of food items.
    $sql = "SELECT * from food";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $foodRow = mysqli_num_rows( $result );
        
    } else {
        $foodRow = 0;
    }

    //Count # of appointments.
    $sql = "SELECT * from appointment";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $appointmentRow = mysqli_num_rows( $result );
        
    } else {
        $appointmentRow = 0;
    }

    //Count # of pending appointments.
    $sql = "SELECT * from appointment WHERE status='Pending'";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $pendingAppointmentRow = mysqli_num_rows( $result );
        
    } else {
        $pendingAppointmentRow = 0;
    }

    //Count # of verified appointments.
    $sql = "SELECT * from appointment WHERE status='Verified'";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $verifiedAppointmentRow = mysqli_num_rows( $result );
        
    } else {
        $verifiedAppointmentRow = 0;
    }

    //Count # of user accounts.
    $sql = "SELECT * from usertable";

    if ($result = mysqli_query($con, $sql)) {

        // Return the number of rows in result set
        $userRow = mysqli_num_rows( $result );
        
    } else {
        $userRow = 0;
    }
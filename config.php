<?php
/* Database credentials.*/
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'Obaya');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'obaya_studio');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
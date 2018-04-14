<?php
/* Setup for database connection */
define('DB_SERVER', '34.224.83.184');
define('DB_USERNAME', 'student3');
define('DB_PASSWORD', 'phppass3');
define('DB_NAME', 'student3');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
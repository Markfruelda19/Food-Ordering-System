<?php
     // start session
     session_start();


  // Create constant  to store Non Repeating Values
  define('SITEURL', 'http://localhost/food-store/');
  define('LOCALHOST', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'food-store');

  $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); // DAtabase connection
  $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database
?>
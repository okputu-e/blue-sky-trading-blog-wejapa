<?php

   session_start();
  //$conn = mysqli_connect("db4free.net","great_blue_sky94","great_blue_sky94", "great_blue_sky94");

  //$conn = mysqli_connect("localhost","root","", "blue-sky");

  $conn = mysqli_connect("remotemysql.com","DaQIGilviO","tz3KhX2HPY", "DaQIGilviO");

  if (!$conn) {
      die("Error connecting to Database" . mysqli_connect_error());
  }
 
    define('ROOT_PATH', realpath(dirname(__FILE__)));
    define('BASE_URL', 'https://bluesky-blog-wejapa.herokuapp.com');
?>


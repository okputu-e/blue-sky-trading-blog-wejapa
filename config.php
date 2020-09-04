<?php

    session_start();
    $conn = mysqli_connect("localhost", "root", "", "blue-sky");

    if (!$conn) {
        die('Error encounter while connecting to Database' . mysqli_connect_error());
    }

    define('ROOT_PATH', realpath(dirname(__FILE__)));
    define('BASE_URL', 'http://localhost/blue-sky-trading-blog-wejapa');
    


?>
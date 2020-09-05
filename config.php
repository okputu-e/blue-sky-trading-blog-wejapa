<?php

    session_start();
    $conn = mysqli_connect("us-cdbr-east-02.cleardb.com", "bf75824285893b", "2e9df13d", "heroku_66313510d928b51");

    if (!$conn) {
        die('Error encounter while connecting to Database' . mysqli_connect_error());
    }

    define('ROOT_PATH', realpath(dirname(__FILE__)));
    define('BASE_URL', 'http://us-cdbr-east-02.cleardb.com/blue-sky-trading-blog-wejapa');
    


?>
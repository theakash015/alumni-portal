<?php

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'alumnidb1');

     // define('DB_USERNAME', 'demoindus');
    // define('DB_PASSWORD', 'demo123');

    //connect with DB
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($conn == false){
        die("error: not connected");
    }

?>
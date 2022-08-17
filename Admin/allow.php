<?php

require_once "../logreg/config.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if (!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin'] !== true) {
        header("location: ../logreg/login.php");
    }
}

if (isset($_POST['permitorforbid'])) {
    $act = $_POST['permitorforbid'];

    $q = "UPDATE jobopportunities SET `verified`='true' WHERE srno=$act ";

    $run = mysqli_prepare($conn, $q);

    if (mysqli_stmt_execute($run))
    {
        header("location: ./permituserjob.php");
    }

}

?>
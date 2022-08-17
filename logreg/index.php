<?php

//index.php

//Include Configuration File
require_once "./config.php";
require_once "./Gconfig.php";
$login_button = '';
session_start();




if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
    }
}


if (!isset($_SESSION['access_token'])) {

    $login_button = '<a id="Gload" href="' . $google_client->createAuthUrl() . '">  </a>';
}

?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PHP Login / Register using Google Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../cssfolder/c1.php">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <?php
            if ($login_button == '') {

                // echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
                // echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' </h3> <br>';
                // echo '<h3><b>Name2 :</b> ' . $_SESSION['user_last_name'] . ' </h3> ';
                // echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';

                // $_SESSION['gimg'] = $_SESSION['user_image'] ;
                // $_SESSION['gfname'] = $_SESSION['user_first_name'];
                // $_SESSION['glname'] = $_SESSION['user_last_name'];
                // $_SESSION['gemail'] = $_SESSION['user_email_address'];

                // echo $_SESSION['user_image'] ;
                // echo $_SESSION['user_first_name'];
                // echo $_SESSION['user_last_name'];
                // echo $_SESSION['user_email_address'];

                // echo $_SESSION['gimg'];
                // echo $_SESSION['gfname'];
                // echo $_SESSION['glname'];
                // echo $_SESSION['gemail'];


                $gsql = "SELECT `email` FROM users WHERE email = ?";
                $gstmt = mysqli_prepare($conn, $gsql);
                mysqli_stmt_bind_param($gstmt, "s", $gparam_email);
                $gparam_email = $_SESSION['user_email_address'];

                // Try to execute this statement
                if (mysqli_stmt_execute($gstmt)) {
                    mysqli_stmt_store_result($gstmt);
                    if (mysqli_stmt_num_rows($gstmt) == 1) {

                        $_SESSION["loggedin"] = true;

                        $_SESSION['gimg'] = $_SESSION['user_image'];
                        $_SESSION['gfname'] = $_SESSION['user_first_name'];
                        $_SESSION['glname'] = $_SESSION['user_last_name'];
                        $_SESSION['gemail'] = $_SESSION['user_email_address'];
                       
                        header("location: ../user_logedin/welcome.php");
                    } else {

                        $_SESSION['gimg'] = $_SESSION['user_image'];
                        $_SESSION['gfname'] = $_SESSION['user_first_name'];
                        $_SESSION['glname'] = $_SESSION['user_last_name'];
                        $_SESSION['gemail'] = $_SESSION['user_email_address'];
                   
                        header("location: ./signup.php");
                    }
                }
            } else {
                echo '<div align="center">' . $login_button . '</div>';
            }
            ?>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.getElementById("Gload").click()
        };
    </script>
</body>

</html>
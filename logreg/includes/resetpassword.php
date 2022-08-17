<?php

if (isset($_POST["resetpasswordsubmit"])) {
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdrepeat"];

    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ./new/createnewpassword.php?newpwd=empty");
        exit();
    } elseif ($password != $passwordRepeat) {
        header("Location: ./new/createnewpassword.php?newpwd=pwdnotsame");
        exit();
    }

    $currentDate = date("U");

    require_once "../config.php";

    // $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector=? ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
?>

        <div style="margin-top: 600px; width: 50%; margin: auto;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="msg"><?php echo "There was an error"; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        // mysqli_stmt_bind_param($stmt, "ss", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "you need to resubmit your request!1";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                echo "you need to resubmit your request!2";
                exit();
            } elseif ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE emai=?";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error!";
                        exit();
                    } else {
                        $sql = "UPDATE users SET password=? WHERE 	email=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {
                            $newpwd = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newpwd, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
} 
else 
{
    header("Location: ../index.php");
}

?>

<a href="x"></a>
<?php

require_once "../../bootstart.php";

if (isset($_POST['resetrequestsubmit'])) {
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/Alumni/logreg/includes/new/createnewpassword.php?selector=" . $selector . "&validator=" . bin2hex($token);
    //change change change

    $expires = date("U") + 1800;

    require_once "../config.php";

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
?>

        <div style="margin-top: 600px; width: 50%; margin: auto;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="msg"><?php echo "There was an error"; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
?>

        <div style="margin-top: 600px; width: 50%; margin: auto;" class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong class="msg"><?php echo "There was an error"; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php
        exit();
    }
    else
    {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subjects = "Reset for IU";
    $message = '<p> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum magni amet excepturi in beatae earum aut odio neque voluptatem similique repellat perspiciatis, quas distinctio ducimus voluptates, repellendus dolorem cumque! Similique laudantium nihil eos et odit, quaerat possimus sequi recusandae iure expedita? Error, cum quidem dolores ad saepe ea doloribus. </p>';

    $message.= '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae nostrum magni amet excepturi in beatae earum aut odio neque voluptatem similique repellat perspiciatis, quas distinctio ducimus voluptates, repellendus dolorem cumque! Similique laudantium nihil eos et odit, quaerat possimus sequi recusandae iure expedita? Error, cum quidem dolores ad saepe ea doloribus.</p>';

    $message .= '<p>Here is your password reset link: </br>';

    $message .= '<a href="' . $url . '">' .$url . '</a></p>';

    $headers = "From: <mankyada.19.imsc@iict.indusuni.ac.in>\r\n";
    $headers .= "Reply-To: mankyada.19.imsc@iict.indusuni.ac.in\r\n";
    $headers .= "Content-type: text/html\r\n";

    $chm = mail($to, $subjects, $message, $headers);

    header("Location: ../resetpassword.php?reset=success");

} 
else 
{
    header("Location: ../index.php");
}

?>


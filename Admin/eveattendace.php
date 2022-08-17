<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if (!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin'] !== true) {
        header("location: ../logreg/login.php");
    }
}

?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Send Mail </title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">
    <link href="dist/the-datepicker.css" rel="stylesheet" />
    <link rel="stylesheet" href="../temp/t1.css" type="text/css">
    <script src="dist/the-datepicker.js"></script>
</head>

<body>
    <header>
        <nav class="nav1 navbar navbar-light bg-light">
            <div class="">
                <!-- container-fluid -->
                <a class="navbar-brand" href="./adminlog.php">
                    <img class="logoimg" src="../imgfolder/logo.png" alt="Indus University">
                </a>

                <img src="https://img.icons8.com/material-outlined/60/5a5147/vertical-line.png" />

                <a class="navbar-brand" href="./adminlog.php">
                    <img class="iuaaimg" src="../imgfolder/IUAA.png" alt="IUAA">
                </a>
            </div>

            <div class="dropdown profile bg-dark">
                <div class="one">
                    <?php if (isset($_SESSION['loggedin'])) { ?>
                        <div class="onediv">

                            <?php if (isset($_SESSION['loggedinadmin'])) {
                                echo "logged in as IU ADMIN";
                            } else {
                                echo "Welcome " . $_SESSION['fname'];
                            }
                            ?>

                        </div>
                    <?php } else {
                        echo "";
                    } ?>
                </div>

                <div class="two ">
                    <a class="profileimg" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="profileimg1" src="https://img.icons8.com/ios-filled/25/ffffff/menu--v5.png" />
                        <img class="profileimg2" src="https://img.icons8.com/material/33/eeeeee/user-male-circle--v1.png" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end drop" aria-labelledby="dropdownMenuLink">
                        <?php if (isset($_SESSION['loggedin'])) { ?>
                            <li><a class="dropdown-item" href="../logreg/logout.php">Logout</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="../logreg/login.php">Login</a></li>
                            <li><a class="dropdown-item" href="../logreg/signup.php ">Register</a></li>
                        <?php } ?>
                    </ul>
                </div>

            </div>
        </nav>

        <nav id="navbar_top" class="nav2 navbar navbar-expand-xl navbar-dark bg-dark">
            <!-- toggle -->

        </nav>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 100) {
                        document.getElementById('navbar_top').classList.add('fixed-top');
                        // add padding top to show content behind navbar
                        navbar_height = document.querySelector('.navbar').offsetHeight;
                        document.body.style.paddingTop = navbar_height + 'px';
                    } else {
                        document.getElementById('navbar_top').classList.remove('fixed-top');
                        // remove padding top from body
                        document.body.style.paddingTop = '0';
                    }
                });
            });
        </script>
    </header>

    <div class="main-body">
        <div class="container mt-4">

            <div class="cardtable">
                <div class="fetchdata">
                    <div class="table-responsive">
                        <form action="./eveattendace.php" method="post">
                            <table class="registertable table align-middle table-hover mt-2">
                                <thead>
                                    <tr>
                                        <th> Sr </th>
                                        <th> User </th>
                                        <th> Name </th>
                                        <th> Email </th>
                                        <th> Passout year </th>
                                        <th> Course </th>
                                        <th> Department </th>
                                        <th> Attendance </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php



                                    if (isset($_POST['srMe'])) {
                                        $srMe = $_POST['srMe'];
                                        $_SESSION['srMe'] = $srMe;
                                    }

                                    $srMe = $_SESSION['srMe'];

                                    $eve = "SELECT * FROM eventsregistrations WHERE eventSrno = $srMe";
                                    $eve_q = mysqli_query($conn, $eve);
                                    $i = 0;

                                    while ($row = mysqli_fetch_assoc($eve_q)) : {
                                            $srno = $row['srno'];
                                            $eventSrno = $row['eventSrno'];
                                            $userSrno = $row['userSrno'];
                                            $name = $row['name'];
                                            $email = $row['email'];
                                            $passout = $row['passout'];
                                            $course = $row['course'];
                                            $department = $row['department'];
                                            $attendance = $row['attendance'];

                                    ?>

                                            <tr>
                                                <td> <?php echo $srno; ?> </td>
                                                <td> <?php echo $userSrno; ?> </td>
                                                <td> <?php echo $name; ?> </td>
                                                <td> <?php echo $email; ?> </td>
                                                <td> <?php echo $passout; ?> </td>
                                                <td> <?php echo $course; ?> </td>
                                                <td> <?php echo $department; ?> </td>
                                                <td><b style="color: #dd6d6d;">A</b>
                                                    <label class="switchatt">
                                                        <input type="checkbox" name="<?php echo 'attcheck' . $i; ?>" value="<?php echo $srno; ?>" <?php
                                                                                                                                                    if ($attendance == 1) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                    ?>>
                                                        <span class="slideratt roundatt"></span>
                                                    </label> <b style="color: #9acc32;">P</b>
                                                </td>
                                            </tr>


                                    <?php
                                            $_POST["home"] = $i;
                                            $i++;
                                        }
                                    endwhile;
                                    ?>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button class="btn btn-primary col-md-11 mt-4" type="submit" name="submit">SUBMIT ATTENDANCE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        // $ok = $_POST['attcheck'];
        // echo $ok;
        $i = $_POST["home"];
        for ($j = 0; $j <= $i; $j++) {
            $name = "attcheck$j";
            if (isset($_POST[$name])) {
                $attendeduser = $_POST[$name];

                $q = "UPDATE eventsregistrations
                      SET attendance ='1'
                      WHERE srno=$attendeduser;";

                $run = mysqli_query($conn, $q);

                if ($j == $i) {
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
        }
    }
    ?>

    <div>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict'

                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.querySelectorAll('.needs-validation')

                // Loop over them and prevent submission
                Array.prototype.slice.call(forms)
                    .forEach(function(form) {
                        form.addEventListener('submit', function(event) {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }

                            form.classList.add('was-validated')
                        }, false)
                    })
            })()

            //Enable dismissal of an alert 
            $('.alert').alert()
        </script>
    </div>

    </div>


</body>

<footer>
    <?php
    require_once "../footer/footer.php";
    ?>
</footer>

</html>
<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../logreg/login.php");
}

$usrno = $_SESSION['srno'];
$show = false;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $sql = "SELECT srno FROM eventsregistrations WHERE eventSrno = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $param_eventsrno);

        // set value for param email
        $param_eventsrno = trim($_POST['eveSrnoForReg']);

        //execute
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            $eventsrno = trim($_POST['eveSrnoForReg']);
        } else {
            $err = "Something went wrong!" . mysqli_error($conn);
        }
    } else {
        $err = "Something went wrong!" . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);


    if (empty(trim($_POST['userSrnoForReg']))) {
        $err = "name can't be blank";
    } else {
        $usersrno = trim($_POST['userSrnoForReg']);
    }

    if (empty(trim($_POST['username']))) {
        $err = "name can't be blank";
    } else {
        $username = trim($_POST['username']);
    }

    if (empty(trim($_POST['email']))) {
        $err = "name can't be blank";
    } else {
        $email = trim($_POST['email']);
    }

    if (empty(trim($_POST['passoutyear']))) {
        $err = "year can't be blank";
    } else {
        $passoutyear = trim($_POST['passoutyear']);
    }

    if (empty(trim($_POST['course']))) {
        $err = "course can't be blank";
    } else {
        $course = trim($_POST['course']);
    }

    if (empty(trim($_POST['department']))) {
        $err = "department can't be blank";
    } else {
        $department = trim($_POST['department']);
    }


    // if there no error, go ahead and insert into database
    if (empty($err)) {

        $sql = "INSERT INTO `eventsregistrations` (`eventSrno`, `userSrno`, `name`, `email`, `passout`, `course`, `department`) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "iississ", $param_eventsrno, $param_usersrno, $param_name, $param_email, $param_passout, $param_course, $param_department);

            $param_eventsrno = $eventsrno;
            $param_usersrno = $usersrno;
            $param_name = $username;
            $param_email = $email;
            $param_passout = $passoutyear;
            $param_course = $course;
            $param_department = $department;

            // execute
            if (mysqli_stmt_execute($stmt)) {
                // header("location: ./welcome.php");
                $show = true;
            } else {
                echo "Something went wrong!" . mysqli_error($conn);
            }
        }
        mysqli_stmt_close($stmt);
    }
    // mysqli_close($conn);
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
    <title>Register for event</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">
    <link rel="stylesheet" href="../temp/t1.css" type="text/css">
</head>

<body>

    <header>
        <nav class="nav1 navbar navbar-light bg-light">
            <div class="">
                <!-- container-fluid -->
                <a class="navbar-brand" href="./welcome.php">
                    <img class="logoimg" src="../imgfolder/logo.png" alt="Indus University">
                </a>

                <img src="https://img.icons8.com/material-outlined/60/5a5147/vertical-line.png" />

                <a class="navbar-brand" href="./alumniboard.php">
                    <img class="iuaaimg" src="../imgfolder/IUAA.png" alt="IUAA alumni board">
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
                            <li><a class="dropdown-item" href="../user_logedin/updateProfile.php">Profile</a></li>
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
            <button class="navbar-toggler ml-auto float-xs-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon ml-auto float-xs-right"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav" id="">
                    <?php if (isset($_SESSION['loggedin'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="./welcome.php">Home</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                        </li>
                    <?php } ?>

                    <li class="nav-item ">
                        <a class="nav-link" href="./allevents.php">Events</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="./alljobs.php">Jobs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../noticeandupdate/noticeandupdate.php">Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./allnewsletter.php">Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./photos.php">Photos</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show dark">
                            <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                            <div style="font-size: 18px; " class="dropdown-menu dropdown-menu-dark drop2" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="./contactus.php">Contact us</a>
                                <a class="dropdown-item" href="./alumniboard.php">IUAA Board</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
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


            <?php

            $finalinstitute = "";
            $finalbranch = "";
            $finaldegree = "";
            $institute = "";
            $branch = "";
            $degree = "";
            $passout = "";

            $eve = "SELECT * FROM users WHERE srno = $usrno";
            $eve_q = mysqli_query($conn, $eve);

            while ($row = mysqli_fetch_assoc($eve_q)) : {
                    $institute = $row['institute'];
                    $branch = $row['branch'];
                    $degree = $row['obtained degree'];
                    $passout = $row['passout'];
                }
            endwhile;

            $qins = "SELECT * FROM institute_tbl WHERE ins_id = '$institute'";
            $eveins_q = mysqli_query($conn, $qins);
            while ($rowins = mysqli_fetch_assoc($eveins_q)) : {
                    $finalinstitute = $rowins['ins_name'];
                }
            endwhile;

            $qbranch = "SELECT * FROM branch_tbl WHERE br_id = '$branch'";
            $evebranch_q = mysqli_query($conn, $qbranch);
            while ($rowbranch = mysqli_fetch_assoc($evebranch_q)) : {
                    $finalbranch = $rowbranch['br_name'];
                }
            endwhile;

            $qdegree = "SELECT * FROM course_tbl WHERE course_id = '$degree'";
            $evedegree_q = mysqli_query($conn, $qdegree);
            while ($rowbranch = mysqli_fetch_assoc($evedegree_q)) : {
                    $finaldegree = $rowbranch['course_name'];
                }
            endwhile;

            ?>


            <div class="card">
                <form class="form needs-validation" action="./event_reg.php" method="POST" novalidate>

                    <?php if ($show == true) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="msg"><?php echo "Sucessfully registered for event..."; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    }
                    ?>

                    <h4 class="bl">Registeraion for event</h3>
                        <input name="eveSrnoForReg" value="<?php echo $_SESSION['srMe']; ?>" hidden>
                        <input name="userSrnoForReg" value="<?php echo $_SESSION["srno"]; ?>" hidden>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" name="username" class="form-control" placeholder="Name" value="<?php echo $_SESSION["fname"] . " " . $_SESSION["lname"]; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $_SESSION["email"]; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" pattern="\d*" name="passoutyear" minlength="4" maxlength="4" class="form-control" placeholder="Passout year" value="<?php echo $passout; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" name="course" class="form-control" placeholder="Degree / Course" value="<?php echo $finaldegree; ?>" required />
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-12">
                                <input type="text" name="department" class="form-control" placeholder="Institute / Department" value="<?php echo "$finalbranch / $finalinstitute"; ?>" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">REGISTER YOUR SELF</button>

                        <br><br>
                        <hr>
                        <div class="form-group">
                            <label class="check">
                                Do you want to know more about this event, then <a href="./event_detail.php">click here</a> .
                            </label>
                        </div>
                </form>

            </div>

            <div>
                <script>
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

        <div class="p5">
            <div class="container">

                <div class="backgray ">
                    <a href="./allnewsletter.php">
                        <h5 class="mb-0">CHECKOUT NEWSLETTER</h5>
                    </a>
                </div>

                <div class="backgray ">
                    <a href="../noticeandupdate/noticeandupdate.php">
                        <h5 class="mb-0">CHECKOUT NOTICE AND UPDATES</h5>
                    </a>
                </div>

                <div class="backgray ">
                    <a href="./certificationcourses.php">
                        <h5 class="mb-0">CHECKOUT CERTIFICATION COURSES</h5>
                    </a>
                </div>

                <div class="backgray ">
                    <a href="./addjobbyuser.php">
                        <h5 class="mb-0">POST JOB OPPORTUNITIES TO HELP YOUR FELLOWS</h5>
                    </a>
                </div>

            </div>
        </div>

        <?php
        require_once "../footer/footer.php";
        ?>

    </div>
</body>

</html>
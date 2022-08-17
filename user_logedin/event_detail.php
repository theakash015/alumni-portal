<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../logreg/login.php");
}

?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

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
    <title>Alumni Portal</title>
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

            <div class="fetchdata">
                <?php

                if (isset($_POST['srMe'])) {
                    $srMe = $_POST['srMe'];
                    $_SESSION['srMe'] = $srMe;
                }

                $srMe = $_SESSION['srMe'];

                $eve = "SELECT * FROM events WHERE srno = $srMe";
                $eve_q = mysqli_query($conn, $eve);

                while ($row = mysqli_fetch_assoc($eve_q)) : {
                        $title = $row['title'];
                        $description = $row['description'];
                        $agenda = $row['agenda'];
                        $note = $row['note'];
                        $olddate = $row['date'];
                        $date = date("d F Y", strtotime($olddate));
                        $oldstarttime = $row['starttime'];
                        $starttime = date("h:i A", strtotime($oldstarttime));
                        $oldendtime = $row['endtime'];
                        $endtime = date("h:i A", strtotime($oldendtime));
                        $pdflink = $row['PDF'];
                        $location = $row['location'];
                    }
                endwhile;
                ?>
            </div>


            <div class="card">
                <div class="bodyeve">
                    <div class="wrappereve">
                        <div class="boxeve aeve">
                            <h3 class="bl eveti"><?php echo $title; ?></h2>
                                <hr style="width: 90%;">
                                <h6> <br>
                                    <span class="evepara"> <img class="calicon" src="https://img.icons8.com/ios/22/000000/planner.png" /> <?php echo $date . "</br>"; ?></span>
                                    <span class="evepara"> <img class="timeicon" src="https://img.icons8.com/ios/23/000000/clock--v1.png" /> <?php echo $starttime . " - " . $endtime . "</br>"; ?> </span>
                                    <span class="evepara"> <img class="locationicon" src="https://img.icons8.com/material-sharp/22/000000/marker.png" /> <?php echo $location . "</br>"; ?></span>
                                </h6> <br>

                                <?php

                                $eveu = date("Ymd", strtotime($olddate));
                                $curu = date("Ymd");

                                if ($eveu > $curu) {
                                ?>
                                    <div>
                                        <p style="border: 2px solid #d8c3a5;" id="evestatus" class="btn btn-primary mt-2 evedet">Prospective Event</p>
                                        <button type="submit" onclick="location.href='./event_reg.php'" class="btn btn-primary mt-2 evedet">REGISTER</button>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div>
                                        <p style="border: 2px solid #d8c3a5;" id="evestatus" class="btn btn-primary mt-2 evedet">Past Event</p>
                                        <button class="btn btn-primary mt-2 evedet">CAN'T REGISTER</button>
                                    </div>
                                <?php
                                }
                                ?>



                        </div>
                        <div class="boxeve beve">
                            <h4>description</h4>
                            <p class="evedata"><?php echo $description; ?></p>
                            <br>

                            <?php if ($agenda) { ?>
                                <h4>Agenda</h4>
                                <p class="evedata"><?php echo "$agenda";
                                                } ?> </p>
                                <br>

                                <?php if ($note) { ?>
                                    <h4>Note</h4>
                                    <p class="evedata"><?php echo $note;
                                                    } ?> </p>

                                    <?php if ($pdflink) { ?>
                                        <hr />

                                        <label for="jobpdf"> <strong>
                                                <h4>PDF / Image - More Details</h4>
                                            </strong> </label>
                                        <div id="jobpdf">
                                            <a href="<?php echo $pdflink; ?>" target="_blank" class="pdflink"> Click here to open PDF </a>
                                        </div>
                                    <?php } ?>
                        </div>
                        <div class="boxeve ceve">

                        </div>
                    </div>
                    <hr>
                </div>
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
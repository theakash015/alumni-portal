<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../logreg/login.php");
}

if (isset($_SESSION["loggedinadmin"])) {
    header("location: ../Admin/adminlog.php");
}
?>

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
                                if(isset($_SESSION['gfname']))
                                {
                                    $gemail = $_SESSION['gemail'];
                                    $_SESSION['email'] = $gemail;
                                    $_SESSION['fname'] = $_SESSION['gfname'];
                                    $_SESSION['lname'] = $_SESSION['glname'];

                                    $glog = "SELECT * FROM users WHERE email = '$gemail'";
                                    $glog_q = mysqli_query($conn, $glog);
                            
                                    while ($grow = mysqli_fetch_assoc($glog_q)) : {
                                            $srno = $grow['srno'];
                                            $_SESSION['srno'] = $srno;
                                        }
                                    endwhile;
                                }
                                echo "Welcome " . $_SESSION['fname'] . " " . $_SESSION['lname'];
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
                        <a class="nav-link" href="#evewala">Events</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#jobwala">Jobs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#nuwala">Updates</a>
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
        <div class="mt-4">
            <div class="container">
                <div class="p1 ">
                    <div class="slider">
                        <?php
                        // require_once "../homepage/slide.php";
                        ?>
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner ">
                                <div class="carousel-item active" data-bs-interval="2500">
                                    <img src="../imgfolder/indus-university-home.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2500">
                                    <img src="../imgfolder/Solar-Panels.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2500">
                                    <img src="../imgfolder/about.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2500">
                                    <img src="../imgfolder/Auditorium.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card1">
                        <b>Alumni Network helps you to</b>
                        <ul>
                            <li>Get in touch with your batchmates</li>
                            <li>Expand your professional network</li>
                            <li>Receive all updates about news and events from institute and many more</li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="p2">
                <div class="container ">
                    <center>
                        <h2>About Indus University</h2> <br>
                        <p>Indus University has been established with the objective of making a noteworthy contribution to the social, economic and cultural life of our country. Having faith in the power of education, the builders of this university intend to impart knowledge to youngsters of society.
                        </p><br>
                        <h5>“ ज्ञानेन प्रकाशते जगत “<br />
                            “ Knowledge Enlightens the World ”</h5>
                    </center>
                </div>
            </div>

            <div class="p3">
                <div class="container">
                    <p>The founders of Indus University aim to provide best quality education to their students. Believing in extensive growth, noticeable steps are taken whenever required to prepare students for the commercial industry worldwide. It would be best to say that every activity at Indus is practiced to elevate the level of education.</p>

                    <p>The three pillars on which this university firmly stands on are – educational wisdom, professional brilliance, and research & innovation, all of which are aimed at nurturing a spirit of entrepreneurship and social responsibility.</p>

                    <p>To build proficient entrepreneurs, who can constructively contribute to the society with their leadership and ‘out-of-the-box’ thinking skills, Indus Technology and Smart Solution Centres (ITSSC) has been established. It provides an open platform to creative minds, smart enough to create innovative ideas and implement them successfully. In addition, these centers endorse cutting-edge innovations in the domain of engineering, aviation, robotics, and more.</p>

                    <p>To encapsulate, Indus looks forward to meeting the standard global criteria, making a noteworthy impact in the fields of academia, research & development.</p>
                </div>
            </div>

            <div class="p4" id="evewala">
                <div class="container">
                    <div>
                        <h2>Events</h2>
                    </div><br>
                    <div class="grid">

                        <?php
                        $eve = "SELECT * FROM events ORDER BY srno DESC LIMIT 3";
                        $eve_q = mysqli_query($conn, $eve);

                        $evecounter = "SELECT * FROM events";
                        $evecounter_q = mysqli_query($conn, $evecounter);
                        $counter = mysqli_num_rows($evecounter_q);

                        while ($everow = mysqli_fetch_assoc($eve_q)) : ?>
                            <form method="POST">
                                <div class="item">
                                    <div class="additional">
                                        <div class="user-item">
                                            <h4 class="evetitle"><?php echo $everow['title']; ?></h4>
                                        </div>

                                        <div class="more-info" style="margin-left: 30px; margin-right: 30px; text-align:left;">
                                            <?php
                                            $srno = $everow['srno'];
                                            $olddate =  $everow['date'];
                                            $newdate = date("d F Y", strtotime($olddate));
                                            $oldstarttime = $everow['starttime'];
                                            $oldendtime = $everow['endtime'];
                                            $newstarttime = date("h:i A", strtotime($oldstarttime));
                                            $newendtime = date("h:i A", strtotime($oldendtime));
                                            ?>
                                            <span class="evepara"> <img class="calicon" src="https://img.icons8.com/ios/22/000000/planner.png" /> <?php echo $newdate . "</br>"; ?></span>
                                            <span class="evepara"> <img class="timeicon" src="https://img.icons8.com/ios/23/000000/clock--v1.png" /> <?php echo $newstarttime . " - " . $newendtime . "</br>"; ?> </span>
                                            <span class="evepara"> <img class="locationicon" src="https://img.icons8.com/material-sharp/22/000000/marker.png" />
                                                <?php echo $everow['location'] . "</br>"; ?></span>


                                            <div class="evebuttonparent">
                                                <!-- <button type="submit" class="btn btn-primary mt-3 evebutton" onclick="
                                                <?php #$_SESSION['srno'] = $srno;
                                                ?>; location.href='./event_detail.php'">KNOW MORE</button> -->

                                                <input type="text" value=<?php echo "$srno" ?> name="srMe" hidden>

                                                <?php

                                                $eveu = date("Ymd", strtotime($olddate));
                                                $curu = date("Ymd");

                                                if ($eveu > $curu) {
                                                ?>
                                                    <p id="evestatus" class="btn mt-4 evebutton">Prospective Event</p>
                                                <?php
                                                } else {
                                                ?>
                                                    <button id="evestatus" class="btn mt-3 evebutton">Past Event</button>
                                                <?php
                                                }
                                                ?>

                                                <button type="submit" formaction="./event_detail.php" class="btn btn-primary mt-3 evebutton">KNOW MORE</button>

                                                <!-- <button type="submit" formaction="./event_reg.php" class="btn btn-primary mt-3 evebutton">REGISTER</button> -->

                                            </div>


                                        </div>
                                    </div>
                                    <div class="general">
                                        <p class="evepara"><?php echo $everow['description']; ?></p>
                                    </div>
                                </div>
                            </form>
                        <?php endwhile; ?>
                    </div>

                    <div class="showextra">
                        <button class="btn btn-primary mt-3" onclick="location.href=' ./allevents.php '">SHOW ALL <?php echo $counter; ?> EVENTS</button>
                    </div>

                </div>
            </div>


            <div class="p6" id="jobwala">
                <div class="container">
                    <h2>Job Opportunities</h2>
                    <br>
                    <div class="jobgrid">

                        <?php
                        $job = "SELECT * FROM jobopportunities WHERE verified = 'true' ORDER BY srno DESC LIMIT 4 ";
                        $job_q = mysqli_query($conn, $job);

                        $jobcounter = "SELECT * FROM jobopportunities";
                        $jobcounter_q = mysqli_query($conn, $jobcounter);
                        $jobcounternum = mysqli_num_rows($jobcounter_q);

                        while ($jobrow = mysqli_fetch_assoc($job_q)) : ?>

                            <?php
                            $jobsrno = $jobrow['srno'];
                            $jobrole =  $jobrow['job role'];
                            $jobcompany = $jobrow['company'];
                            $joblocation = $jobrow['location'];
                            $jobpostedon = $jobrow['posted on'];
                            $jobverified = $jobrow['verified'];
                            $jobpostedonnew = date("d F Y", strtotime($jobpostedon));

                            if ($jobverified == "true") { ?>

                                <div class="jobitem">
                                    <form method="POST">

                                        <span class="jobtitle"><b><?php echo $jobrole; ?></b></span>
                                        <span class="jobtitle"> | </span>
                                        <span class="jobtitle"><?php echo $jobcompany; ?></span>
                                        <br /><br />
                                        <div class="colorlite">
                                            <strong> Location: </strong> <?php echo $joblocation; ?>
                                            <br />
                                            <strong> Posted on: </strong> <?php echo $jobpostedonnew; ?>
                                        </div>
                                        <div class="jobbtn">
                                            <input type="text" value=<?php echo "$jobsrno" ?> name="srJob" hidden>
                                            <button class="btn btn-primary mt-3" formaction="./job_details.php">SHOW DETAILS</button>
                                        </div>

                                    </form>
                                </div>
                            <?php } ?>

                        <?php
                        endwhile;
                        ?>

                    </div>

                    <div class="showextrajob">
                        <button class="btn btn-primary mt-3" onclick="location.href=' ./alljobs.php '">SHOW ALL <?php echo $jobcounternum; ?> JOB POSTINGS</button>
                    </div>

                </div>
            </div>

            <div class="p7" id="nuwala">
                <div>
                    <h2 class="container mb-0" style="padding-bottom: 0px;">Notice and Updates</h2>
                    <br>
                    <div class="main-body">
                        <div class="">
                            <div class=" ">

                                <?php
                                $nu = "SELECT * FROM noticeandupdates ORDER BY srno DESC LIMIT 3";
                                $nu_q = mysqli_query($conn, $nu);

                                $nu2 = "SELECT * FROM noticeandupdates";
                                $nu2_q = mysqli_query($conn, $nu2);
                                $counterrec = mysqli_num_rows($nu2_q);


                                $counternu = 0;

                                while ($nurow = mysqli_fetch_assoc($nu_q)) :

                                    $title =  $nurow['title'];
                                    $description =  $nurow['description'];
                                    $link =  $nurow['link'];
                                    $olddate =  $nurow['createdAt'];
                                    $newdate = date("d F Y", strtotime($olddate));
                                    $counternu = $counternu + 1;

                                ?>

                                    <div class="letter pt-2 active pb-0 px-3">
                                        <div class="letter-body">
                                            <div class="row col-12">
                                                <a data-toggle="collapse" href="#a<?php echo $counternu; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                    <h5 class="card-title "><b><?php echo $title; ?> </b></h5>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse letter-more" id="a<?php echo $counternu; ?>">
                                            <hr class="mt-0" />

                                            <?php if ($link == 0) { ?>
                                                <p><?php echo $description; ?></p>
                                                <hr />
                                            <?php } elseif ($link == 1) { ?>
                                                <p><a class="pdflink" href="../user_logedin/certificationcourses.php">Click here to show certification courses</a></p>
                                            <?php } elseif ($link == 2) { ?>
                                                <p><a class="pdflink" href="../user_logedin/allevents.php">Click here to show events</a></p>
                                            <?php } elseif ($link == 3) { ?>
                                                <p><a class="pdflink" href="../user_logedin/alljobs.php">Click here to show jobs</a></p>
                                            <?php } else { ?>
                                                <p><a class="pdflink" href="#">#</a></p>
                                            <?php } ?>

                                            <h6>Posted on: <?php echo $newdate; ?></h6>

                                        </div>
                                    </div>

                                <?php endwhile; ?>

                            </div>
                        </div>
                    </div>

                    <div class="showextranu">
                        <button class="btn btn-primary mt-3" onclick="location.href='../noticeandupdate/noticeandupdate.php'">SHOW ALL <?php echo $counterrec; ?> NOTICES AND UPDATES</button>
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

        </div>
    </div>
    <?php
    require_once "../footer/footer.php";
    ?>
</body>

</html>
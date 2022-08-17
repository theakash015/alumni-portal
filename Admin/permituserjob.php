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
    <title>Alumni Portal</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">
    <link rel="stylesheet" href="../temp/t1.css" type="text/css">

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

            <div class="fetchdata">
                <?php


                $job = "SELECT * FROM jobopportunities WHERE verified = 'false'";
                $job_q = mysqli_query($conn, $job);

                while ($row = mysqli_fetch_assoc($job_q)) : {
                        $srno = $row['srno'];
                        $jobrole = $row['job role'];
                        $jobdescription = $row['job description'];
                        $company = $row['company'];
                        $aboutcompany = $row['about company'];
                        $pdflink = $row['pdf link'];
                        $salary = $row['salary'];
                        $eligibility = $row['eligibility'];
                        $reqexp = $row['reqexp'];
                        $location = $row['location'];
                        $deadline = $row['deadline'];
                        $finaldeadline = date("d F Y", strtotime($deadline));
                        $contactdetail = $row['contact detail'];
                        $postedby = $row['posted by'];
                        $postedon = $row['posted on'];
                        $finalpostedon = date("d F Y", strtotime($postedon));

                        if ($postedby == "admin") {
                            $finalpostedby = "T&P cell of INDUS UNIVERSITY";
                        } else {

                            $usr = "SELECT * FROM users WHERE srno ='$postedby'";
                            $usr_q = mysqli_query($conn, $usr);

                            while ($urow = mysqli_fetch_assoc($usr_q)) : {
                                    $ufname = $urow['first name'];
                                    $ulname = $urow['last name'];
                                    $uemail = $urow['email'];
                                    $udegree = $urow['obtained degree'];
                                    $upassout = $urow['passout'];
                                }
                            endwhile;

                            $jdegree = "SELECT * FROM course_tbl WHERE course_id = '$udegree'";
                            $jdegree_q = mysqli_query($conn, $jdegree);
                            while ($rowbranch = mysqli_fetch_assoc($jdegree_q)) : {
                                    $finaludegree = $rowbranch['course_name'];
                                }
                            endwhile;

                            $finalpostedby = "This job opportunity posted by Indusiann <span class='indusian'> " . $ufname . " " . $ulname . " </span> [" . $finaludegree . ", " . $upassout . "]";
                        }
                ?>


                        <div class="card jobbody">
                            <form method="POST">

                                <h3 style="text-align: center; margin-top: 15px;"><?php echo $finalpostedby; ?></h3>

                                <hr />
                                <ul>
                                    <strong>
                                        <li> Basic </li>
                                    </strong>
                                    <ul>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label><strong class="colorlite">
                                                        <li> Company Name </li>
                                                    </strong></label>
                                                <div> <?php echo $company; ?> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong class="colorlite">
                                                        <li> Designation </li>
                                                    </strong></label>
                                                <div> <?php echo $jobrole; ?> </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label><strong class="colorlite">
                                                        <li> Salary </li>
                                                    </strong></label>
                                                <div> <?php echo $salary; ?> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><strong class="colorlite">
                                                        <li> Location </li>
                                                    </strong></label>
                                                <div> <?php echo $location; ?> </div>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label><strong class="colorlite">
                                                        <li> Posted On </li>
                                                    </strong></label>
                                                <div> <?php echo $finalpostedon; ?> </div>
                                            </div>
                                            <?php if ($finaldeadline) { ?>
                                                <div class="col-md-6">
                                                    <label><strong class="colorlite">
                                                            <li> Application Deadline </li>
                                                        </strong></label>
                                                    <div> <?php echo $finaldeadline; ?> </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </ul>

                                    <?php if ($jobdescription) { ?>
                                        <hr />

                                        <label for="jobdesc"> <strong>
                                                <li> Description </li>
                                            </strong> </label>
                                        <div id="jobdesc"> <?php echo $jobdescription; ?> </div>
                                    <?php } ?>


                                    <?php if ($pdflink) { ?>
                                        <hr />

                                        <label for="jobpdf"> <strong>
                                                <li> PDF </li>
                                            </strong> </label>
                                        <div id="jobpdf">
                                            <a href="<?php echo $pdflink; ?>" target="_blank" class="pdflink"> Click here to open PDF </a>
                                        </div>
                                    <?php } ?>


                                    <?php if ($aboutcompany) { ?>
                                        <hr />

                                        <label for="aboutcomp"> <strong>
                                                <li> About Company </li>
                                            </strong> </label>
                                        <div id="aboutcomp"> <?php echo $aboutcompany; ?> </div>
                                    <?php } ?>


                                    <hr />

                                    <label for="postedby"> <strong>
                                            <li> Posted By </li>
                                        </strong> </label>
                                    <div id="postedby"> <?php echo $finalpostedby; ?> <br />
                                        <?php if ($postedby != "admin") { ?>
                                            <div style="font-size: 16px;"> Note: The opporutunity posted by Alumni has been <u>varified</u> by INDUS UNIVERSITY*
                                            </div>
                                        <?php } ?>
                                    </div>


                                    <hr />

                                    <label for="jobcontact"> <strong>
                                            <li> Contact </li>
                                        </strong> </label>
                                    <div id="jobcontact"> <?php echo $contactdetail; ?> </div>

                                </ul>
                                <hr />

                                <input type="text" name="permitorforbid" value="<?php echo $srno; ?>" hidden>

                                <button id="btnallow" class="btn btn-primary mt-3 col-md-12" formaction="./allow.php">PERMIT JOB POSTING</button>
                                <button class="btn btn-primary mt-3 col-md-12" formaction="./forbid.php">FORBID POSTING AND REMOVE DATA FROM DATABASE</button>

                            </form>

                        </div>


                <?php
                    }
                endwhile;
                ?>
            </div>

        </div>
</body>

<footer>
    <?php
    require_once "../footer/footer.php";
    ?>
</footer>

</html>
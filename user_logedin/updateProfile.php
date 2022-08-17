<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if (!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin'] !== true) {
        header("location: login.php");
    }
}

$srno = $_SESSION['srno'];



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
    <script src="dist/the-datepicker.js"></script>
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

    <div class="container mt-4">

        <?php
        // fetch data fro database
        $eve = "SELECT * FROM users WHERE srno = $srno";
        $eve_q = mysqli_query($conn, $eve);

        while ($row = mysqli_fetch_assoc($eve_q)) : {
                $profileimg = $row['profileimg'];
                $fname = $row['first name'];
                $lname = $row['last name'];
                $email = $row['email'];
                $phoneno = $row['phoneno'];
                $enrolment = $row['enrolment'];
                $institute = $row['institute'];
                $branch = $row['branch'];
                $degree = $row['obtained degree'];
                $passout = $row['passout'];
                $company = $row['company'];
                $designation = $row['designation'];
                $country = $row['country'];
                $city = $row['city'];
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

        <?php
        // update data in databasse
        if (isset($_POST['send'])) {

            //profile image 
            $destinationfile = $profileimg;
            if (isset($_FILES['profileimg'])) {
                $files = $_FILES['profileimg']; // original image/file
                $filename = $files['name']; //filename of file
                $fileerror = $files['error'];
                $filetemp = $files['tmp_name'];

                $fileext = explode('.', $filename);
                $filecheck = strtolower(end($fileext));

                $fileextstored = array('png', 'jpg', 'jpeg');

                if (in_array($filecheck, $fileextstored)) {
                    // store file in local folder
                    $destinationfile = '../uploads/profileimgs/' . $filename;
                    move_uploaded_file($filetemp, $destinationfile);
                }
            }

            $uprofileimg = $destinationfile;
            $uemail =  $_POST["email"];
            $uphoneno = $_POST["phone"];
            $ucompany = $_POST["company"];
            $udesignation = $_POST["designation"];
            $ucountry = $_POST["country"];
            $ucity = $_POST["city"];

            //thapa
            $q = "UPDATE users SET `profileimg`='$uprofileimg', `email`='$uemail', `phoneno`='$uphoneno', `company`='$ucompany', `designation`='$udesignation', `country`='$ucountry', `city`='$ucity' WHERE srno=$srno ";

            $run = mysqli_query($conn, $q);

            echo "<meta http-equiv='refresh' content='0'>";
        }
        ?>



        <div class="card">
            <form class="form needs-validation" action="./updateProfile.php" method="POST" enctype="multipart/form-data" novalidate>

                <!-- <h3 class="bl">Profile</h3> -->

                <?php
                // notification
                if (isset($_POST['send'])) {
                    if ($run) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="msg"><?php echo "Profile updated sucessfully <br/> Please refresh the page for better experiance!"; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    } else {
                        echo "Something went wrong!" . mysqli_error($conn);
                    }
                }
                ?>


                <div class="form-group row mt-3">
                    <div class="form-group col-md-12 text-center">

                        <!-- profile img code paste here -->

                        <div class="btn-group dropend">
                            <div type="button" class="procontainer dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <img id="profileDisplay" src="<?php if ($profileimg == "noimage") {
                                                                    echo "../uploads/profileimgs/profile2.jpg";
                                                                } else {
                                                                    echo $profileimg;
                                                                } ?> " class="img-thumbnail border border-1 border-secondary rounded-3 mx-auto proimg" width="130vw" height="130vh" />
                                <div class="middle">
                                    <div class="text">Click to change profie photo</div>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a onclick="triggerClick()" class="dropdown-item" href="#">
                                        Update photo
                                        <input onchange="displayImage(this)" name="profileimg" id="profileimg" type="file" class="hidefile" />
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="#">Remove photo</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <script src="../JS/scripts.js"></script>



                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <!-- <label for="fname">First name</label> -->
                        <input required disabled type="text" name="fname" class="form-control" id="fname" placeholder="First name" value="<?php echo $fname; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <!-- <label for="lname">Last name</label> -->
                        <input required disabled type="text" name="lname" class="form-control" id="lname" placeholder="Last name" value="<?php echo $lname; ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <!-- <label for="inputEmail4">Email</label> -->
                        <input required type="email" name="email" class="form-control" placeholder="Email ID" value="<?php echo $email; ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend">+91</span>
                            <input required type="number" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phoneno; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <input required disabled type="text" name="enrolment" class="form-control" placeholder="Enrolment Number" value="<?php echo $enrolment; ?>">
                    </div>
                </div>

                <fieldset>
                    <legend style="font-size: 16px; margin-top: 12px;">Educational Details:</legend>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-6">
                            <input disabled type="text" name="institute" class="form-control" placeholder="Institute" value="<?php echo $finalinstitute; ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <input disabled type="text" name="branch" class="form-control" placeholder="Branch" value="<?php echo $finalbranch; ?>">
                        </div>
                    </div>


                    <div class="form-group row mt-3">
                        <div class="form-group col-md-6">
                            <!-- <label for="course">Course</label> -->
                            <input disabled type="text" name="course" class="form-control" placeholder="Course" value="<?php echo $finaldegree; ?>">
                        </div>

                        <div class="form-group col-md-6">
                            <input disabled type="text" name="year" class="form-control" placeholder="Passout Year" value="<?php echo $passout; ?>">
                        </div>

                    </div>

                </fieldset>



                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <label> Current working company </label>
                        <input type="text" name="company" class="form-control" placeholder="Current working company" value="<?php if (!empty($company)) {
                                                                                                                                echo $company;
                                                                                                                            } ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label> Work designation </label>
                        <input type="text" name="designation" class="form-control" placeholder="Work designation" value="<?php if (!empty($designation)) {
                                                                                                                                echo $designation;
                                                                                                                            } ?>">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <label> Country </label>
                        <input required type="text" name="country" class="form-control" placeholder="Country" value="<?php if (!empty($country)) {
                                                                                                                            echo $country;
                                                                                                                        } ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label> City </label>
                        <input required type="text" name="city" class="form-control" placeholder="City" value="<?php if (!empty($city)) {
                                                                                                                    echo $city;
                                                                                                                } ?>">
                    </div>
                </div>


                <button type="submit" name="send" class="btn btn-primary col-md-12 mt-4 pull-right" id="btnContactUs">
                    UPDATE
                </button>

            </form>
        </div>

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


</body>

</html>
<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

$usrno = $_SESSION["srno"];
$uemail = $_SESSION["email"];
$ufname = $_SESSION["fname"];
$ulname = $_SESSION["lname"];

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../logreg/login.php");
}


$eve = "SELECT * FROM users WHERE srno = $usrno";
$eve_q = mysqli_query($conn, $eve);

while ($row = mysqli_fetch_assoc($eve_q)) : {
        $fname = $row['first name'];
        $lname = $row['last name'];
    }
endwhile;


if (isset($_POST['send'])) {

    $jobrole = $_POST['jobrole'];
    $jobdescription = $_POST['jobdescription'];
    $jobcompany = $_POST['jobcompany'];
    $aboutcompany = $_POST['aboutcompany'];
    $jobsalary = $_POST['jobsalary'];
    $jobeligibility = $_POST['jobeligibility'];
    $jobreqexp = $_POST['jobreqexp'];
    $joblocation = $_POST['joblocation'];
    $jobdeadline = date('Y-m-d', strtotime($_POST['jobdeadline']));
    $jobcontact = $_POST['jobcontact'];
    $jobverified = $_POST['jobverified'];
    $jobpostedby = $_POST['jobpostedby'];

    if (isset($_FILES['file'])) {

        $fileDestination = "nofile";

        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileDestination = '../uploads/jobdocuments/' . $fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    // echo "// error msg -> file size is too big!";
                }
            } else {
                // echo "// error msg -> error uploading your file!";
            }
        } else {
            // echo "// error msg -> you can't upload this type!";
        }
    } else {
        echo "file not selected";
    }


    // insert into jobopportunities table with PDF
    // $q = "INSERT INTO `jobopportunities`(`job role`, `job description`, `company`, `about company`, `pdf link`, `salary`, `location`, `deadline`, `contact detail`) VALUES ()";

    //add job to jobopportinities table
    $q = "INSERT INTO `jobopportunities`(`job role`, `job description`, `company`, `about company`, `pdf link`, `salary`, `eligibility`, `reqexp`, `location`, `deadline`, `contact detail`, `verified`, `posted by`) VALUES ('$jobrole', '$jobdescription', '$jobcompany', '$aboutcompany', '$fileDestination', '$jobsalary', '$jobeligibility', '$jobreqexp', '$joblocation', '$jobdeadline', '$jobcontact', '$jobverified' ,'$jobpostedby')";


    $run = mysqli_prepare($conn, $q);
}

?>


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

        <div class="card">
            <form class="form needs-validation" action="./addjobbyuser.php" method="POST" enctype="multipart/form-data" novalidate>
                <?php
                if (isset($_POST['send'])) {
                    if (mysqli_stmt_execute($run)) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="msg"><?php echo "Job posted sucessfully"; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                <?php
                    } else {
                        echo "Something went wrong!" . mysqli_error($conn);
                    }
                }
                ?>
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong class="msg"><?php echo "> use \\ befor ' and \" <br/> > Use br tag for new line <br/> > You can use HTML tags for formatting!" ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <h3 class="bl">Post job opportunities</h3>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="jobrole" id="jobrole" placeholder="Job Title" required />
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <textarea name="jobdescription" id="jobdescription" class="form-control" rows="5" required placeholder="Job Description"></textarea>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <input name="jobcompany" class="form-control" placeholder="Company Name" required>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <textarea rows="5" name="aboutcompany" class="form-control" placeholder="About Company"></textarea>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <input id="jobsalary" name="jobsalary" class="form-control" placeholder="Salary" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input id="joblocation" name="joblocation" class="form-control" placeholder="Location" required>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <textarea rows="5" name="jobeligibility" class="form-control" placeholder="Required Degree / Eligibility" required></textarea>
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <input id="jobreqexp" name="jobreqexp" class="form-control" placeholder="Required Experience">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <label for="jobdeadline">Deadline for apply</label>
                        <input type="date" id="jobdeadline" class="form-control" name="jobdeadline" placeholder="dd-mm-yyyy" min="<?php echo date("Y-m-d"); ?>" max="2030-12-31" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jobfile">PDF or Image - Job Details</label>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <label for="jobcontact">Contact Details & How to Apply</label>
                        <textarea value="Contact T&P cell of INDUS UNIVERSITY for more details." rows="2" type="text" class="form-control" name="jobcontact" id="jobcontact" placeholder="Contact Details" value="$uemail" required> <?php echo "$ufname $ulname > Email: $uemail"; ?> </textarea>
                        <input name="jobpostedby" class="form-control" value="<?php echo $usrno; ?>" hidden required>
                        <input name="jobverified" class="form-control" value="false" hidden required>
                    </div>
                </div>

                <button type="submit" name="send" class="btn btn-primary mt-4 pull-right" id="btnContactUs">
                    POST JOB OPPORTUNITIY
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
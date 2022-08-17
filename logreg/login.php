<?php

require_once "../bootstart.php";

//This script will handle login
session_start();

// check if the user is already logged in
if (isset($_SESSION['email'])) {
    header("location: ../user_logedin/welcome.php");
    exit;
}

if (isset($_SESSION['loggedin']) || isset($_SESSION['loggedin']) == true) {
    header("location: ../user_logedin/welcome.php");
    exit;
}

require_once "./config.php";


$email = $password = $fname = "";
$err1 = $err2 = $err3 = $err4 = $err5  = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['email'])) || empty(trim($_POST['password']))) {
        $err1 = "All field required!";
    } else {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
    }


    if (empty($err1)) {
        $sql = "SELECT `srno`, `first name`, `last name`, `email`, `password`, `role` FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_email);
        $param_email = $email;


        // Try to execute this statement
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $srno, $fname, $lname, $email, $hashed_password, $role);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        // this means the password is corrct. Allow user to login
                        $_SESSION["email"] = $email;
                        $_SESSION["srno"] = $srno;
                        $_SESSION["fname"] = $fname;
                        $_SESSION["lname"] = $lname;
                        $_SESSION["loggedin"] = true;

                        // Redirect user to welcome page
                        if ($role == 'admin') {
                            $_SESSION["loggedinadmin"] = true;
                            header("location: ../Admin/adminlog.php");
                        } else {
                            header("location: ../user_logedin/welcome.php");
                        }
                    }
                    else {
                        $err5 = "EmailId and password not match!";
                    }
                }
            } else {
                $err2 = "EmailId not registered in the system!";
            }
        } else {
            $err3 = "Something went wrong!" . mysqli_error($conn);
        }
    } else {
        $err4 = "Something went wrong!" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">

</head>

<body>

    <header>
        <nav class="nav1 navbar navbar-light bg-light">
            <div class="">
                <!-- container-fluid -->
                <a class="navbar-brand" href="../index.php">
                    <img class="logoimg" src="../imgfolder/logo.png" alt="Indus University">
                </a>

                <img src="https://img.icons8.com/material-outlined/60/5a5147/vertical-line.png" />

                <a class="navbar-brand" href="../user_logedin/alumniboard.php">
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
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                        <?php } else { ?>
                            <li><a class="dropdown-item" href="./login.php">Login</a></li>
                            <li><a class="dropdown-item" href="./signup.php ">Register</a></li>
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
                            <a class="nav-link " aria-current="page" href="../user_logedin/welcome.php">Home</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="../index.php">Home</a>
                        </li>
                    <?php } ?>

                    <li class="nav-item ">
                        <a class="nav-link" href="../user_logedin/allevents.php">Events</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../user_logedin/alljobs.php">Jobs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../noticeandupdate/noticeandupdate.php">Updates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user_logedin/allnewsletter.php">Newsletter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user_logedin/photos.php">Photos</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown show dark">
                            <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                            <div style="font-size: 18px; " class="dropdown-menu dropdown-menu-dark drop2" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="../user_logedin/contactus.php">Contact us</a>
                                <a class="dropdown-item" href="../user_logedin/alumniboard.php">IUAA Board</a>
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

            <div class="card">
                <form class="form needs-validation" action="./login.php" method="POST" novalidate>

                    <div class="Gbutton">
                        <!-- IF for show Google button only when not registerd with google. after register with google, google button disappear -->



                            <div class="form-group row mt-3">
                                <div class="form-group col-md-12">
                                    <button type="button" class="gbutton" onclick="location.href='./index.php'">
                                        <svg width="26" height="26" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                            <defs>
                                                <path id="a" d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                            </defs>
                                            <clipPath id="b">
                                                <use xlink:href="#a" overflow="visible" />
                                            </clipPath>
                                            <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                            <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                            <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                            <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                                        </svg>
                                        Login with Google
                                    </button>
                                </div>
                            </div>
                            <!-- <h3 class="bl">Login</h3> -->

                            <br>
                            <div class="separator"> OR </div> <br>

                            <!-- close IF who show Google when no Gsession -->

                    </div>

                    <?php

                    if (isset($_GET['newpwd'])) {
                        if ($_GET['newpwd'] == "passwordupdated") {
                    ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong class="msg"><?php echo "Password reset successfuly"; ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    <?php
                        }
                    }

                    ?>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-12">
                            <!-- <label for="inputEmail4">Email</label> -->
                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Registered Email ID" value="<?php if (isset($_POST['email'])) {
                                                                                                                                                echo trim($_POST['email']);
                                                                                                                                            } ?>" required />
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="form-group col-md-12">
                            <!-- <label for="password">Password</label> -->
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
                        </div>
                    </div>

                    <div class="form-group" style="text-align: right; padding-right: 10px;">
                        <label class="check mt-2" id="check2">
                            <a href="./resetpassword.php">forgot password?</a>
                        </label>
                    </div>

                    <div class="phppool">
                        <?php

                        $arr_err = array("$err1", "$err2", "$err3", "$err4", "$err5");

                        foreach ($arr_err as $value) {
                            if ($value == NULL) {
                                echo "";
                            } else {
                        ?>
                                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                                    <strong class="msg"><?php echo $value; ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }

                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary">LOGIN</button>

                    <br><br>
                    <hr>
                    <div class="form-group">
                        <label class="check">
                            If you are not registered, then <a href="./signup.php">click here</a> to Register.
                        </label>
                    </div>

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

                <div class="backgray " id="newswala">
                    <a href="./user_logedin/allnewsletter.php">
                        <h5 class="mb-0">CHECKOUT NEWSLETTER</h5>
                    </a>
                </div>

                <div class="backgray " id="noticewala">
                    <a href="./noticeandupdate/noticeandupdate.php">
                        <h5 class="mb-0">CHECKOUT NOTICE AND UPDATES</h5>
                    </a>
                </div>

                <div class="backgray " id="certificationcoursewala">
                    <a href="./user_logedin/certificationcourses.php">
                        <h5 class="mb-0">CHECKOUT CERTIFICATION COURSES</h5>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <?php
    require_once "../footer/footer.php";
    ?>

    </div>

</body>

</html>
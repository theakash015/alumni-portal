<?php
require_once "../bootstart.php";
require_once "./config.php";

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


$email = $password = $confirm_password = $fname = $lname = $phone = $gender = $role = $degree = $year = $branch = $institute = $company = $designation = $country = $city = $enrolment = "";

$email_err = $password_err = $confirm_password_err = $fname_err = $lname_err = $phone_err = $gender_err = $role_err = $degree_err = $year_err = $branch_err = $institute_err = $company_err = $designation_err = $country_err = $city_err = $err = $enrolment_err = "";

$destinationfile = "noimage";


//normla signup check
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //profile image 
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


    //check if email is empty
    if (empty(trim($_POST["email"]))) {
        $email_err = "Email can't be blank";
    } else {
        $sql = "SELECT srno FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // set value for param email
            $param_email = trim($_POST['email']);

            //execute
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "Email already registered";
                } else {
                    $email = trim($_POST['email']);
                    // echo "email pass </br>";
                }
            } else {
                $err = "Something went wrong!" . mysqli_error($conn);
            }
        } else {
            $err = "Something went wrong!" . mysqli_error($conn);
        }
    }

    mysqli_stmt_close($stmt);

    // check for password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password can't be blank";
    } elseif (strlen(trim($_POST['password'])) < 5) {
        $password_err = "Password can't be less than 5 characters";
    } else {
        $password = trim($_POST['password']);
        // echo "password pass </br>";
    }

    // check for confirm password
    if (trim($_POST['password']) != trim($_POST['confpassword'])) {
        $password_err = "Password mismatch!";
    } else {
        // echo "confirm-password pass </br>";
    }

    // chech for first name
    if (empty(trim($_POST['fname']))) {
        $fname_err = "first name can't be blank";
    } else {
        $fname = trim($_POST['fname']);
    }

    // chech for last name
    if (empty(trim($_POST['lname']))) {
        $lname_err = "last name can't be blank";
    } else {
        $lname = trim($_POST['lname']);
    }

    // check for phone number validation
    if (empty($_POST['phone'])) {
        $phone_err = "Pleasse enter valid phone number";
    } else {
        $temp = trim($_POST['phone']);
        if (preg_match('/^[6-9][0-9]{9}$/', $temp)) {
            // echo "in 10d";
            $check = "SELECT srno FROM users WHERE `phoneno` = $temp";
            $rs = mysqli_query($conn, $check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);

            if ($data >= 1) {
                $phone_err = "Number Already Exists<br/>";
            } else {
                $phone = $temp;
                // echo "phone pass";
            }
        } else {
            $phone_err = "Please enter valid number";
        }
    }

    // chech for enrolment number
    if (empty(trim($_POST['enrolment']))) {
        $enrolment_err = "enrolment number can't be blank";
    } else {
        $enrolment = trim($_POST['enrolment']);
    }

    // chech for gender
    if (empty(trim($_POST['gender']))) {
        $gender_err = "gender name can't be blank";
    } else {
        $gender = trim($_POST['gender']);
    }

    // chech for role
    if (empty(trim($_POST['role']))) {
        $role_err = "role can't be blank";
    } else {
        $role = trim($_POST['role']);
    }


    // chech for institute validation
    if (trim($_POST['institute']) == "Institute") {
        $institute_err = "please select valid option for institute";
    } else {
        $institute = trim($_POST['institute']);
    }

    // chech for branch validation
    if (trim($_POST['branch']) == "Branch") {
        $branch_err = "please select valid option for branch";
    } else {
        $branch = trim($_POST['branch']);
    }

    // chech for course validation
    if (trim($_POST['course']) == "Obtained degree") {
        $degree_err = "please select valid option for Obtained Degree";
    } else {
        $degree = trim($_POST['course']);
    }

    // chech for year validation
    if (trim($_POST['year']) == "Passout year") {
        $year_err = "please select valid option for passout year";
    } else {
        $year = trim($_POST['year']);
    }

    // chech for company name
    if (empty(trim($_POST['company']))) {
        $company = trim($_POST['company']);
        // echo "company pass </br>";
    }

    // chech for designation name
    if (empty(trim($_POST['designation']))) {

        $designation = trim($_POST['designation']);
        // echo "designation pass </br>";
    }

    // chech for country name
    if (empty(trim($_POST['country']))) {

        $country = trim($_POST['country']);
        // echo "country pass </br>";
    }

    // chech for city name
    if (empty(trim($_POST['city']))) {

        $city = trim($_POST['city']);
        // echo "city pass </br>";
    }



    // if there no error, go ahead and insert into database
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($fname_err) && empty($lname_err) && empty($phone_err) && empty($gender_err) && empty($role_err) && empty($err) && empty($degree_err) && empty($year_err) && empty($branch_err) && empty($institute_err) && empty($company_err) && empty($designation_err) && empty($country_err) && empty($city_err) && empty($enrolment_err)) {

        $sql = "INSERT INTO `users` (`profileimg`, `first name`, `last name`, `email`, `gender`, `password`, `phoneno`, `role`, `enrolment`, `institute`, `branch`, `obtained degree`, `passout`, `company`, `designation`, `country`, `city`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {

            mysqli_stmt_bind_param($stmt, "sssssssssssssssss", $param_profileimg, $param_fname, $param_lname, $param_email, $param_gender, $param_password, $param_phone, $param_role, $param_enrolment, $param_institute, $param_brach, $param_degree, $param_year, $param_company, $param_designation, $param_country, $param_city);

            $param_profileimg = $destinationfile;
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_gender = $gender;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_phone = $phone;
            $param_role = $role;
            $param_enrolment = $enrolment;
            $param_institute = $institute;
            $param_brach = $branch;
            $param_degree = $degree;
            $param_year = $year;
            $param_company = $company;
            $param_designation = $designation;
            $param_country = $country;
            $param_city = $city;

            // execute
            if (mysqli_stmt_execute($stmt)) {
                header("location: login.php");
                // echo "header pass </br>";
            } else {
                echo "can't redirect to login page!" . mysqli_error($conn);
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
    <title>IU Alumni signup</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
        <div class="container">

            <div class="card">

                <!-- bootstart form  -->
                <form class="form needs-validation" action="./signup.php" method="POST" enctype="multipart/form-data" novalidate>

                    <?php // if(isset($_SESSION["gimg"])) { echo $_SESSION["gimg"]; } 
                    ?>
                    <?php // if(isset($_SESSION['gfname'])) { echo $_SESSION['gfname']; } 
                    ?>
                    <?php // if(isset($_SESSION['glname'])) { echo $_SESSION['glname']; } 
                    ?>
                    <?php // if(isset($_SESSION['gemail'])) { echo $_SESSION['gemail']; } 
                    ?>


                    <div class="Gbutton">
                        <!-- IF for show Google button only when not registerd with google. after register with google, google button disappear -->
                        <?php
                        if (isset($_SESSION["gimg"]) or isset($_SESSION['gfname']) or isset($_SESSION['glname']) or isset($_SESSION['gemail'])) {
                        } else {
                        ?>


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
                                        Fetch data with Google
                                    </button>
                                </div>
                            </div>

                            <br>
                            <div class="separator"> OR </div> <br>

                            <!-- close IF who show Google when no Gsession -->
                        <?php
                        }
                        ?>
                    </div>

                    <!-- <div class="form-group row mt-3">
                        <div class="form-group col-md-12 text-center">
                            <img src="<?php //if (isset($_SESSION["gimg"])) {
                                        //echo $_SESSION["gimg"];
                                        //} 
                                        ?>" class="rounded mx-auto" />
                        </div>
                    </div> -->

                    <?php if (isset($_SESSION["gimg"])) {
                        $gimg = $_SESSION["gimg"];
                    } ?>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-12 text-center">

                            <!-- profile img code paste here -->

                            <div class="btn-group dropend">
                                <div type="button" class="procontainer dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div>
                                        <img id="profileDisplay" src="<?php if (isset($_SESSION["gimg"])) {
                                                                            echo $gimg;
                                                                        } elseif ($destinationfile == "noimage") {
                                                                            echo "../uploads/profileimgs/profile2.jpg";
                                                                        } elseif ($destinationfile != "noimage") {
                                                                            echo "$destinationfile";
                                                                        } else {
                                                                            echo "../uploads/profileimgs/profile2.jpg";
                                                                        } ?> " class="img-thumbnail border border-1 border-secondary rounded-3 mx-auto proimg" width="130vw" height="130vh" />
                                    </div>
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
                            <input required type="text" name="fname" class="form-control" id="fname" placeholder="First name" value="<?php if (isset($_SESSION['gfname'])) {
                                                                                                                                            echo $_SESSION['gfname'];
                                                                                                                                        } elseif (isset($_POST['fname'])) {
                                                                                                                                            echo trim($_POST['fname']);
                                                                                                                                        } ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label for="lname">Last name</label> -->
                            <input required type="text" name="lname" class="form-control" id="lname" placeholder="Last name" value="<?php if (isset($_SESSION['glname'])) {
                                                                                                                                        echo $_SESSION['glname'];
                                                                                                                                    } elseif (isset($_POST['lname'])) {
                                                                                                                                        echo trim($_POST['lname']);
                                                                                                                                    } ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-12">
                            <!-- <label for="inputEmail4">Email</label> -->
                            <input required type="email" name="email" class="form-control" placeholder="Email ID" value="<?php if (isset($_SESSION['gemail'])) {
                                                                                                                                echo $_SESSION['gemail'];
                                                                                                                            } elseif (isset($_POST['email'])) {
                                                                                                                                echo trim($_POST['email']);
                                                                                                                            } ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-6">
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">+91</span>
                                <input required type="number" name="phone" class="form-control" placeholder="Phone number" value="<?php if (isset($_POST['phone'])) {
                                                                                                                                        echo trim($_POST['phone']);
                                                                                                                                    } ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <input required type="text" name="enrolment" class="form-control" placeholder="Enrolment Number" value="<?php if (isset($_POST['enrolment'])) {
                                                                                                                                        echo trim($_POST['enrolment']);
                                                                                                                                    } ?>">
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-6">
                            <select required name="gender" id="gender" class="form-select">
                                <?php
                                if (isset($_POST['gender'])) {
                                    $smgender = trim($_POST['gender']);
                                } else {
                                    $smgender = "notselected";
                                }
                                ?>
                                <option <?php if ($smgender == "notselected") {
                                            echo "selected";
                                        } ?> disabled>Gender</option>
                                <option <?php if ($smgender == "male") {
                                            echo "selected";
                                        } ?> value="male">Male</option>
                                <option <?php if ($smgender == "female") {
                                            echo "selected";
                                        } ?> value="female">Female</option>
                                <option <?php if ($smgender == "other") {
                                            echo "selected";
                                        } ?> value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select required name="role" id="role" class="form-select">
                                <?php
                                if (isset($_POST['role'])) {
                                    $smrole = trim($_POST['role']);
                                } else {
                                    $smrole = "notselected";
                                }
                                ?>
                                <option <?php if ($smrole == "notselected") {
                                            echo "selected";
                                        } ?> disabled>Role</option>
                                <option <?php if ($smrole == "1") {
                                            echo "selected";
                                        } ?> value="1">Current Student</option>
                                <option <?php if ($smrole == "2") {
                                            echo "selected";
                                        } ?> value="2">Alumni / Passout</option>
                                <option <?php if ($smrole == "3") {
                                            echo "selected";
                                        } ?> value="3">Staff / Faculty</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="form-group col-md-6">
                            <!-- <label for="password">Password</label> -->
                            <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label for="confpassword"> Confirm password</label> -->
                            <input required type="password" name="confpassword" class="form-control" id="confpassword" placeholder="Confirm password">
                        </div>
                    </div>

                    <fieldset>
                        <legend style="font-size: 16px; margin-top: 12px;">Educational Details:</legend>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-6">
                                <select required name="institute" id="institute" class="form-select">
                                    <option required selected disabled value="">Institute</option>
                                    <?php
                                    $institute = "SELECT * FROM institute_tbl";
                                    $institute_q = mysqli_query($conn, $institute);

                                    while ($row = mysqli_fetch_assoc($institute_q)) :
                                    ?>
                                        <option value="<?php echo $row['ins_id'] ?> "> <?php echo $row['ins_name']; ?> </option>
                                    <?php endwhile; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid institute.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <select required name="branch" id="branch" class="form-select">
                                    <option selected disabled value="">Branch</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid branch.
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mt-3">
                            <div class="form-group col-md-6">
                                <!-- <label for="course">Course</label> -->
                                <select required id="course" name="course" class="form-select">
                                    <option selected disabled value="">Obtained degree</option>

                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid course.
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <select required name="year" class="form-select">
                                    <option selected disabled value="">Passout year</option>
                                    <option value="2018">2015</option>
                                    <option value="2018">2016</option>
                                    <option value="2018">2017</option>
                                    <option value="2018">2018</option>
                                    <option value="2019">2019</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2021">2022</option>
                                    <option value="2021">2023</option>
                                    <option value="2021">2024</option>
                                    <option value="2021">2025</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid year.
                                </div>
                            </div>

                        </div>
                    </fieldset>

                    <fieldset>
                        <legend style="font-size: 16px; margin-top: 12px;">Current working Details:</legend>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-6">
                                <input type="text" name="company" class="form-control" placeholder="Current working company" value="<?php if (isset($_POST['company'])) {
                                                                                                                                        echo trim($_POST['company']);
                                                                                                                                    } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="designation" class="form-control" placeholder="Work designation" value="<?php if (isset($_POST['designation'])) {
                                                                                                                                        echo trim($_POST['designation']);
                                                                                                                                    } ?>">
                            </div>
                        </div>

                        <div class="form-group row mt-3">
                            <div class="form-group col-md-6">
                                <input type="text" name="country" class="form-control" placeholder="Country" value="<?php if (isset($_POST['country'])) {
                                                                                                                                        echo trim($_POST['country']);
                                                                                                                                    } ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="city" class="form-control" placeholder="City" value="<?php if (isset($_POST['city'])) {
                                                                                                                                        echo trim($_POST['city']);
                                                                                                                                    } ?>">
                            </div>
                        </div>

                    </fieldset>

                    <div class="form-group mt-3">
                        <div class="form-check">
                            <input required class="form-check-input" type="checkbox" name="check" id="gridCheck">
                            <label class="form-check-label check" id="check2" for="gridCheck">
                                Accept terms and conditions. <a href="./iualumnitnc.php">click here</a> to show terms and conditions.
                            </label>
                        </div>
                    </div>

                    <div class="phppool">
                        <?php

                        $arr_err = array("$err", "$email_err", "$password_err", "$confirm_password_err", "$fname_err", "$lname_err", "$phone_err");

                        foreach ($arr_err as $value) {
                            if ($value == NULL) {
                                echo "";
                            } else {
                        ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong class="msg"><?php echo $value; ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">REGISTER</button>

                    <br><br>
                    <hr>
                    <div class="form-group">
                        <label class="check">
                            If you are already registered, then <a href="./login.php">click here</a> to login
                        </label>
                    </div>

                </form>
            </div>


            <div>
                <script>
                    // institute > branch
                    $('#institute').on('change', function() {
                        var institute_id = this.value;
                        // console.log(institute_id);
                        $.ajax({
                            url: '../ajax/branch.php',
                            type: "POST",
                            data: {
                                institute_id: institute_id
                            },
                            success: function(result) {
                                $('#branch').html(result);
                                // console.log(result);
                            }
                        })
                    });

                    // branch > degree/course
                    $('#branch').on('change', function() {
                        var branch_id = this.value;
                        // console.log(institute_id);
                        $.ajax({
                            url: '../ajax/course.php',
                            type: "POST",
                            data: {
                                branch_id: branch_id
                            },
                            success: function(result2) {
                                $('#course').html(result2);
                                // console.log(result2);
                            }
                        })
                    });
                </script>

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
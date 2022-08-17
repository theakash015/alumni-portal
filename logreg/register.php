<?php
require_once "../bootstart.php";
require_once "./config.php";

$email = $password = $confirm_password = $fname = $lname = $degree = $year = $check = $branch = $institute = $phone = $company = $designation = $country = $city = "";
$email_err = $password_err = $confirm_password_err = $fname_err = $lname_err = $degree_err = $year_err = $check_err = $branch_err = $institute_err = $phone_err = $country_err = $designation_err = $company_err = $city_err = $err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

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
        // echo "fname pass </br>";
    }

    // chech for last name
    if (empty(trim($_POST['lname']))) {
        $lname_err = "last name can't be blank";
    } else {
        $lname = trim($_POST['lname']);
        // echo "lname pass </br>";
    }

    // chech for institute validation
    if (trim($_POST['institute']) == "Institute") {
        $institute_err = "please select valid option for institute";
    } else {
        $institute = trim($_POST['institute']);
        // echo "institute pass </br>";
    }

    // chech for branch validation
    if (trim($_POST['branch']) == "Branch") {
        $branch_err = "please select valid option for branch";
    } else {
        $branch = trim($_POST['branch']);
        // echo "branch pass </br>";
    }

    // chech for course validation
    if (trim($_POST['course']) == "Obtained degree") {
        $degree_err = "please select valid option for Obtained Degree";
    } else {
        $degree = trim($_POST['course']);
        // echo "course pass </br>";
    }

    // chech for year validation
    if (trim($_POST['year']) == "Passout year") {
        $year_err = "please select valid option for passout year";
    } else {
        $year = trim($_POST['year']);
        // echo "year pass </br>";
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


    // chech for company name
    if (empty(trim($_POST['company']))) {
        $company_err = "company name can't be blank";
    } else {
        $company = trim($_POST['company']);
        // echo "company pass </br>";
    }

    // chech for designation name
    if (empty(trim($_POST['designation']))) {
        $designation_err = "designation name can't be blank";
    } else {
        $designation = trim($_POST['designation']);
    }

    // chech for country name
    if (empty(trim($_POST['country']))) {
        $country_err = "country name can't be blank";
    } else {
        $country = trim($_POST['country']);
        // echo "country pass </br>";
    }

    // chech for city name
    if (empty(trim($_POST['city']))) {
        $city_err = "city name can't be blank";
    } else {
        $city = trim($_POST['city']);
        // echo "city pass </br>";
    }

    // check for T&C accepted or not
    if (empty($_POST['check'])) {
        $check_err = "pleasse accept term and condition";
    } else {
        // echo "T&C pass </br>";
    }



    // if there no error, go ahead and insert into database
    if (empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($fname_err) && empty($lname_err) && empty($branch_err) && empty($degree_err) && empty($year_err) && empty($check_err) && empty($institute_err) && empty($phone_err) && empty($company_err) && empty($designation_err) && empty($country_err) && empty($city_err)) {
        // echo "in exe pass </br>";
        $sql = "INSERT INTO `users` (`first name`, `last name`, `email`, `phoneno`, `password`, `institute`, `branch`, `obtained degree`, `passout`, `company`, `designation`, `country`, `city`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt) {
            // echo "in stmt pass </br>";

            mysqli_stmt_bind_param($stmt, "sssssssssssss", $param_fname, $param_lname, $param_email, $param_phone, $param_password, $param_institute, $param_brach, $param_degree, $param_year, $param_company, $param_designation, $param_country, $param_city); //  $param_srno, $param_datetime
            // echo "after bind pass </br>";

            // set these parameter
            // $param_srno = NULL;
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_institute = $institute;
            $param_brach = $branch;
            $param_degree = $degree;
            $param_year = $year;
            $param_company = $company;
            $param_designation = $designation;
            $param_country = $country;
            $param_city = $city;
            // $param_datetime = time();

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
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration page</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        FIXME:
    </header>

    <div class="phppool">
        <?php

        $arr_err = array("$email_err", "$password_err", "$confirm_password_err", "$fname_err", "$lname_err", "$branch_err", "$degree_err", "$year_err", "$check_err", "$institute_err", "$phone_err", "$company_err", "$designation_err", "$country_err", "$city_err", "$err");

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

    <div class="main-body">

        <div class="container mt-4">

            <!-- bootstart form  -->
            <form class="form mt-4 needs-validation" action="./register.php" method="POST" novalidate>
                <h3 class="bl">Alumni can Register here.</h3>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <!-- <label for="fname">First name</label> -->
                        <input required type="text" name="fname" class="form-control" id="fname" placeholder="First name">
                    </div>
                    <div class="form-group col-md-6">
                        <!-- <label for="lname">Last name</label> -->
                        <input required type="text" name="lname" class="form-control" id="lname" placeholder="Last name">
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-7">
                        <!-- <label for="inputEmail4">Email</label> -->
                        <input required type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group col-md-5">
                        <!-- <label for="inputEmail4">Email</label> -->
                        <input required type="number" name="phone" class="form-control" placeholder="Phone number">
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

                <div class="form-group row mt-3">

                    <div class="form-group col-md-2">
                        <select required name="institute" id="institute" class="form-select">
                            <option selected disabled value="">Institute</option>
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

                    <div class="form-group col-md-3">
                        <select required name="branch" id="branch" class="form-select">
                            <option selected disabled value="">Branch</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid branch.
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <!-- <label for="course">Course</label> -->
                        <select required id="course" name="course" class="form-select">
                            <option selected disabled value="">Obtained degree</option>

                        </select>
                        <div class="invalid-feedback">
                            Please select a valid course.
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <select required name="year" class="form-select">
                            <option selected disabled value="">Passout year</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid year.
                        </div>
                    </div>

                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-7">
                        <input required type="text" name="company" class="form-control" placeholder="Current working company">
                    </div>
                    <div class="form-group col-md-5">
                        <input required type="text" name="designation" class="form-control" placeholder="Work designation">
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="form-group col-md-6">
                        <input required type="text" name="country" class="form-control" placeholder="Country">
                    </div>
                    <div class="form-group col-md-6">
                        <input required type="text" name="city" class="form-control" placeholder="City">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <div class="form-check">
                        <input required class="form-check-input" type="checkbox" name="check" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Accept terms and conditions
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Register</button>
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


                //Enable dismissal of an alert 
                $('.alert').alert()
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
            </script>
        </div>
    </div>
</body>

</html>
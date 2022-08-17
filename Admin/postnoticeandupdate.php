<?php
require_once "../bootstart.php";
require_once "../logreg/config.php";

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if (!isset($_SESSION['loggedinadmin']) || $_SESSION['loggedinadmin'] !== true) {
        header("location: ../logreg/login.php");
    }
}

if (isset($_POST['send'])) {

    $newstitle =  $_POST["newstitle"];
    $newsdescription =  $_POST["newsdescription"];

    //add event to EVENTS table
    $q = "INSERT INTO `noticeandupdates` (`title`, `description`, `link`) VALUES ('$newstitle', '$newsdescription', 0)";

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

    <div class="container mt-4">

        <div class="card">
            <form class="form needs-validation" action="./postnoticeandupdate.php" method="POST" enctype="multipart/form-data" novalidate>
                <?php
                if (isset($_POST['send'])) {
                    if (mysqli_stmt_execute($run)) {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="msg"><?php echo "Notice and updated posted sucessfully"; ?></strong>
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

                <h3 class="bl">Post Notice and Updates </h3>
                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="newstitle" id="newstitle" placeholder="Event Title" required />
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <div class="form-group col-md-12">
                        <textarea name="newsdescription" id="newsdescription" class="form-control" rows="5" required placeholder="Event Description"></textarea>
                    </div>
                </div>

                <button type="submit" name="send" class="btn btn-primary mt-4 pull-right" id="btnContactUs">
                    POST
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


</body>

<footer>
    <?php
    require_once "../footer/footer.php";
    ?>
</footer>

</html>
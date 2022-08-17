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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indus Alumni Admin Portal</title>
    <link rel="stylesheet" href="../cssfolder/c1.php" type="text/css">

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

            <div class="boxcon">
                <a href="./finalMailMann/index.php">
                    <div class="box">
                        Send mail to Alumni
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./addeve.php">
                    <div class="box">
                        Add events
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./eveshow.php">
                    <div class="box">
                        Event and attendance
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./postnoticeandupdate.php">
                    <div class="box">
                        Post notice
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./addjob.php">
                    <div class="box">
                        Post job opportunities
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./permituserjob.php">
                    <div class="box">
                        Verify and permit job posting that posted by Alumni / user
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./addcertificationcourse.php">
                    <div class="box">
                        Add certification course
                    </div>
                </a>
            </div>

            <div class="boxcon">
                <a href="./postnewsletter.php">
                    <div class="box">
                        Add Newsletter
                    </div>
                </a>
            </div>

        </div>
    </div>
</body>

<footer>
    <?php
    require_once "../footer/footer.php";
    ?>
</footer>

</html>
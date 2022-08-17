<?php

require_once "../bootstart.php";
require_once "./config.php";


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
                <h3 class="bl" style="margin-left: 30px;">Terms and Conditions</h3>
                <div class="tncpage">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui quos, minima velit assumenda, earum aut quidem explicabo asperiores, cumque in eum odit! Beatae pariatur fugit quos qui modi, fuga at necessitatibus molestiae nam natus? Quibusdam sit itaque rerum! Numquam neque eaque magni quos, quod similique amet eum! Asperiores magni quis saepe maxime hic similique in explicabo veniam accusantium exercitationem dolore doloribus sint, adipisci aliquid molestiae ipsam dolor nesciunt nobis dolorem nisi ipsa, totam blanditiis. Ipsum voluptatibus ipsam sit. Explicabo nobis, ipsa facilis excepturi similique labore eaque eos consectetur repellendus delectus laudantium porro, veniam laborum debitis quos sit ipsam magnam officiis? Nesciunt, asperiores neque esse qui reprehenderit harum non explicabo placeat eum soluta optio nisi distinctio voluptates quasi aut tempore. Nihil dicta praesentium dolorum accusantium debitis eos vitae rem, maiores repellendus sunt, obcaecati alias tempora fugiat blanditiis natus quidem? In ipsam a blanditiis dolorem quod deleniti modi tempore maxime aliquid numquam vitae corrupti nihil, facere, itaque laborum esse illo ad sed consequuntur! Qui laudantium cupiditate a deleniti, excepturi officia earum recusandae dolore, vitae voluptate soluta ipsa error adipisci sequi sint iusto? Asperiores iusto ullam inventore doloremque architecto hic. Pariatur alias a, magnam eligendi ea aliquam voluptatum. Ad sapiente odio sed recusandae dolorem numquam amet maiores asperiores unde incidunt, omnis ipsa reprehenderit, molestias consequuntur. Repellat, deserunt labore similique facere ratione eum consectetur voluptas temporibus fugiat vitae, sapiente neque facilis a iure? Nulla adipisci, totam iste, ipsum dolore, sequi labore quibusdam beatae vel itaque quaerat quo cum? Aliquam ratione, placeat neque esse laboriosam magni dolore id saepe maiores eius consectetur deserunt at enim ut possimus eligendi non odit est libero! Vero incidunt exercitationem, quisquam voluptate natus, expedita earum, placeat accusantium atque facere ipsum ea accusamus? Cupiditate, tenetur nisi laudantium ab, officiis consequuntur voluptatibus a amet, dolores eius vel recusandae! Totam nostrum quia praesentium. Ex explicabo molestias animi ducimus nobis natus impedit blanditiis, illo officia ab tempore earum beatae magni tempora incidunt? Esse, voluptate maxime ipsam dolorem harum incidunt a consectetur laborum quam culpa iure, in ipsum ullam omnis laudantium qui. Necessitatibus nostrum dolorum delectus tempore rerum et voluptates expedita, culpa ipsa atque, dicta commodi. Rerum odio laudantium, et debitis reiciendis magnam sit consequuntur velit nesciunt aut perferendis dolorum odit voluptates omnis ut. Voluptatum impedit odio sequi numquam ab ad! Repellendus, ea. Nemo dicta deserunt excepturi illum, doloremque obcaecati sequi debitis accusantium itaque natus praesentium exercitationem, tenetur, voluptatum eius et labore aliquam nobis eos repudiandae corporis voluptatibus. Suscipit iste iusto cupiditate ratione natus expedita. Fuga quo facilis iure repudiandae nisi blanditiis ullam praesentium accusantium obcaecati, vel amet est, inventore necessitatibus ut ad? Ipsum perspiciatis, voluptate placeat sit sequi minus rerum illo delectus iusto at dolor fugiat labore id aspernatur pariatur architecto eum accusamus! Enim quod eaque quisquam, nesciunt provident hic? Nulla similique doloremque possimus impedit, ipsum molestias facere nam culpa, voluptate sit ab illum quasi consequatur eveniet illo nihil nobis. Optio dolores nemo, placeat vero sint commodi veniam corrupti ullam! Recusandae, illo? Fugiat unde soluta aliquid repudiandae voluptas, nostrum rerum corrupti earum culpa repellendus sunt suscipit accusamus doloribus? Tempora sint ducimus asperiores quae mollitia, omnis itaque veniam, maxime molestias, consequuntur delectus porro accusantium nobis laborum quisquam soluta inventore amet! Odio aliquam tempora dolore et, ipsum velit animi inventore nostrum quia, numquam vitae explicabo ex aperiam ratione veniam commodi repudiandae eaque! Dicta repudiandae molestiae ut, maxime voluptatibus enim esse eaque commodi corrupti, reiciendis repellendus obcaecati quos aperiam non fuga tempora temporibus eius consequatur quas unde et quaerat quod voluptates dignissimos! Tenetur explicabo doloribus fugit quas non ipsam, laboriosam blanditiis placeat, quos provident vitae quo quasi voluptatum dolor quisquam recusandae voluptas deserunt voluptate fugiat harum nihil odit. Optio qui quaerat consequatur quia est voluptatum. Vitae dicta esse facere, sit excepturi similique sint corporis eaque inventore alias quidem minus ea possimus nostrum voluptatibus perspiciatis blanditiis culpa neque, odit quam. Perferendis, explicabo. Iusto quos amet doloremque voluptatem quasi perferendis aperiam odit accusantium, tempora officia placeat commodi tenetur ipsa at consequatur possimus alias architecto minima corporis, eaque modi repellendus consectetur. Voluptatum, quos impedit omnis repellat aliquam quam deleniti corrupti dolorem neque tempore quaerat, rerum, architecto eaque. Reprehenderit veniam praesentium et quo ullam, natus quos itaque, consectetur dolore vitae doloremque sequi repudiandae iste tempora beatae reiciendis alias assumenda eligendi dignissimos eos, ipsam maiores fugiat. Impedit ipsa totam sunt ab nisi ut quo reprehenderit fugit quidem itaque, necessitatibus beatae veniam corrupti officiis accusamus, quis adipisci consequuntur vel possimus quia, deserunt minus molestias unde. Laborum impedit dicta tempora eaque labore dolorum adipisci quasi libero et dolorem, vel, iusto enim voluptates amet aliquid earum reprehenderit at consequatur culpa necessitatibus. Similique culpa recusandae facilis eius non debitis possimus impedit! Laborum, consequatur culpa alias facere dignissimos expedita voluptatem in, cumque quisquam perferendis, aperiam vel officia quibusdam eius molestiae ipsa quod! Accusantium sapiente voluptatum quidem quo deleniti illum praesentium, autem, vel ipsam similique facilis veritatis temporibus quia fuga eligendi! Natus repellendus pariatur eligendi repudiandae voluptate sequi, rerum reprehenderit modi quibusdam laboriosam rem quod beatae sint distinctio consequuntur earum maxime esse totam! Quis suscipit perspiciatis dignissimos est! Nemo rerum non ullam voluptate sit. Fuga enim nemo maiores repellat sint id quos, dicta commodi, asperiores corporis accusamus ea explicabo soluta exercitationem consequatur voluptates aliquam? Optio architecto, praesentium nihil consectetur beatae nemo voluptas doloremque aspernatur minima alias, quaerat ut minus illum sint impedit dicta corrupti autem fugiat doloribus vel iure! Officia, odio ea sint quia recusandae autem neque iure harum facere quas corrupti necessitatibus atque incidunt fugiat nesciunt repellendus fuga magnam aut! Quis minus eos deserunt dolorem ex perspiciatis nobis? Id cumque fugit, accusantium voluptatem exercitationem, totam officiis hic architecto officia nemo ab eligendi! Blanditiis quidem rerum dolore error esse laboriosam earum deleniti commodi numquam dignissimos modi reiciendis facilis illo neque exercitationem, sit beatae, totam consectetur officiis. Tempora sint laboriosam quisquam libero repellendus odio accusamus reprehenderit, eaque voluptates recusandae rem deserunt illum itaque. In, quidem ad repellat obcaecati eligendi temporibus tempore quia incidunt sit provident, architecto nulla? Pariatur nisi reprehenderit facere. Hic molestias maiores fuga deleniti non tempore beatae incidunt. Quod praesentium iusto voluptas a? Exercitationem voluptatibus dolor esse?
                </div>

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
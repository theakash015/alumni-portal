<nav class="nav1 navbar navbar-light bg-light">
    <div class="">
        <!-- container-fluid -->
        <a class="navbar-brand" href="#">
            <img class="logoimg" src="./imgfolder/logo.png" alt="Indus University">
        </a>

        <img src="https://img.icons8.com/material-outlined/60/5a5147/vertical-line.png" />

        <a class="navbar-brand" href="#">
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
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                <?php } else { ?>
                    <li><a class="dropdown-item" href="./login.php">Login</a></li>
                    <li><a class="dropdown-item" href="./logreg/signup.php ">Register</a></li>
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
                    <a class="nav-link " aria-current="page" href="./logreg/welcome.php">Home</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="./index.php">Home</a>
                </li>
            <?php } ?>

            <li class="nav-item ">
                <a class="nav-link" href="#">Careers</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Events</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Alumni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Photos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
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
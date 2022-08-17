<?php
require_once "../../bootstart.php";

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
	<title> Send Mail </title>
	<link rel="stylesheet" href="../../cssfolder/c1.php" type="text/css">
</head>

<body>
	<header>
		<nav class="nav1 navbar navbar-light bg-light">
			<div class="">
				<!-- container-fluid -->
				<a class="navbar-brand" href="#">
					<img class="logoimg" src="../imgfolder/logo.png" alt="Indus University">
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
							<li><a class="dropdown-item" href="../../logreg/logout.php">Logout</a></li>
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
							<a class="nav-link " aria-current="page" href="../../user_logedin/welcome.php">Home</a>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link " aria-current="page" href="../../index.php">Home</a>
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
	</header>

	<div class="container mt-4">

		<div class="card">
			<form class="form needs-validation" method="post" action="./send_email.php" enctype="multipart/form-data" novalidate>

				<div class="message">
					<?php
					if (isset($_SESSION['status'])) {
						if ($_SESSION['status'] == "ok") {
					?>

							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong class="msg"><?php echo $_SESSION['result']; ?></strong>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>

						<?php
						} else {
						?>

							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong class="msg"><?php echo $_SESSION['result']; ?></strong>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>

					<?php
						}
						unset($_SESSION['result']);
						unset($_SESSION['status']);
					}

					?>

					<div class="alert alert-dark alert-dismissible fade show" role="alert">
						<strong class="msg"><?php echo "> Can send mail to multiple id togather <br/> > For that separate two ids with comma(,) <br/> > After clicking send mail button, wait for some time until sucess/failure message occurs. This will only take a few moments " ?></strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>

				</div>

				<h3 class="bl">Send mail to Alumni</h3>

				<div class="form-group row mt-3">
					<div class="form-group col-md-12">
						<textarea type="text" class="form-control" id="email" name="email" placeholder="Enter Email ID" rows="3" required></textarea>
					</div>
				</div>

				<div class="form-group row mt-3">
					<div class="form-group col-md-12">
						<input type="text" name="subject" class="form-control" id="subject" placeholder="Enter subject" required />
					</div>
				</div>

				<div class="form-group row mt-3">
					<div class="form-group col-md-12">
						<textarea name="message" id="message" class="form-control" required rows="5" placeholder="Message"></textarea>
					</div>
				</div>

				<div class="form-group row mt-3">
					<div class="form-group col-md-12">
						<button type="submit" name="send" class="btn btn-primary pull-right" id="btnContactUs">
							SEND MAIL
						</button>
					</div>
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

</body>

</html>
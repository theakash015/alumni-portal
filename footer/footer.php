<?php

$evecounter = 0;
$usercounter = 0;
$jobcounter = 0;

$eve = "SELECT * FROM events";
$eve_q = mysqli_query($conn, $eve);

while ($everow = mysqli_fetch_assoc($eve_q)) :
    $evecounter = $evecounter + 1;
endwhile;

$usr = "SELECT * FROM users";
$usr_q = mysqli_query($conn, $usr);

while ($usrrow = mysqli_fetch_assoc($usr_q)) :
    $usercounter = $usercounter + 1;
endwhile;

$job = "SELECT * FROM jobopportunities";
$job_q = mysqli_query($conn, $job);

while ($jobrow = mysqli_fetch_assoc($job_q)) :
    $jobcounter = $jobcounter + 1;
endwhile;

?>

<footer class="bg-dark text-center text-white">
    <!-- Grid container -->

    <!-- Copyright -->
    <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 All Copyright Received
        <?php #echo $evecounter; 
        ?>
        <?php #echo $usercounter; 
        ?>
    </div> -->
    <div class="container footerStates">
        <div class="d-flex justify-content-between align-items-center mt-4 px-4">
            <div class="stats">
                <h5 class="mb-0">Registered user</h5> <span><?php echo $usercounter ?> </span>
            </div>
            <div class="stats">
                <h5 class="mb-0">Number of events</h5> <span><?php echo $evecounter ?> </span>
            </div>
            <div class="stats">
                <h5 class="mb-0">Job opportunities</h5> <span><?php echo $jobcounter ?></span>
            </div>

        </div>
    </div>
    <!-- Copyright -->
</footer>
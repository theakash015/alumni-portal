<?php
    require_once '../logreg/config.php';

    $branch_data = $_POST['branch_id'];
    echo $branch_data;

    $course = "SELECT * FROM course_tbl WHERE br_id = $branch_data";
    $course_q = mysqli_query($conn, $course);

    $output = '<option selected disabled value="">Obtained degree</option>';

    while($course_row = mysqli_fetch_assoc($course_q)) {
        $output .= '<option value="' . $course_row['course_id'].'">' . $course_row['course_name'] . '</option>';
    }
    echo $output;
?>
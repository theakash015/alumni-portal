<?php
    require_once '../logreg/config.php';

    $institute_data = $_POST['institute_id'];
    echo $institute_data;

    $branch = "SELECT * FROM branch_tbl WHERE ins_id = $institute_data";
    $branch_q = mysqli_query($conn, $branch);

    $output = '<option selected disabled value="">Branch</option>';

    while($branch_row = mysqli_fetch_assoc($branch_q)) {
        $output .= '<option value="' .$branch_row['br_id'].'">' . $branch_row['br_name'] . '</option>';
    }
    echo $output;
?>
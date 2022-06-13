<?php
    session_start();
    session_destroy();

    $flag = $_GET['flag'];
    // for teachers
    if ($flag == 1) {
        header('location:signin.php');
    }
    // for students
    else {
        header('location:student_signin.php');
    }

?>


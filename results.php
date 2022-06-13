<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz - Result</title>
</head>
<body>
    <?php

        // Including student's header file
        include "student_header.php";

        // Establishing connection with database
        include "connection.php";

        // If session is not set redirects to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-4">
                <!-- GETS quiz name from URL and displays it -->
                <h2 class="green-text">Results: <?php echo $_GET['quiz'] ?><h2>
            </div>
        </div>
        <?php

            // GETS total marks and obtained marks from URL
            $obtained = $_GET['obtained'];
            $total = $_GET['total'];
        ?>

        <!-- DIV to display the results -->
        <div class="form_card p-5 text-center">
            <div>
                <p>You have scored<p>
            </div>
            <div class="green-text">
                <h1><b><?php echo $obtained ?>/<?php echo $total ?></b><h1>
            </div>
        </div>

        <!-- Link to students home page -->
        <div class="green-text text-center">
            <a href="student_home.php"><i class="fa-solid fa-circle-chevron-left mr-2"></i><b>Go back to all quizes</b></a>
        <div>
    </div>


</body>
</html>
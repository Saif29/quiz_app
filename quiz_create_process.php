<?php

    // Connection with database is established
    include 'connection.php';

    //Session starts
    session_start();

    //Quiz name is retrieved from form input at 'quiz_create.php' file
    $quizName = $_POST['q_name'];

    //Currently active teacher's ID
    $t_id = $_SESSION['id'];

    //Insert Query of SQL to insert data in Quiz Table
    $query = mysqli_query($connection, "insert into quiz(q_name, teacher_id) values('$quizName', '$t_id')");
    
    // Variable to count number of elements in $_POST array
    $count = 0;

    // Array to store all the questions Key
    $a = array();

    // IN this loop all the questions keys from $_POST array are stored in $a array
    foreach ($_POST as $key => $value) {
        $count++;

        if ($count > 1 && ($count-2)%6 == 0) {
            array_push($a, $key);
        }
    }
    // Formula to find total number of questions
    $count = ($count-1)/6;

    // SQL queries to fetch ID of the recently created quiz
    $sql = "SELECT MAX(id) as id FROM quiz WHERE (teacher_id = '$t_id')";
    $result = mysqli_query($connection,$sql);
    $res = mysqli_fetch_assoc($result);
    $quiz_id = $res['id'];


    // This loop inserts each question with its options in the QUESTIONS table in database
    $i = 1;
    while ($i<=$count) {
        $m = substr($a[$i-1],-1);
        $ques = $_POST["question$m"];
        $opA = $_POST["optA$m"];
        $opB = $_POST["optB$m"];
        $opC = $_POST["optC$m"];
        $opD = $_POST["optD$m"];
        $correct = $_POST["correct_opt_$m"];

        $query = mysqli_query($connection, "insert into questions(question, option_A, option_B, option_C, option_D, correct_option, quiz_id) values('$ques', '$opA', '$opB', '$opC', '$opD', '$correct', '$quiz_id')");

        $i++;
    }

    echo "<script> window.location.assign('teacher_quiz.php'); </script>";
?>

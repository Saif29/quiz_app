<?php
    include 'connection.php';
    session_start();

    // GETS number of questions in quiz before editing
    $old_rows = $_GET['rows'];

    // GETS quiz ID from URL
    $quizID = $_GET['qID'];

    // GETS quiz name from the form
    $quizName = $_POST['q_name'];

    // Query to update Quiz NAme and Last MOdified date in database
    $query = mysqli_query($connection, "UPDATE quiz SET q_name='$quizName', last_modified=now() WHERE id = '$quizID'");


    $t_id = $_SESSION['id'];
    
    // $count variable to count total number of questions
    $count = 0;

    // array to store questions key
    $a = array();
    foreach ($_POST as $key => $value) {
        $count++;

        if ($count > 1 && ($count-3)%7 == 0) {
            array_push($a, $key);
        }
    }

    // Formula to calculate total number of questions
    $count = ($count-1)/7;
    
    // Loop to update previously existing questions andd insering new questions
    $i = 1;
    while ($i<=$count) {
        $m = substr($a[$i-1],-1);
        $ques = $_POST["question$m"];
        $opA = $_POST["optA$m"];
        $opB = $_POST["optB$m"];
        $opC = $_POST["optC$m"];
        $opD = $_POST["optD$m"];
        $correct = $_POST["correct_opt_$m"];

        // Condition to update previously existing questions
        if ($i <= $old_rows) {
            $ques_id = $_POST["quesID$m"];
            $query = mysqli_query($connection, "UPDATE questions SET question='$ques', option_A='$opA', option_B='$opB', option_C='$opC', option_D='$opD', correct_option='$correct' WHERE id = '$ques_id'");
        }

        // Inserting new questions
        else {
            $query = mysqli_query($connection, "insert into questions(question, option_A, option_B, option_C, option_D, correct_option, quiz_id) values('$ques', '$opA', '$opB', '$opC', '$opD', '$correct', '$quizID')");
        }

        $i++;
    }

    echo "<script> window.location.assign('teacher_quiz.php'); </script>";
?>  
<?php
    include 'connection.php';
    session_start();

    $old_rows = $_GET['rows'];
    $quizID = $_GET['qID'];
    $quizName = $_POST['q_name'];

    $query = mysqli_query($connection, "UPDATE quiz SET q_name='$quizName', last_modified=now() WHERE id = '$quizID'");

    $t_id = $_SESSION['id'];
    $count = 0;
    $a = array();
    foreach ($_POST as $key => $value) {
        $count++;

        if ($count > 1 && ($count-3)%7 == 0) {
            array_push($a, $key);
        }
    }
    $count = ($count-1)/7;
    print_r($a);

    $i = 1;
    while ($i<=$count) {
        $m = substr($a[$i-1],-1);
        $ques = $_POST["question$m"];
        $opA = $_POST["optA$m"];
        $opB = $_POST["optB$m"];
        $opC = $_POST["optC$m"];
        $opD = $_POST["optD$m"];
        $correct = $_POST["correct_opt_$m"];

        if ($i <= $old_rows) {
            $ques_id = $_POST["quesID$m"];
            $query = mysqli_query($connection, "UPDATE questions SET question='$ques', option_A='$opA', option_B='$opB', option_C='$opC', option_D='$opD', correct_option='$correct' WHERE id = '$ques_id'");
        }
        else {
            $query = mysqli_query($connection, "insert into questions(question, option_A, option_B, option_C, option_D, correct_option, quiz_id) values('$ques', '$opA', '$opB', '$opC', '$opD', '$correct', '$quizID')");
        }

        $i++;
    }

    echo "<script> window.location.assign('teacher_quiz.php'); </script>";
?>  
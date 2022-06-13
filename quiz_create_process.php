<?php
    include 'connection.php';
    session_start();

    $quizName = $_POST['q_name'];
    $t_id = $_SESSION['id'];
    //Insert Query of SQL
    $query = mysqli_query($connection, "insert into quiz(q_name, teacher_id) values('$quizName', '$t_id')");
    //print_r($_POST);
    $count = 0;
    $a = array();
    foreach ($_POST as $key => $value) {
        $count++;

        if ($count > 1 && ($count-2)%6 == 0) {
            array_push($a, $key);
        }
    }
    $count = ($count-1)/6;

    $sql = "SELECT MAX(id) as id FROM quiz WHERE (teacher_id = '$t_id')";
    $result = mysqli_query($connection,$sql);
    $res = mysqli_fetch_assoc($result);
    $quiz_id = $res['id'];
    echo $quiz_id;

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

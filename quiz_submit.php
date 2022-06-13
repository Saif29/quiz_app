<?php

    session_start();
    include_once("connection.php");
    $std_id = $_SESSION['id'];
    $total = $_GET['num'];
    $i = 1;
    $marks = 0;
    while ($i <= $total) {
        $ques_id = $_POST["q_id$i"];
        $selected = $_POST["opt$i"];

        $sql = "SELECT correct_option, quiz_id FROM questions WHERE (id= '$ques_id')";
        $result = mysqli_query($connection,$sql);
        $q_res = mysqli_fetch_assoc($result);
        $correct = $q_res['correct_option'];
        $quiz_id = $q_res['quiz_id'];
        if ($selected == $correct) {
            $marks++;
        }
        $i++;
    }

    $qname = "SELECT q_name FROM quiz WHERE (id= '$quiz_id')";
    $qname_res = mysqli_query($connection,$qname);
    $res_name = mysqli_fetch_assoc($qname_res);
    $quiz_name = $res_name['q_name'];
    echo $quiz_name;
    $query = mysqli_query($connection, "insert into results(obtained, total, student_id, quiz_id) values('$marks', '$total', '$std_id', '$quiz_id')");
    
    echo "<script> window.location.assign('results.php?obtained=$marks&total=$total&quiz=$quiz_name'); </script>";    

?>
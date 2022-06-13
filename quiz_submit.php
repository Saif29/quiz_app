<?php

    session_start();

    // Establishing connection with database
    include_once("connection.php");

    $std_id = $_SESSION['id'];

    // GETS total number of questions from URL
    $total = $_GET['num'];

    $i = 1;

    // $marks is initialized to 0 and it increments with each correct answer
    // $ marks calculates obtained marks
    $marks = 0;
    while ($i <= $total) {
        $ques_id = $_POST["q_id$i"];
        $selected = $_POST["opt$i"];

        // Queries to select correct option for the give question
        $sql = "SELECT correct_option, quiz_id FROM questions WHERE (id= '$ques_id')";
        $result = mysqli_query($connection,$sql);
        $q_res = mysqli_fetch_assoc($result);
        $correct = $q_res['correct_option'];

        $quiz_id = $q_res['quiz_id'];
        
        // If answer is correct $marks variable is incremented by 1
        if ($selected == $correct) {
            $marks++;
        }
        $i++;
    }

    // Fetching quiz name from database to pass in URL in order to be displayed on result screen
    $qname = "SELECT q_name FROM quiz WHERE (id= '$quiz_id')";
    $qname_res = mysqli_query($connection,$qname);
    $res_name = mysqli_fetch_assoc($qname_res);
    $quiz_name = $res_name['q_name'];
    
    // Query to insert the results in database
    $query = mysqli_query($connection, "insert into results(obtained, total, student_id, quiz_id) values('$marks', '$total', '$std_id', '$quiz_id')");
    
    echo "<script> window.location.assign('results.php?obtained=$marks&total=$total&quiz=$quiz_name'); </script>";    

?>
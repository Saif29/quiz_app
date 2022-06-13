<?php
    session_start();
    include 'connection.php';

    // GETS quiz id from URL
    $quizID = $_GET['qID'];

    // Queries to first delete all the results of that specific quiz
    $sql1 = "DELETE FROM results WHERE quiz_id='$quizID'";
    $del1 = mysqli_query($connection, $sql1);

    // Queries to delete all the questions of that specific quiz
    $sql2 = "DELETE FROM questions WHERE quiz_id='$quizID'";
    $del2 = mysqli_query($connection, $sql2);

    // Queries to delete the quiz
    $sql = "DELETE FROM quiz WHERE id='$quizID'";
    $del = mysqli_query($connection, $sql);

    echo "<script>window.location.assign('teacher_quiz.php'); </script>";

?>
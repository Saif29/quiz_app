<?php
    session_start();
    include 'connection.php';

    $quizID = $_GET['qID'];

    $sql1 = "DELETE FROM results WHERE quiz_id='$quizID'";
    $del1 = mysqli_query($connection, $sql1);

    $sql2 = "DELETE FROM questions WHERE quiz_id='$quizID'";
    $del2 = mysqli_query($connection, $sql2);


    $sql = "DELETE FROM quiz WHERE id='$quizID'";
    $del = mysqli_query($connection, $sql);

    echo "<script>window.location.assign('teacher_quiz.php'); </script>";

?>
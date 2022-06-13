<?php
session_start();
include 'connection.php';

// GETS student ID from URL
$studentID = $_GET['StdID'];

// Queries to first delete all the results of that specific student from database
$sql1 = "DELETE FROM results WHERE student_id='$studentID'";
$del1 = mysqli_query($connection, $sql1);

// Queries to delete the student from database
$sql = "DELETE FROM students WHERE id='$studentID'";
$del = mysqli_query($connection, $sql);

echo "<script>window.location.assign('teacher_home.php'); </script>";

?>
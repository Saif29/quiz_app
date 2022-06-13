<?php
session_start();
include 'connection.php';

$studentID = $_GET['StdID'];

$sql1 = "DELETE FROM results WHERE student_id='$studentID'";
$del1 = mysqli_query($connection, $sql1);


$sql = "DELETE FROM students WHERE id='$studentID'";
$del = mysqli_query($connection, $sql);

echo "<script>window.location.assign('teacher_home.php'); </script>";

?>
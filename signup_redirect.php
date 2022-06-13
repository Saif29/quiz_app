<?php
include 'connection.php';
session_start();

$email = $_GET['EMail'];

$sql = "SELECT * FROM teachers WHERE email = '$email'";

$result = mysqli_query($connection,$sql);

$rows = mysqli_num_rows($result);
if($rows == 1) {
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] = $res['id'];
    $_SESSION['email'] = $res['email'];
    echo "<script> window.location.assign('teacher_home.php'); </script>";    
}
else {
    echo "<script>alert('Failed to login!');  window.location.assign('signin.php'); </script>";    
}
?>
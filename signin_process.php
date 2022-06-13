<?php

session_start();
include_once("connection.php");

$email = $_POST['email'];
$pass = $_POST['pass'];
$pass = md5($pass);

$sql = "SELECT * FROM teachers WHERE (email= '$email' && password= '$pass')";

$result = mysqli_query($connection,$sql);

$rows = mysqli_num_rows($result);
if($rows == 1) {
    $res = mysqli_fetch_array($result);
    $_SESSION['id'] = $res['id'];
    $_SESSION['email'] = $res['email'];
    echo "<script> window.location.assign('teacher_home.php'); </script>";    
}
else {
    echo "<script>alert('Incorrect username or password!');  window.location.assign('signin.php'); </script>";    
}

?>
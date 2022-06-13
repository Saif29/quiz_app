<?php

    session_start();
    include_once("connection.php");

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass = md5($pass);

    $sql = "SELECT * FROM students WHERE (s_email= '$email' && pass= '$pass')";

    $result = mysqli_query($connection,$sql);

    $rows = mysqli_num_rows($result);
    if($rows == 1) {
        $res = mysqli_fetch_array($result);
        $_SESSION['id'] = $res['id'];
        $_SESSION['email'] = $res['s_email'];    
        $_SESSION['t_id'] = $res['teacher_id'];
        echo "<script> window.location.assign('student_home.php'); </script>";    
    }
    else {
        echo "<script>alert('Incorrect username or password!');  window.location.assign('signin.php'); </script>";    
    }

?>
<?php
    session_start();
    include 'connection.php';

    // Setting local timezone
    date_default_timezone_set("Asia/Karachi");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = '123456';
    $pass = md5($pass);
    $teacherID = $_SESSION['id'];
    
    //Insert Query of SQL
    $query = mysqli_query($connection, "insert into students(s_name, s_email, pass, teacher_id) values('$name', '$email', '$pass', '$teacherID')");

    echo "<script> window.location.assign('teacher_home.php'); </script>";
    mysqli_close($connection); // Closing Connection with Server
?>
<?php
    include 'connection.php';
    session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass = md5($pass);
    //Insert Query of SQL
    $query = mysqli_query($connection, "insert into teachers(name, email, password) values('$name', '$email', '$pass')");
    echo "<script> window.location.assign('signup_redirect.php?EMail=$email'); </script>";
?>

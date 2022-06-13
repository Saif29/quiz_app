<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>
<body>
    <?php
        include "student_header.php";
        include "connection.php";
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <h2 class="green-text">All Quizes<h2>
            </div>
        </div>
        <?php 
            $tid = $_SESSION['t_id'];
            $sql = "SELECT * FROM quiz WHERE teacher_id = '$tid'";
            $result = mysqli_query($connection,$sql);
        ?>
        <div class="mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-6" scope="col">NAME</th>
                        <th class="col-4" scope="col">TEACHER</th>
                        <th class="col-3 text-center" scope="col">RESULT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)){
                            $q_id = $res['id'];
                            $q_name = $res['q_name'];
                            $t = mysqli_query($connection,"SELECT name FROM teachers WHERE (id = '$tid')");
                            $t_res = mysqli_fetch_assoc($t);
                            $t_name = $t_res['name'];

                            //Retrieving quiz results info
                            $stdID = $_SESSION['id'];
                            $sql1 = "SELECT * FROM results WHERE (student_id = '$stdID' && quiz_id = '$q_id')";
                            $result1 = mysqli_query($connection,$sql1);
                            $rows = mysqli_num_rows($result1);
                            $res1 = mysqli_fetch_assoc($result1);
                            $ob = $res1['obtained'];
                            $total = $res1['total'];
                            if($rows == 0) {
                                echo "<tr><td><b> $q_name </b></td><td>$t_name </td> <td><a href='quiz_attempt.php?q_id=$q_id'><button class='btn btn-block btn-sm green-bg text-light'>Attempt Quiz</button></a></td></tr>";
                            }
                            else {
                                echo "<tr><td><b> $q_name </b></td><td>$t_name </td><td class='text-center'><b> $ob/$total </b><td></td></tr>";
                            }

                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
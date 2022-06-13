<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizes - Results</title>
</head>
<body>
    <?php
        include "teacher_header.php";
        include "connection.php";
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <?php
        echo $_SESSION['email'];
        $quiz_id = $_GET['qID'];
        $tid = $_SESSION['id'];
        $sql = "SELECT * FROM results WHERE quiz_id = '$quiz_id'";
        $result = mysqli_query($connection,$sql);

        $sql2 = "SELECT q_name FROM quiz WHERE id = '$quiz_id'";
        $result2 = mysqli_query($connection,$sql2);
        $res2 = mysqli_fetch_assoc($result2);
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-9"  >
                <h2 class="green-text"><a href="teacher_quiz.php"><i class="fa-solid fa-circle-arrow-left mr-2 green-text"></i></a>Results: <?php echo $res2['q_name'] ?><h2>
            </div>
        </div>
        <div class="mt-5">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="col-4" scope="col">NAME</th>
                        <th class="col-4" scope="col">SUBMITTED ON</th>
                        <th class="col-4" scope="col">RESULT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($res = mysqli_fetch_array($result)){
                            $std_id = $res['student_id'];
                            $sql3 = "SELECT s_name FROM students WHERE id = '$std_id'";
                            $result3 = mysqli_query($connection,$sql3);
                            $res3 = mysqli_fetch_assoc($result3);
                            $std_name = $res3['s_name'];
                            
                            $r_id = $res['id'];
                            $ob = $res['obtained'];
                            $total = $res['total'];
                            $date = strtotime($res['submit_date']);
                            $date = date('d F, Y', $date);
                            echo "<tr><td> $std_name </td><td>$date </td>";
                            echo "<td> $ob/$total </td></tr>";
                        }
                        echo "</table></div>"
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
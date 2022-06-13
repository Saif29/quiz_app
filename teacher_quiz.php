<?php

    // Function to display time in form of 'x days ago' or 'today'
    function get_time_ago( $time )
    {
        $time_difference = time() - $time;

        if( $time_difference < 86400 ) { return 'Today'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day'
        );

        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;

            if( $d >= 1 )
            {
                $t = round( $d );
                return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizes</title>
</head>
<body>
    <?php

        // Include teacher's header file
        include "teacher_header.php";

        // Establishing connection with database
        include "connection.php";

        // if seesion not set redirects to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-9">
                <h2 class="green-text">All Quizes<h2>
            </div>

            <!-- Button to add more quizes -->
            <div class="col-3">
                <a href="quiz_create.php"><button class="btn btn-block green-bg text-light"><i class="fa-solid fa-circle-plus mr-2"></i>CREATE QUIZ</button></a>
            </div>
        </div>
        <?php 

            // Fetching all quizes of current teacher
            $tid = $_SESSION['id'];
            $sql = "SELECT * FROM quiz WHERE teacher_id = '$tid'";
            $result = mysqli_query($connection,$sql);
            
        ?>
        <div class="mt-5">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="col-3" scope="col">NAME</th>
                        <th class="col-3" scope="col">LAST MODIFIED</th>
                        <th class="col-3" scope="col">SUBMITTED BY</th>
                        <th class="col" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Loop to display all the quizes in table's rows
                        while($res = mysqli_fetch_array($result)){

                            // Fetching quiz details
                            $q_id = $res['id'];
                            $name = $res['q_name'];
                            $date = strtotime($res['last_modified']);
                            $date = get_time_ago($date);

                            // Fetch results to check number of submissions
                            $sql1 = "SELECT * FROM results WHERE quiz_id = '$q_id'";
                            $result1 = mysqli_query($connection,$sql1);
                            $row1 = mysqli_num_rows($result1);

                            echo "<tr><td> $name </td><td> $date </td> <td> $row1 </td>";
                            echo "<td><a href='teacher_view_result.php?qID=$q_id'><i class='fa-solid fa-file-lines text-dark mx-2'></i></a><a href='quiz_edit.php?qID=$q_id'><i class='fa-solid fa-pen-to-square text-dark mx-2'></i></a><a href='quiz_delete.php?qID=$q_id'><i class='fa-solid fa-trash text-dark mx-2'></i></a></td></tr>";
                        }
                        echo "</table></div>"
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
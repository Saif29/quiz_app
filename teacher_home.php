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

        // Including teacher's header file
        include "teacher_header.php";

        // Establishing connection with server
        include "connection.php";

        // If session is not set redirects to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-9">
                <h2 class="green-text">All Students<h2>
            </div>

            <!-- Button to add more students -->
            <div class="col-3">
                <button class="btn btn-block green-bg text-light" type="button" data-toggle="modal" data-target="#add_student"><i class="fa-solid fa-circle-plus mr-2"></i></i>ADD STUDENTS</button>
            </div>
        </div>
        <?php 
            // Fetching all the students of current teacher
            $tid = $_SESSION['id'];
            $sql = "SELECT * FROM students WHERE teacher_id = '$tid'";
            $result = mysqli_query($connection,$sql);
        ?>
        <div class="mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-5" scope="col">NAME</th>
                        <th class="col-5" scope="col">ADDED ON</th>
                        <th class="col" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Loop to display all the students in table rows
                        while($res = mysqli_fetch_array($result)){
                            $s_id = $res['id'];
                            $name = $res['s_name'];
                            $date = strtotime($res['added_date']);
                            $date = date('d F, Y', $date);
                            echo "<tr><td> $name </td><td>$date </td> <td><a href='student_delete.php?StdID=$s_id'><i class='fa-solid fa-trash text-dark mx-2'></i></a></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal form to add students -->
    <div class="modal" id="add_student" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content p-3">
                <div class="modal-header text-center">
                    <h2 class="modal-title green-text">Add Students</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <form method="POST" action="student_add.php">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn green-bg btn-block text-light">SEND INVITATION</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
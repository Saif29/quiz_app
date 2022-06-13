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
        //Includes HEADER file
        include "student_header.php";

        //Connects to the DataBase
        include "connection.php";

        //If session is not started redirects to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
        //GETS quiz id from the URL
        $qID = $_GET['q_id'];

        //Queries to get quiz name from database
        $q = mysqli_query($connection,"SELECT q_name FROM quiz WHERE (id = '$qID')");
        $q_res = mysqli_fetch_assoc($q);
        $q_name = $q_res['q_name'];

        //Queries to get all questions of selected quiz from database
        $sql = "SELECT * FROM questions WHERE quiz_id = '$qID'";
        $result = mysqli_query($connection,$sql);
        $num = mysqli_num_rows($result);
    ?>
    <div class="container mt-5">
        <form id="quiz_form" method="POST" action="quiz_submit.php?num=<?php echo $num ?>">
            <div class="row mb-4">
                <div class="col-10">
                    
                    <!-- Quiz name heading -->
                    <h2 class="green-text"><?php echo $q_name ?><h2>
                </div>
                <div class="col-2">

                    <!-- Submit button for quiz -->
                    <button id="save_btn" class="btn btn-block green-bg text-light" type="submit"><i class="fa-solid fa-circle-chevron-right mr-2"></i>SUBMIT</button>
                </div>
            </div>
            <?php
                
                // Loops through all the questions of the quiz and create blocks for each question
                $c = 0;// Acts as counter to keep check of question number
                while($res = mysqli_fetch_array($result)){
                $c++;
            ?>
                <div id="questions_div">
                    <div class="form_card p-5">
                        <div class="form-outline mb-4">

                            <!-- Displays the Question Statement -->
                            <h4><b><?php echo $res['question'] ?></b></h4>
                        </div>

                        <!-- Hidden field for question id -->
                        <input name="q_id<?php echo $c ?>" value="<?php echo $res['id'] ?>" hidden />

                        <!-- 
                            Below are all the input fields for Questions
                            Each input field is given a name concatenated with a variable $c
                            The $c variable is used to differentiate between input fields of different questions
                        -->

                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4 ml-5">
                                    <input type="radio" name="opt<?php echo $c ?>" value="a" id="optA1" class="form-check-input" />
                                    <label class="form-check-label" for="optA1"><?php echo $res['option_A'] ?></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4 ml-5">
                                    <input type="radio" name="opt<?php echo $c ?>" value="b" id="optB1" class="form-check-input" />
                                    <label class="form-check-label" for="optA1"><?php echo $res['option_B'] ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4 ml-5">
                                    <input type="radio" name="opt<?php echo $c ?>" value="c" id="optC1" class="form-check-input" />
                                    <label class="form-check-label" for="optA1"><?php echo $res['option_C'] ?></label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4 ml-5">
                                    <input type="radio" name="opt<?php echo $c ?>" value="d" id="optD1" class="form-check-input" />
                                    <label class="form-check-label" for="optA1"><?php echo $res['option_D'] ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- The loop ends here -->
        
        </form>
    </div>


</body>
</html>
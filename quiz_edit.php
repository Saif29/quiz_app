<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <!-- JQuery code to add more questions on button click -->
    <script>
        $("document").ready(function() {
            // Gets number of already existing questions
            var count = Number($('#check').text());

            $('#add_btn').click(function() {
                count = count + 1;
                var structure = $('<div class="form_card p-5"><input name="quesID" value = "" hidden /><div class="form-outline mb-4"><label class="form-label" for="question' + count + '">QUESTION</label><input type="text" name="question' + count + '" id="question' + count + '" class="form-control" /></div><div class="row"><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optA' + count + '">OPTION A</label><input type="text" name="optA' + count + '" id="optA' + count + '" class="form-control" /></div></div><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optB' + count + '">OPTION B</label><input type="text" name="optB' + count + '" id="optB' + count + '" class="form-control" /></div></div></div><div class="row"><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optC' + count + '">OPTION C</label><input type="text" name="optC' + count + '" id="optC' + count + '" class="form-control" /></div></div><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optD' + count + '">OPTION D</label><input type="text" name="optD' + count + '" id="optD' + count + '" class="form-control" /></div></div></div><div><select class="form-select green-bg text-light p-1" id="correct_opt_' + count + '" name="correct_opt_' + count + '"><option selected>Correct Option </option><option value="a">Option A</option><option value="b">Option B</option><option value="c">Option C</option><option value="d">Option D</option></select></div></div>');
                $("#questions_div").append(structure);
            });
        });
    </script>

</head>
<body>
    <?php
        // Include teacher's header file
        include "teacher_header.php";

        // Establishing connection with database
        include "connection.php";

        // If session is not set redirecting to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }

        // Getting quiz ID from URL
        $quiz_id = $_GET['qID'];

        //Queries to fetch already existing questions in QUIZ from database
        $sql = "SELECT * FROM questions WHERE quiz_id = '$quiz_id'";
        $result = mysqli_query($connection,$sql);

        // Fetching number of existing questions
        $rows = $res = mysqli_num_rows($result);
    ?>
    <div class="container mt-5">

        <!--
            FORM to edit the Quiz

            - ALready existing questions first appear on the screen with already filled input fields
            - Teacher can add more questions
            - Teacher can update existing questions
        -->
        <form id="quiz_form" method="POST" action="quiz_edit_process.php?qID=<?php echo $quiz_id ?>&rows=<?php echo $rows ?>">
            <div class="row">
                <div class="col-10">
                    <h2 class="green-text">Create new quiz<h2>
                </div>

                <!-- Button to submit the form -->
                <div class="col-2">
                    <button id="save_btn" class="btn btn-block green-bg text-light" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i>SAVE</button>
                </div>
            </div>
            <?php
                
                // Queries to fetch quiz name from database
                $sql2 = "SELECT q_name FROM quiz WHERE id = '$quiz_id'";
                $result2 = mysqli_query($connection,$sql2);
                $res2= mysqli_fetch_assoc($result2);
                $quiz_name = $res2['q_name'];
            ?>
            <div class="form_card mt-5 p-5">
                <div class="form-outline mb-4">
                    <label class="form-label" for="q_name">QUIZ NAME</label>
                    <input type="text" name="q_name" id="q_name" class="form-control" value="<?php echo $quiz_name ?>" />
                </div>
            </div>
            <div id="questions_div">
                <?php
                    $num = 0;

                    // Loop will run to display all the existing questions
                    while($res = mysqli_fetch_array($result)){
                        $num++;
                        $ques_id = $res['id'];
                        $ques = $res['question'];
                        $optA = $res['option_A'];
                        $optB = $res['option_B'];
                        $optC = $res['option_C'];
                        $optD = $res['option_D'];
                        $corr = $res['correct_option'];
                ?>
                    <div class="form_card p-5">
                        <input name="quesID<?php echo $num ?>" value = "<?php echo $ques_id ?>" hidden />
                        <div class="form-outline mb-4">
                            <label class="form-label" for="question1">QUESTION</label>
                            <input type="text" name="question<?php echo $num ?>" id="question1" class="form-control" value="<?php echo $ques ?>" />
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="optA1">OPTION A</label>
                                    <input type="text" name="optA<?php echo $num ?>" id="optA1" class="form-control" value="<?php echo $optA ?>" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="optB1">OPTION B</label>
                                    <input type="text" name="optB<?php echo $num ?>" id="optB1" class="form-control" value="<?php echo $optB ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="optC1">OPTION C</label>
                                    <input type="text" name="optC<?php echo $num ?>" id="optC1" class="form-control" value="<?php echo $optC ?>" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="optD1">OPTION D</label>
                                    <input type="text" name="optD<?php echo $num ?>" id="optD1" class="form-control" value="<?php echo $optD ?>" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <select class="form-select green-bg text-light p-1" id="correct_opt_1" name="correct_opt_<?php echo $num ?>">
                                <option selected> <?php echo $corr ?> </option>
                                <option value="a">Option A</option>
                                <option value="b">Option B</option>
                                <option value="c">Option C</option>
                                <option value="d">Option D</option>
                            </select>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
            <!-- Button to add more questions -->
            <button type="button" class="btn btn-block form_card add_btn green-text" id="add_btn">
                    <h3><i class="fa-solid fa-circle-plus mr-2"></i>ADD QUESTION</h3>
            </button>
            <p id="check" hidden><?php echo $num ?></p>
        </form>
    </div>
</body>
</html>
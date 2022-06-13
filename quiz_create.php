<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    

    <!-- JQuery code to add more questions div on button click -->
    <script>
        $("document").ready(function() {
            var count = 1;
            $('#add_btn').click(function() {
                count = count + 1;
                var structure = $('<div class="form_card p-5"><div class="form-outline mb-4"><label class="form-label" for="question' + count + '">QUESTION</label><input type="text" name="question' + count + '" id="question' + count + '" class="form-control" /></div><div class="row"><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optA' + count + '">OPTION A</label><input type="text" name="optA' + count + '" id="optA' + count + '" class="form-control" /></div></div><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optB' + count + '">OPTION B</label><input type="text" name="optB' + count + '" id="optB' + count + '" class="form-control" /></div></div></div><div class="row"><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optC' + count + '">OPTION C</label><input type="text" name="optC' + count + '" id="optC' + count + '" class="form-control" /></div></div><div class="col"><div class="form-outline mb-4"><label class="form-label" for="optD' + count + '">OPTION D</label><input type="text" name="optD' + count + '" id="optD' + count + '" class="form-control" /></div></div></div><div><select class="form-select green-bg text-light p-1" id="correct_opt_' + count + '" name="correct_opt_' + count + '"><option selected>Correct Option </option><option value="a">Option A</option><option value="b">Option B</option><option value="c">Option C</option><option value="d">Option D</option></select></div></div>');
                $('#questions_div').append(structure);
            });
        });
    </script>

</head>
<body>
    <?php
        // Including header file
        include "teacher_header.php";

        // Establishing connection with database
        include "connection.php";

        // If session not started redirecting to login page
        if(!isset($_SESSION['id'])){
            echo "<script> window.location.assign('student_signin.php'); </script>";
        }
    ?>
    <div class="container mt-5">

        <!-- Form for quiz creation -->
        <form id="quiz_form" method="POST" action="quiz_create_process.php">
            <div class="row">
                <div class="col-10">
                    <h2 class="green-text">Create new quiz<h2>
                </div>
                <div class="col-2">
                    <button id="save_btn" class="btn btn-block green-bg text-light" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i>SAVE</button>
                </div>
            </div>
            
            <div class="form_card mt-5 p-5">
                <div class="form-outline mb-4">
                    <label class="form-label" for="q_name">QUIZ NAME</label>
                    <input type="text" name="q_name" id="q_name" class="form-control" />
                </div>
            </div>
            <div id="questions_div">
                <div class="form_card p-5">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="question1">QUESTION</label>
                        <input type="text" name="question1" id="question1" class="form-control" />
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="optA1">OPTION A</label>
                                <input type="text" name="optA1" id="optA1" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="optB1">OPTION B</label>
                                <input type="text" name="optB1" id="optB1" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="optC1">OPTION C</label>
                                <input type="text" name="optC1" id="optC1" class="form-control" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="optD1">OPTION D</label>
                                <input type="text" name="optD1" id="optD1" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <select class="form-select green-bg text-light p-1" id="correct_opt_1" name="correct_opt_1">
                            <option selected>Correct Option </option>
                            <option value="a">Option A</option>
                            <option value="b">Option B</option>
                            <option value="c">Option C</option>
                            <option value="d">Option D</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Button to add more questions to quiz -->
            <button type="button" class="btn btn-block form_card add_btn green-text" id="add_btn">
                    <h3><i class="fa-solid fa-circle-plus mr-2"></i>ADD QUESTION</h3>
            </button>
        </form>
    </div>
</body>
</html>
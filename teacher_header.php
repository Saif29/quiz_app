<?php
    session_start();
?>

<html>
<head>
    <title>Quiz App</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <!-- CSS file for bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- CSS files for bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    
    <!-- JS files for bootstrap -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>
<body>
    <?php
        // Checks the currently active page
        $curr = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- NAVBAR for teachers -->
    <nav class="navbar navbar-expand-lg navbar-dark green-bg pl-5">

        <!-- NAVBAR icon -->
        <i class="text-light mr-2 fa-solid fa-book"></i>

        <!-- NAVBAR title -->
        <a class="navbar-brand header_title" href="#">Quiz App</a>


        <div style="border-left: 1px solid white">
            <a class="text-light ml-2">Teacher Portal</a>
        </div>

        <!-- NAVBAR toggle button for smaller screen sizes -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                
                <!-- Link to students page -->
                <!-- Highlights the link if students page is currently active -->
                <li class="nav-item">
                    <a class="nav-link <?php if ($curr=='teacher_home.php'){ echo 'active'; }?>" href="teacher_home.php">Students</a>
                </li>

                <!-- Link to Quizes page -->
                <!-- Highlights the link if quizes page is currently active -->
                <li class="nav-item">
                    <a class="nav-link <?php if ($curr=='teacher_quiz.php'){ echo 'active'; }?>" href="teacher_quiz.php">Quiz</a>
                </li>
            </ul>

            <!-- Signout Button -->
            <a href="signout.php?flag=1"><button class="btn btn-outline-light my-2 my-sm-0" type="button">Sign Out</button></a>
        </div>
    </nav>
</body>
</html>
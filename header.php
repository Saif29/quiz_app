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
        //Checks the currently active page
        $curr = basename($_SERVER['PHP_SELF']);
    ?>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark green-bg pl-5">
        
        <!-- NAVBAR ICON -->
        <i class="text-light mr-2 fa-solid fa-book"></i>

        <!-- NAVBAR Title -->
        <a class="navbar-brand header_title" href="#">Quiz App</a>

        <!-- Div to show Student Portal or Teacher Portal on NAVBAR -->
        <div style="border-left: 1px solid white">
            <?php if ($curr=='student_signin.php') {

                //if currently student portal is active it shows Student Portal
                echo "<a class='text-light ml-2 mr-5'>Student Portal</a>";
            }
            else {

                //Else it shows Teacher Portal
                echo "<a class='text-light ml-2 mr-5'>Teacher Portal</a>";
            }?>
        </div>


        <!-- PHP logic to show link to SIGNIN page from SIGNUP page and vice versa -->
        <?php 
        if ($curr!='student_signin.php'){
            if ($curr=='signup.php'){
                echo "<a href='signin.php'><button class='btn btn-outline-light my-2 my-sm-0 ml-auto' type='button'>Sign In</button></a>";
            }
            else {
                echo "<a href='signup.php'><button class='btn btn-outline-light my-2 my-sm-0 ml-auto' type='button'>Sign Up</button></a>";
            }
        }
        ?>
    </nav>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign In</title>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <section class="vh-100">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card" style="border-radius: 15px;">
                    <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Log in to Quiz App</h2>

                    <form method="POST" action="student_signin_process.php">

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example3cg">Email</label>
                        <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form3Example4cg">Password</label>
                        <input type="password" name="pass" id="form3Example4cg" class="form-control form-control-lg" />
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn green-bg btn-block btn-lg text-light">LOGIN</button>
                        </div>

                    </form>
                    <div class="green-text text-center mt-5">
                        <a href="signin.php"><b>Sign in as teacher</b><i class="fa-solid fa-circle-chevron-right ml-2"></i></a>
                    <div>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        
    </section>
</body>
</html>
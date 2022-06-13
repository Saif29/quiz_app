<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <script src="validate_email.js"></script>
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
                    <h2 class="text-uppercase text-center mb-5">Sign up into Quiz App</h2>

                    <form method="POST" action="signup_process.php" id="teacher_signup">

                        <div class="form-outline mb-4">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-lg" required />
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control form-control-lg" required/>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn green-bg btn-block btn-lg text-light">SIGN UP</button>
                        </div>
                        <div class="green-text text-center mt-5">
                            <a href="student_signin.php"><b>Sign in as student</b><i class="fa-solid fa-circle-chevron-right ml-2"></i></a>
                        <div>

                    </form>

                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</body>
</html>
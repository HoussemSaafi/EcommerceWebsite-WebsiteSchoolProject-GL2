<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:Views/Home.php');
}
?>
<div class="container">
    <?php
    if (isset($_SESSION['errorMessage'])) {

        ?>
        <div class="alert alert-danger">
            <?= $_SESSION['errorMessage'] ?>
        </div>
        <?php
        unset($_SESSION['errorMessage']);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <!-- Mirrored from coderthemes.com/hyper/modern/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 17:17:11 GMT -->
    <head>
        <meta charset="utf-8"/>
        <title>Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
        <meta content="Coderthemes" name="author"/>
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style"/>
        <link href="assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style"/>

    </head>

    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-5">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.php">
                                <span><img src="assets/images/logo.png" alt="" height="18"></span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Sign In</h4>
                                <p class="text-muted mb-4">Enter your email address and password to access admin
                                    panel.</p>
                            </div>

                            <form action="processLogin.php" method="post">
                                <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input
                                            type="email"
                                            name="email"
                                            class="form-control"
                                            id="exampleInputEmail1"
                                            aria-describedby="emailHelp"
                                            placeholder="Enter email">
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                </div>
                                <div class="mb-3">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input
                                            name="pwd"
                                            type="password"
                                            class="form-control"
                                            id="exampleInputPassword1"
                                            placeholder="Password">
                                </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Log in</button>
                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="pages-register.php"
                                                                            class="text-muted ms-1"><b>Sign Up</b></a>
                            </p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
    </footer>

    <!-- bundle -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/app.min.js"></script>

    </body>

    <!-- Mirrored from coderthemes.com/hyper/modern/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Apr 2021 17:17:11 GMT -->
    </html>

<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    // Redirect if the user is already logged in
    if (Session::get('login_user'))
    {
        header('Location: welcome.php');
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'] ?? "";
            $password = $_POST['password'] ?? "";
            $error = User::login($username, $password);
        }
    }

?>

<!DOCTYPE html>
<html lang="en" data-page="forms-input-groups" data-bs-theme="light">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin - Login</title>
        <link rel="icon" type="icon" href="../images/logo.png" />
        <link rel="stylesheet" href="assets/css/accordion.47d62950.css" />
    </head>

    <body>
        <div class="color-line"></div>
        <div class="auth-box overflow-hidden align-items-center d-flex">
            <div class="container">
                <div class="row justify-content-center vh-100 d-flex align-items-center">
                    <div class="col-xxl-4 col-md-6 col-sm-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="auth-brand text-center mb-4">
                                    <a href="index.php" class="logo-light">
                                        <img src="../images/logo.png" alt="logo" height="60" />
                                    </a>
                                    <h4 class="fw-bold mt-3">Welcome to Admin</h4>
                                    <p class="text-muted w-lg-75 mx-auto">Let’s get you login. Enter your username and password to continue.</p>
                                </div>

                                <form method="POST">
                                    <div class="mb-3">
                                        <label for="Username" class="form-label">Username <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="username" id="Username" placeholder="Username" required />
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="userPassword" placeholder="••••••••" required />
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" name="submit" class="btn btn-primary fw-semibold py-2">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end auth-fluid-->
        <script src="assets/js/index.0b2f96e9.js" type="module"></script>
        <script src="assets/js/index.4117e2e0.js" nomodule defer></script>
        <script src="assets/js/vendor.39feb43f.js" type="module"></script>
        <script src="assets/js/vendor.a63cbedb.js" nomodule defer></script>
    </body>
</html>
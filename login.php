<?php

    include "libs/load.php";

    // Start a session
    Session::start();

    // Redirect if the user is already logged in
    if (Session::get('branch_user'))
    {
        header('Location: attendance/index.php');
        exit;
    }

    $branch = Operations::getBranchUsers();

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['branch']))
        {
            $branch = $_POST['branch'] ?? "";
            $username = $_POST['username'] ?? "";
            $password = $_POST['password'] ?? "";
            $error = User::branchLogin($username, $password, $branch);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- xxx Basics xxx -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />

        <?php include "temp/head.php" ?>

    </head>
    <body>
        <?php include "temp/header.php" ?>

        <!-- Page Breadcrumbs Start -->
        <div class="slider bg-navy-blue bg-fixed pos-rel breadcrumbs-page">
            <div class="bg-overlay black opacity-60"></div>
            <div class="container">
                <h1>Attendance Login</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icofont-ui-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance Login</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Breadcrumbs End -->

        <!-- Main Body Content Start -->
        <main id="body-content">
            <section class="sidebar-overflow">
                <div class="wide-tb-70">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <!-- Attendance Login Form Start -->
                                <form method="post" class="rounded-field gray-field cmxform needs-validation" novalidate>
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 mb-4">
                                            <h3 class="text-center mb-4">Attendance Login</h3>
                                            <p class="text-<?= $error ? 'success' : 'danger' ?>"><?= $error ?></p>
                                            <!-- Branch Dropdown -->
                                            <div class="form-group mb-3">
                                                <label for="branch">Branch <span class="text-danger">*</span></label>
                                                <select name="branch" class="form-control" id="branch" required>
                                                    <option value="" selected disabled>Select Your Branch</option>
                                                    <?php foreach ($branch as $b) : ?>
                                                    <option value="<?= $b['branch'] ?>"><?= $b['branch'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Please select a branch.</div>
                                            </div>

                                            <!-- Username -->
                                            <div class="form-group mb-3">
                                                <label for="username">Username <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                                                <div class="invalid-feedback">Username is required.</div>
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group mb-3">
                                                <label for="password">Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                                                <div class="invalid-feedback">Password is required.</div>
                                            </div>

                                            <!-- I Agree Checkbox -->
                                            <div class="form-group form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="remember" name="remember" required>
                                                <label class="form-check-label" for="remember">I Agree</label>
                                                <div class="invalid-feedback">You must agree before submitting.</div>
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="form-group text-center">
                                                <button type="submit" name="submit" class="btn btn-theme bg-pink btn-block">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- Attendance Login Form End -->

                                <!-- Bootstrap 5 Validation Script -->
                                <script>
                                    (function () {
                                        'use strict';
                                        const forms = document.querySelectorAll('.needs-validation');
                                        Array.from(forms).forEach(form => {
                                            form.addEventListener('submit', function (event) {
                                                if (!form.checkValidity()) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    })();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include "temp/footer.php" ?>

    </body>
</html>
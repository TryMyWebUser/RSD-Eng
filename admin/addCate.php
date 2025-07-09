<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['page']) && isset($_POST['category']))
        {
            $page = $_POST['page'] ?? "";
            $cate = $_POST['category'] ?? "";
            $error = User::setCategory($page, $cate);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <?php include "temp/head.php" ?>

    </head>

    <body>
        <?php include "temp/header.php" ?>

        <div id="content">

            <?php include "temp/sideheader.php" ?>

            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Category Uploads</h4>
                                <p class="text-<?= $error ? 'success' : 'danger' ?>"><?= $error ?></p>
                                <form method="POST">
                                    <div class="form-group my-4">
                                        <select class="form-select mr-sm-2" name="page" required>
                                            <option selected disabled>Select The Page</option>
                                            <option value="pip">Pipe Lines</option>
                                            <option value="fab">Fabrication</option>
                                            <option value="ere">Erection</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label">Category?</label>
                                        <input type="text" class="form-control" name="category" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "temp/footer.php"; ?>

    </body>
</html>
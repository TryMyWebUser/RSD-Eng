<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $conn = Database::getConnect();
    $cate = Operations::getCate($conn);

    $error = "";

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // Check if both username and password keys exist in $_POST
        if (isset($_POST['submit']) && isset($_POST['page']) && isset($_POST['category']))
        {
            $getID = $_GET['edit_id'] ?? "";
            $page = $_POST['page'] ?? "";
            $cate = $_POST['category'] ?? "";
            $error = User::updateCategory($getID, $page, $cate, $conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "temp/head.php"; ?>
    </head>

    <body>
        <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
                <?php include "temp/header.php" ?>
                <?php include "temp/sideheader.php"; ?>

                <div class="page-wrapper">
                    <!-- Form Start -->
                    <div class="container-fluid pt-4 px-4">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Category Uploads</h4>
                                        <form method="POST">
                                            <div class="form-group my-4">
                                                <select class="form-select mr-sm-2" name="page">
                                                    <option value="<?= $cate['page'] ?>">Select The Page</option>
                                                    <option value="pro">Products Page</option>
                                                    <option value="job">Job Work Page</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-4">
                                                <label class="form-label">Category?</label>
                                                <input type="text" class="form-control" name="category" value="<?= $cate['category'] ?>">
                                            </div>
                                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Form End -->
                    <footer class="footer text-center text-muted">Designed and Developed by <a href="https://trymywebsites.com/">Trymywebsites</a>.</footer>
                </div>

            </div>

            <?php include "temp/footer.php"; ?>
        </div>
    </body>

</html>
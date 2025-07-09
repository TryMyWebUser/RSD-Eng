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
        if (isset($_POST['submit']) && isset($_POST['category']) && isset($_POST['title']) && isset($_POST['dec']) && isset($_FILES['img']))
        {
            $cate = $_POST['category'] ?? "";
            $title = $_POST['title'] ?? "";
            $dec = $_POST['dec'] ?? "";
            $img = $_FILES['img'] ?? "";

            $error = User::setProducts($title, $dec, $img, $cate);
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
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-6">
                                <div class="rounded h-100 p-4">
                                    <h6 class="mb-4">Products Uploads</h6>
                                    <p class="<?= $error ? 'text-danger' : 'text-success' ?>"><?= $error ?></p>
                                    <form method="POST" enctype="multipart/form-data">
                                        <select class="form-select mb-3" name="category" required>
                                            <option>Select Category *</option>
                                            <option disabled>Products Page:</option>
                                            <?php
                                                $category = Operations::getCategory();
                                                foreach ($category as $cate) :
                                                    if ($cate['page'] === 'pro') {
                                            ?>
                                            <option value="<?= $cate['category'] ?>"><?= $cate['category'] ?></option>
                                            <?php
                                                    }
                                                endforeach;
                                            ?>
                                            <option disabled>Job Page:</option>
                                            <?php
                                                foreach ($category as $cate) :
                                                    if ($cate['page'] === 'job') {
                                            ?>
                                            <option value="<?= $cate['category'] ?>"><?= $cate['category'] ?></option>
                                            <?php
                                                    }
                                                endforeach;
                                            ?>
                                        </select>
                                        <div class="mb-3">
                                            <!-- <label class="form-label">Product Title *</label> -->
                                            <input type="text" name="title" class="form-control" placeholder="Product Title *" required>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="dec" placeholder="" id="floatingTextarea" style="height: 150px;" required></textarea>
                                            <label for="floatingTextarea">Product Description *</label>
                                        </div>
                                        <div class="mb-3">
                                            <!-- <label for="formFile" class="form-label">Default file input example</label> -->
                                            <input class="form-control" type="file" name="img" id="formFile" accept="image/*" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                    </form>
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
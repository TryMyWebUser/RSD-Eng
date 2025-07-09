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
        if (isset($_POST['submit']) && isset($_POST['title']) && isset($_FILES['img']) && isset($_POST['category']))
        {
            $cate = $_POST['category'] ?? "";
            $name = $_POST['title'] ?? "";
            $img = $_FILES['img'] ?? "";

            $error = User::setFabs($name, $img, $cate);
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

            <!-- ============================================================== -->
            <!-- Start Main Content -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="container-fluid">
                    <div class="row py-4">
                        <div class="col-sm-12 col-xl-6">
                            <div class="rounded h-100 p-4">
                                <h6 class="mb-4">Fabrication Uploads</h6>
                                <p class="<?= $error ? 'text-danger' : 'text-success' ?>"><?= $error ?></p>
                                <form method="POST" enctype="multipart/form-data">
                                    <select class="form-select mb-3" name="category" required>
                                        <option>Select Pipe Lines Category *</option>
                                        <?php
                                            $category = Operations::getCategory();
                                            foreach ($category as $cate) :
                                                if ($cate['page'] === 'fab') {
                                        ?>
                                        <option value="<?= $cate['category'] ?>"><?= $cate['category'] ?></option>
                                        <?php
                                                }
                                            endforeach;
                                        ?>
                                    </select>
                                    <div class="mb-3">
                                        <label class="form-label">Title *</label>
                                        <input type="text" name="title" class="form-control" placeholder="Title *" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image *</label>
                                        <input class="form-control" type="file" name="img" id="formFile" accept="image/*" required>
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->

            </div>
            <!-- ============================================================== -->
            <!-- End of Main Content -->
            <!-- ============================================================== -->
        </div>
        <!-- END wrapper -->

        <?php include "temp/footer.php" ?>
    </body>
</html>
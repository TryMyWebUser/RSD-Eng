<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
    }

    $category = Operations::getCategory();

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title mt-5">
                                        <i class="me-1 font-18 mdi mdi-numeric-1-box-multiple-outline"></i>
                                        Product Page Category
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($category as $cate) {
                                                        if ($cate['page'] === 'pro') {
                                                ?>
                                                <tr scope="row" colspan="2">
                                                    <td><?= $cate['category']; ?></td>
                                                    <td>
                                                        <a href="editCate.php?edit_id=<?= $cate['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-info m-2"><i class="fas fa-pencil-alt"></i></button>
                                                        </a>
                                                        <a href="deleteCate.php?delete_id=<?= $cate['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="card-title">
                                        <i class="me-1 font-18 mdi mdi-numeric-2-box-multiple-outline"></i>
                                        Job Work Page Category
                                    </h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($category as $cate) {
                                                        if ($cate['page'] === 'job') {
                                                ?>
                                                <tr scope="row" colspan="2">
                                                    <td><?= $cate['category']; ?></td>
                                                    <td>
                                                        <a href="editCate.php?edit_id=<?= $cate['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-info m-2"><i class="fas fa-pencil-alt"></i></button>
                                                        </a>
                                                        <a href="deleteCate.php?delete_id=<?= $cate['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } } ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    </body>

</html>
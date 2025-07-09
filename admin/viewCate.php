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
                    <div class="col-12">
                        <div class="card">
                            <?php
                                // Group categories by page
                                $grouped = [];
                                foreach ($category as $cate) {
                                    $grouped[$cate['page']][] = $cate;
                                }

                                // Define page sections
                                $sections = [
                                    'pip' => ['title' => 'Pipe Lines Page Category', 'icon' => 'mdi mdi-numeric-1-box-multiple-outline'],
                                    'fab' => ['title' => 'Fabrication Page Category', 'icon' => 'mdi mdi-numeric-2-box-multiple-outline'],
                                    'ere' => ['title' => 'Erection Page Category', 'icon' => 'mdi mdi-numeric-3-box-multiple-outline'],
                                ];
                            ?>

                            <div class="card-body">
                                <?php foreach ($sections as $key => $meta): ?>
                                    <h6 class="card-title mt-5">
                                        <i class="me-1 font-18 <?= $meta['icon'] ?>"></i>
                                        <?= $meta['title'] ?>
                                    </h6>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($grouped[$key])): ?>
                                                    <?php foreach ($grouped[$key] as $cate): ?>
                                                        <tr>
                                                            <td><?= htmlspecialchars($cate['category']) ?></td>
                                                            <td>
                                                                <a href="editCate.php?edit_id=<?= $cate['id'] ?>" class="btn btn-square btn-outline-info m-2">
                                                                    <i class="bi bi-pencil"></i>
                                                                </a>
                                                                <a href="deleteCate.php?delete_id=<?= $cate['id'] ?>" class="btn btn-square btn-outline-danger m-2">
                                                                    <i class="bi bi-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="2" class="text-muted text-center">No data found!</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php include "temp/footer.php"; ?>

    </body>
</html>
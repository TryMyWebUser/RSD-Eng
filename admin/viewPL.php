<?php
    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user')) {
        header("Location: index.php");
        exit;
    }

    $conn = Database::getConnect();
    $products = Operations::getProductChecker($conn);
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
                            <div class="card-body">
                                <h6 class="card-title mt-5">
                                    <i class="me-1 font-18 mdi mdi-numeric-1-box-multiple-outline"></i>
                                    Pipe Lines Page
                                </h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($products)) {
                                                foreach ($products as $pro) {
                                            ?>
                                                <tr scope="row">
                                                    <td><?= $pro['category']; ?></td>
                                                    <td><img src="<?= $pro['img']; ?>" style="width: 4rem;" alt="Image Not Found"></td>
                                                    <td><?= $pro['title']; ?></td>
                                                    <td><?= $pro['dec']; ?></td>
                                                    <td>
                                                        <a href="editProduct.php?edit_id=<?= $pro['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-info m-2"><i class="bi bi-pencil"></i></button>
                                                        </a>
                                                        <a href="deletePro.php?delete_id=<?= $pro['id']; ?>">
                                                            <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="bi bi-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='5'>No Data Found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

        </div>

        <?php include "temp/footer.php"; ?>

    </body>
</html>
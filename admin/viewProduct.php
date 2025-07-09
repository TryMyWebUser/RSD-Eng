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
        <meta charset="utf-8">
        <title>View - Products</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

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
                                        Product Page
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
                                                        $category = $pro['category'];
                                                        $qry = "SELECT * FROM `category` WHERE `category` = '$category'";
                                                        $result = $conn->query($qry);
                                                        $row = $result ? $result->fetch_assoc() : null;
                                                        if ($row && $row['page'] === 'pro') {
                                                ?>
                                                            <tr scope="row">
                                                                <td><?= $pro['category']; ?></td>
                                                                <td><img src="<?= $pro['img']; ?>" style="width: 4rem;" alt="Image Not Found"></td>
                                                                <td><?= $pro['title']; ?></td>
                                                                <td><?= $pro['dec']; ?></td>
                                                                <td>
                                                                    <a href="editProduct.php?edit_id=<?= $pro['id']; ?>">
                                                                        <button type="button" class="btn btn-square btn-outline-info m-2"><i class="fas fa-pencil-alt"></i></button>
                                                                    </a>
                                                                    <a href="deletePro.php?delete_id=<?= $pro['id']; ?>">
                                                                        <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        } else {
                                                            echo "<tr><td colspan='5'>No Data Found</td></tr>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='5'>No Data Found</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="card-title">
                                        <i class="me-1 font-18 mdi mdi-numeric-2-box-multiple-outline"></i>
                                        Job Work Page
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
                                                        $category = $pro['category'];
                                                        $qry = "SELECT * FROM `category` WHERE `category` = '$category'";
                                                        $result = $conn->query($qry);
                                                        $row = $result ? $result->fetch_assoc() : null;
                                                        if ($row && $row['page'] === 'job') {
                                                ?>
                                                            <tr scope="row">
                                                                <td><?= $pro['category']; ?></td>
                                                                <td><img src="<?= $pro['img']; ?>" style="width: 4rem;" alt="Image Not Found"></td>
                                                                <td><?= $pro['title']; ?></td>
                                                                <td><?= $pro['dec']; ?></td>
                                                                <td>
                                                                    <a href="editProduct.php?edit_id=<?= $pro['id']; ?>">
                                                                        <button type="button" class="btn btn-square btn-outline-info m-2"><i class="fas fa-pencil-alt"></i></button>
                                                                    </a>
                                                                    <a href="deletePro.php?delete_id=<?= $pro['id']; ?>">
                                                                        <button type="button" class="btn btn-square btn-outline-danger m-2"><i class="fa fa-trash"></i></button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                <?php
                                                        } else {
                                                            echo "<tr><td colspan='5'>No Data Found</td></tr>";
                                                        }
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
                <footer class="footer text-center text-muted">Designed and Developed by <a href="https://trymywebsites.com/">Trymywebsites</a>.</footer>
            </div>

        </div>

        <?php include "temp/footer.php"; ?>
    </body>

</html>
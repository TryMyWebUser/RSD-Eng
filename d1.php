<?php

    include "libs/load.php";

    $conn = Database::getConnect();
    $products = Operations::getProductPage($conn)

?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
                <h1><?= $_GET['data'] ?></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icofont-ui-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pipe Lines</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Breadcrumbs End -->

        <!-- Main Body Content Start -->
        <main id="body-content">
            <!-- Our Blog Section Start -->
            <section class="wide-tb-100 bg-white">
                <div class="container">
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>Pipe Lines</span>
                                    <?= $_GET['data'] ?>
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->


                        <!-- Blog Items -->
                        <?php
                            if (!empty($products)) {
                                foreach ($products as $pro) {
                        ?>
                        <div class="col-sm-12 col-md-4 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.1s">
                            <div class="blog-wrap-light">
                                <img src="images/<?= $pro['img'] ?>" alt="Product Images">
                                <div class="blog-content">
                                    <h4 class="h4-md mb-3"><a><?= $pro['title'] ?></a></h4>
                                    <p><?= $pro['dec'] ?></p>
                                </div>
                            </div>
                        </div>
                        <?php } } else { echo "<p>Datas Not Found!</p>"; } ?>
                        <!-- Blog Items -->

                    </div>
                </div>
            </section>
            <!-- Our Blog Section End -->
        </main>

        <?php include "temp/footer.php" ?>

        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    </body>
</html>
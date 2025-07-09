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
                        <li class="breadcrumb-item active" aria-current="page">Erection</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Breadcrumbs End -->

        <!-- Main Body Content Start -->
        <main id="body-content">
            <!-- Our Services Section Start -->
            <section class="wide-tb-100 pb-4">
                <div class="container">
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>Erection</span>
                                    <?= $_GET['data'] ?>
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <!-- Services Items Start -->
                        <div class="col-md-6 col-lg-4"> 
                            <div class="service-page-item">
                                <img src="images/services/service_img_5.jpg" alt="">
                                <h3><a href="#">Machine Chute</a></h3>
                            </div>
                        </div>
                        <!-- Services Items End -->
                    </div>
                </div>
            </section>
            <!-- Our Services Section End -->
        </main>

        <?php include "temp/footer.php" ?>

        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

    </body>
</html>
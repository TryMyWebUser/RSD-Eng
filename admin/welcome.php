<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('login_user'))
    {
        header("Location: index.php");
        exit;
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
                        <div class="col-lg-12 text-center">
                            <h3 class="fw-light fs-md text-uppercase">Welcome <span class="fw-semibold">Admin.</span></h3>

                            <p class="text-muted fst-italic mb-0">Here's what's happening with your store today.</p>
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
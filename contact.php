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
                <h1>Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icofont-ui-home"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Breadcrumbs End -->

        <!-- Main Body Content Start -->
        <main id="body-content">
            <section class="map-frame w-100">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d2965.0824050173574!2d-93.63905729999999!3d41.998507000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sWebFilings%2C+University+Boulevard%2C+Ames%2C+IA!5e0!3m2!1sen!2sus!4v1390839289319"
                ></iframe>
            </section>

            <section class="bg-navy-blue wide-tb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Contact Address Start -->
                            <div class="widget-wrap mb-0">
                                <div class="contacts-details-simple bg-white">
                                    <i class="icofont-google-map"></i>
                                    <b>Registerd Office:</b> No. 18/56, Mahaliamman Kovil Street, Kulathupalayam, Kovaipudur, Coimbatore - 641042
                                    <br>
                                    <b>Office:</b> No. 1/192, Sangothipalayam, Kaniyur Post, Coimbatore - 641659
                                </div>
                            </div>
                            <!-- Contact Address End -->
                        </div>

                        <div class="col-md-4">
                            <!-- Contact Email Start -->
                            <div class="widget-wrap mb-0">
                                <div class="contacts-details-simple bg-white">
                                    <i class="icofont-ui-email"></i>
                                    <strong>
                                        <a style="text-decoration: none;" href="mailto:rsdengineeringworks@gmail.com">rsdengineeringworks@gmail.com</a>
                                    </strong>
                                    <strong>
                                        <a style="text-decoration: none;" href="mailto:projectsrsdengg@gmail.com">projectsrsdengg@gmail.com</a>
                                    </strong>
                                </div>
                            </div>
                            <!-- Contact Email End -->
                        </div>

                        <div class="col-md-4">
                            <!-- Contact Call Start -->
                            <div class="widget-wrap mb-0">
                                <div class="contacts-details-simple bg-white">
                                    <i class="icofont-phone"></i>
                                    <a style="text-decoration: none;" href="https://wa.me/9443478449">+91 944 347 8449</a><br>
                                    <a style="text-decoration: none;" href="tel:8526335326">+91 852 633 5326</a>
                                </div>
                            </div>
                            <!-- Contact Call End -->
                        </div>
                    </div>
                </div>
            </section>

            <section class="wide-tb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="text-left single-content">
                                <div class="display-head">
                                    Get In Touch!
                                </div>
                            </div>

                            <!-- Contact Form -->
                            <form method="POST" novalidate="novalidate" class="rounded-field gray-field" id="home_page">
                                <div class="col">
                                    <input type="hidden" name="form1" class="form-control" placeholder="Your Name" value="1" required />
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" required />
                                    </div>
                                    <div class="col">
                                        <input type="text" name="email" class="form-control" placeholder="Email" required />
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <input type="text" name="subject" class="form-control" placeholder="Subject" required />
                                    </div>
                                    <div class="col">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone No." required />
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="col">
                                        <textarea rows="7" name="msg" placeholder="Message" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <button type="submit" class="form-btn btn-theme bg-pink">Submit Now</button>
                                </div>
                            </form>
                            <!-- Contact Form -->
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <?php include "temp/footer.php" ?>

    </body>
</html>
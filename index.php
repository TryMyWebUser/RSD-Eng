<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- xxx Basics xxx -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />

        <?php include "temp/head.php" ?>

        <style>
            .slider {
                position: relative;
                width: 100%;
                height: 100vh;
                overflow: hidden;
            }

            .slides {
                position: relative;
                width: 100%;
                height: 100%;
            }

            .slide {
                position: absolute;
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
                opacity: 0;
                transition: opacity 1s ease-in-out;
            }

            .slide.active {
                opacity: 1;
                z-index: 1;
            }

            .overlay {
                position: absolute;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                top: 0;
                left: 0;
                z-index: 1;
            }

            .content {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                color: white;
                text-align: center;
                z-index: 2;
            }

            .content h1 {
                font-size: 3rem;
                margin-bottom: 2rem;
            }

            .content p {
                font-size: 1.2rem;
                margin-bottom: 1rem;
            }

            .content a {
                display: inline-block;
                padding: 12px 30px;
                background-color: #dd4b39;
                color: #fff;
                border-radius: 30px;
                text-decoration: none;
                font-weight: bold;
                transition: 0.3s;
            }

            .content a:hover {
                background-color: #fff;
                color: #000;
            }

            .dots {
                position: absolute;
                bottom: 30px;
                left: 50%;
                transform: translateX(-50%);
                z-index: 3;
                display: flex;
                gap: 10px;
            }

            .dot {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: #fff;
                opacity: 0.5;
                cursor: pointer;
            }

            .dot.active {
                background: #dd4b39;
                opacity: 1;
            }
	    </style>

    </head>
    <body>
        <?php include "temp/header.php" ?>

        <div class="slider" id="customSlider">
            <div class="slides">
                <div class="slide active" style="background-image: url('images/banner_slider_2.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <p>Welcome to</p>
                        <h1>RSD Engineering Works</h1>
                        <a href="https://wa.me/9443478449">For Enquiry</a>
                    </div>
                </div>
                <div class="slide" style="background-image: url('images/banner_slider_3.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <p>Welcome to</p>
                        <h1>RSD Engineering Works</h1>
                        <a href="https://wa.me/9443478449">For Enquiry</a>
                    </div>
                </div>
                <div class="slide" style="background-image: url('images/banner_slider_4.jpg');">
                    <div class="overlay"></div>
                    <div class="content">
                        <p>Welcome to</p>
                        <h1>RSD Engineering Works</h1>
                        <a href="https://wa.me/9443478449">For Enquiry</a>
                    </div>
                </div>
            </div>

            <div class="dots" id="dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
            </div>
        </div>

        <script>
            const slides = document.querySelectorAll('.slide');
            const dots = document.querySelectorAll('.dot');
            let index = 0;
            let timer;

            function showSlide(i) {
                slides.forEach((slide, idx) => {
                    slide.classList.toggle('active', idx === i);
                    dots[idx].classList.toggle('active', idx === i);
                });
                index = i;
            }

            function autoSlide() {
                index = (index + 1) % slides.length;
                showSlide(index);
                timer = setTimeout(autoSlide, 5000); // change every 5 seconds
            }

            dots.forEach(dot => {
                dot.addEventListener('click', () => {
                    clearTimeout(timer);
                    showSlide(Number(dot.dataset.slide));
                    timer = setTimeout(autoSlide, 5000);
                });
            });

            window.onload = autoSlide;
        </script>


        <main id="body-content">
            <!-- Services Slider Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Heading Start -->
                        <div class="col-sm-12 text-center">
                            <div class="display-head">
                                Plumbing, Heating & AC Repair<br />
                                and Electrical Services
                            </div>
                            <div class="display-lead">
                                It’s all guaranteed: The best techs. The friendliest service. 100% satisfaction.
                            </div>
                        </div>
                        <!-- Heading End -->

                        <div class="col-sm-12">
                            <!-- Services Slider Start -->
                            <div class="owl-carousel owl-theme rounded-btn" id="home-services-slider">
                                <!-- Services Slider Item -->
                                <div class="item">
                                    <div class="services-slider-content">
                                        <div class="service-img rounded">
                                            <img src="images/services/service_img_1.jpg" alt="" />
                                        </div>
                                        <div class="serive-content">
                                            <h3 class="h3-md txt-pink">Plumbing</h3>
                                            <p>Aenean sollicitudin, lorem quis. Vivamus ac ultrices diam, vitae accumsan tellus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Services Slider Item -->

                                <!-- Services Slider Item -->
                                <div class="item">
                                    <div class="services-slider-content">
                                        <div class="service-img rounded">
                                            <img src="images/services/service_img_2.jpg" alt="" />
                                        </div>
                                        <div class="serive-content">
                                            <h3 class="h3-md txt-pink">Commercial HVAC</h3>
                                            <p>Aenean sollicitudin, lorem quis. Vivamus ac ultrices diam, vitae accumsan tellus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Services Slider Item -->

                                <!-- Services Slider Item -->
                                <div class="item">
                                    <div class="services-slider-content">
                                        <div class="service-img rounded">
                                            <img src="images/services/service_img_3.jpg" alt="" />
                                        </div>
                                        <div class="serive-content">
                                            <h3 class="h3-md txt-pink">Water Heaters</h3>
                                            <p>Aenean sollicitudin, lorem quis. Vivamus ac ultrices diam, vitae accumsan tellus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Services Slider Item -->

                                <!-- Services Slider Item -->
                                <div class="item">
                                    <div class="services-slider-content">
                                        <div class="service-img rounded">
                                            <img src="images/services/service_img_4.jpg" alt="" />
                                        </div>
                                        <div class="serive-content">
                                            <h3 class="h3-md txt-pink">A/C Install & Repair</h3>
                                            <p>Aenean sollicitudin, lorem quis. Vivamus ac ultrices diam, vitae accumsan tellus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Services Slider Item -->

                                <!-- Services Slider Item -->
                                <div class="item">
                                    <div class="services-slider-content">
                                        <div class="service-img rounded">
                                            <img src="images/services/service_img_1.jpg" alt="" />
                                        </div>
                                        <div class="serive-content">
                                            <h3 class="h3-md txt-pink">Plumbing</h3>
                                            <p>Aenean sollicitudin, lorem quis. Vivamus ac ultrices diam, vitae accumsan tellus.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Services Slider Item -->
                            </div>
                            <!-- Services Slider Start -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- Services Slider End -->

            <!-- Welcome Section Start -->
            <section class="wide-tb-100 bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7">
                            <!-- Heading Start -->
                            <div class="display-head">Welcome to<span class="txt-pink"> Plomberie</span></div>
                            <div class="display-lead">There's a reason they call us the <strong class="txt-blue">Best</strong></div>
                            <!-- Heading End -->

                            <p class="mt-4">
                                Need assistance dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore teritatis et quasi architecto.
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque
                                ipsa quae.
                            </p>

                            <div class="row mt-5">
                                <div class="col-sm-6">
                                    <div class="txt-over-img">
                                        <img src="images/residential_plumbing.jpg" alt="" />
                                        <div class="bg">Residential <span>Plumbing</span></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="txt-over-img">
                                        <img src="images/commercial_plumbing.jpg" alt="" />
                                        <div class="bg">Commercial <span>Plumbing</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-5">
                            <div class="row counter-stack">
                                <div class="col-sm-6">
                                    <div class="counter-coloured bg-navy-blue">
                                        <span class="counter">1790</span>+
                                        <div class="head">
                                            Google<br />
                                            Reviews
                                        </div>
                                    </div>
                                    <div class="counter-coloured bg-pink">
                                        <span>A</span>+
                                        <div class="head">
                                            BBB<br />
                                            Rating
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <div class="counter-coloured bg-pink">
                                        <span class="counter">7890</span>+
                                        <div class="head">
                                            Happy<br />
                                            Customers
                                        </div>
                                    </div>
                                    <div class="counter-coloured bg-navy-blue">
                                        <span class="counter">50</span>+
                                        <div class="head">
                                            Vehicle<br />
                                            Owned
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Welcome Section End -->

            <!-- Who We Are Section Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>Who We Are</span>
                                    About Us
                                </div>
                                <div class="sub-head-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <!-- Tabbing Start -->
                        <div class="col-sm-12">
                            <div class="row no-gutters d-flex">
                                <div class="col-lg-5 col-md-12 mb-0" style="background: url(images/tabbing_img.jpg) no-repeat top center; background-size: cover; min-height: 450px;">
                                    &nbsp;
                                </div>
                                <div class="col-lg-7 col-md-12">
                                    <div class="bg-navy-blue center-tabbing-dark h-100">
                                        <ul class="nav nav-pills theme-tabbing mb-3 justify-content-center" id="pills-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">About Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Our Mission</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content theme-tabbing" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <h3 class="txt-white text-center mb-4">Courtesy may not be the first thing people think of when it comes to plumbing, but for us, it's one of the most important tools we carry.</h3>
                                                <p>
                                                    We partner with over 320 amazing seds projects worldwide, and have given over million in cash & product grants to other groups since 2015 our own dynamic suite. There anyone who loves or
                                                    pursues or desires to obtain pain of it is because seds all occasionally circumstances.
                                                </p>
                                                <div class="row text-center txt-white mt-5 bottom-section">
                                                    <div class="col-sm-4 col-4">
                                                        <i class="icofont-badge icofont-4x"></i>
                                                        <h3>
                                                            High Quality<br />
                                                            Service
                                                        </h3>
                                                    </div>
                                                    <div class="col-sm-4 col-4">
                                                        <i class="icofont-dollar icofont-4x"></i>
                                                        <h3>
                                                            Competitive<br />
                                                            Rates
                                                        </h3>
                                                    </div>
                                                    <div class="col-sm-4 col-4">
                                                        <i class="icofont-worker icofont-4x"></i>
                                                        <h3>
                                                            Qualified<br />
                                                            Agents
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <h3 class="txt-white text-center mb-4">Courtesy may not be the first thing people think of when it comes to plumbing, but for us, it's one of the most important tools we carry.</h3>
                                                <p>
                                                    We partner with over 320 amazing seds projects worldwide, and have given over million in cash & product grants to other groups since 2015 our own dynamic suite. There anyone who loves or
                                                    pursues or desires to obtain pain of it is because seds all occasionally circumstances.
                                                </p>
                                                <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.</p>
                                                <p>Dramatically visualize customer directed convergence without revolutionary ROI.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tabbing End -->

                        <div class="col-sm-12 wide-tb-50 pb-0">
                            <div class="row piecharts" id="pie-charts">
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="90">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Outdoors<br />
                                        Plumbing
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="90">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Commercial <br />
                                        Plumbing
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="95">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Leak<br />
                                        Detection
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="66">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Water<br />
                                        Damage
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="85">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Qualified<br />
                                        Agents
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                    <span class="chart" data-percent="86">
                                        <span class="percent"></span>
                                    </span>
                                    <div class="skill-name">
                                        Fair<br />
                                        Prices
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Who We Are Section End -->

            <!-- Image With Text Overlay Start -->
            <section>
                <div class="container-fluid p-0">
                    <div class="row no-gutters">
                        <div class="col-md-4 col-sm-12 mb-0">
                            <div class="icon-box-with-img">
                                <img src="images/fullwidth_img_1.jpg" alt="" />
                                <div class="text">
                                    <h3>Always Available</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-0">
                            <div class="icon-box-with-img">
                                <img src="images/fullwidth_img_2.jpg" alt="" />
                                <div class="text">
                                    <h3>Best Offers</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12 mb-0">
                            <div class="icon-box-with-img">
                                <img src="images/fullwidth_img_3.jpg" alt="" />
                                <div class="text">
                                    <h3>Fair Prices</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Image With Text Overlay End -->

            <!-- Video Description Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- Heading Start -->
                            <div class="display-head">
                                Plumbing, Heating & AC Repair and Electrical Services
                            </div>
                            <div class="display-lead txt-black">
                                A full range of household and commercial services
                            </div>
                            <!-- Heading End -->

                            <p class="my-4">
                                Need assistance dolore mque laudantium, totam rem aperiam, eaque ipsa quae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore teritatis et quasiore veritatis
                                et quasi architecto beatae vitae dict eaque ipsa quae.
                            </p>

                            <ul class="list-unstyled icons-listing theme-orange w-half mb-0">
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0s" style="visibility: visible; animation-delay: 0s; animation-name: fadeInUp;"><i class="icofont-check"></i>Plumbing sales</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;"><i class="icofont-check"></i>Mainline clearing</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;"><i class="icofont-check"></i>Fixture installation</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;"><i class="icofont-check"></i>Water jetting</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;"><i class="icofont-check"></i>Faucets and sinks</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;"><i class="icofont-check"></i>Plumbing repairs</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;"><i class="icofont-check"></i>Heat pump services</li>
                                <li class="wow fadeInUp" data-wow-duration="0" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;"><i class="icofont-check"></i>Garbage disposal services</li>
                            </ul>
                        </div>
                        <div class="col-md-5 col-sm-12 offset-md-1 order-md-first">
                            <div class="video-popup-link">
                                <img src="images/video_img.jpg" alt="" />
                                <a href="#" class="play-video">
                                    <i class="icofont-play icofont-2x"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Video Description Start -->

            <!-- Callouts Start -->
            <section class="wide-tb-100 bg-fixed bg-1 pos-rel txt-white callout-style-1 mt-5">
                <div class="bg-overlay black opacity-50"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <p>If you need any emergency plumbing service, simply call our 24 hour emergency number</p>
                            <div class="display-head">
                                Our Reliable Emergency Plumbing<br />
                                Service with Fair rateslity
                            </div>
                            <a href="#" class="btn-theme bg-pink large">(855) 982-2028</a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Callouts End -->

            <!-- Our Team Section Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>Fast & Expert</span>
                                    Our Team
                                </div>
                                <div class="sub-head-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <!-- Team Members Start -->
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="team-section-one">
                                <img src="images/team/team_img_1.jpg" alt="" />
                                <div class="team-social-one">
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                    <a href="#"><i class="icofont-snapchat"></i></a>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </div>
                                <h3>John Morise</h3>
                                <p>Founder</p>
                            </div>
                        </div>
                        <!-- Team Members End -->

                        <!-- Team Members Start -->
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="team-section-one">
                                <img src="images/team/team_img_2.jpg" alt="" />
                                <div class="team-social-one">
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                    <a href="#"><i class="icofont-snapchat"></i></a>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </div>
                                <h3>Kevin Mash</h3>
                                <p>Head Plumber</p>
                            </div>
                        </div>
                        <!-- Team Members End -->

                        <!-- Spacer For Medium -->
                        <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                        <!-- Spacer For Medium -->

                        <!-- Team Members Start -->
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="team-section-one">
                                <img src="images/team/team_img_3.jpg" alt="" />
                                <div class="team-social-one">
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                    <a href="#"><i class="icofont-snapchat"></i></a>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </div>
                                <h3>Mike Douglos</h3>
                                <p>Head Plumber</p>
                            </div>
                        </div>
                        <!-- Team Members End -->

                        <!-- Team Members Start -->
                        <div class="col-12 col-lg-3 col-sm-6">
                            <div class="team-section-one">
                                <img src="images/team/team_img_4.jpg" alt="" />
                                <div class="team-social-one">
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                    <a href="#"><i class="icofont-snapchat"></i></a>
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                </div>
                                <h3>Sara Jones</h3>
                                <p>Customer Support</p>
                            </div>
                        </div>
                        <!-- Team Members End -->
                    </div>
                </div>
            </section>
            <!-- Our Team Section End -->

            <!-- Our Pricing Section Start -->
            <section class="wide-tb-100 bg-light-gray">
                <div class="container">
                    <div class="row">
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>Choose The Best Plans</span>
                                    Our Pricing
                                </div>
                                <div class="sub-head-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <!-- Pricing Table -->
                        <div class="col-md-4 col-sm-12">
                            <div class="pricing-table">
                                <div class="txt-blue fw-6">Water Heaters</div>
                                <div class="icon-box-1">
                                    <div class="icon-wrap"><i class="icon-plomberire-water-heater-alt"></i></div>
                                </div>
                                <div class="pricing">30<sup>$</sup></div>
                                <ul class="list-unstyled">
                                    <li>Nam quam nunc, blandit vel</li>
                                    <li>luctus pulvinar, hendrerit id, lorem</li>
                                    <li>Maecenas nec odio et ante</li>
                                    <li>Donec vitae sapien ut libero</li>
                                </ul>
                                <a href="#" class="btn-theme bg-pink">Request Now</a>
                            </div>
                        </div>
                        <!-- Pricing Table -->

                        <!-- Pricing Table -->
                        <div class="col-md-4 col-sm-12">
                            <div class="pricing-table best-seller">
                                <div class="txt-blue fw-6">Plumbing</div>
                                <div class="icon-box-1">
                                    <div class="icon-wrap"><i class="icon-plomberire-bathtub"></i></div>
                                </div>
                                <div class="pricing">45<sup>$</sup></div>
                                <ul class="list-unstyled">
                                    <li>Nam quam nunc, blandit vel</li>
                                    <li>luctus pulvinar, hendrerit id, lorem</li>
                                    <li>Maecenas nec odio et ante</li>
                                    <li>Donec vitae sapien ut libero</li>
                                </ul>
                                <a href="#" class="btn-theme bg-pink">Request Now</a>
                            </div>
                        </div>
                        <!-- Pricing Table -->

                        <!-- Pricing Table -->
                        <div class="col-md-4 col-sm-12">
                            <div class="pricing-table">
                                <div class="txt-blue fw-6">Remodeling</div>
                                <div class="icon-box-1">
                                    <div class="icon-wrap"><i class="icon-plomberire-wrench"></i></div>
                                </div>
                                <div class="pricing">75<sup>$</sup></div>
                                <ul class="list-unstyled">
                                    <li>Nam quam nunc, blandit vel</li>
                                    <li>luctus pulvinar, hendrerit id, lorem</li>
                                    <li>Maecenas nec odio et ante</li>
                                    <li>Donec vitae sapien ut libero</li>
                                </ul>
                                <a href="#" class="btn-theme bg-pink">Request Now</a>
                            </div>
                        </div>
                        <!-- Pricing Table -->
                    </div>
                </div>
            </section>
            <!-- Our Pricing Section End -->

            <!-- Our Customer Section Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center">
                                <div class="heading-main">
                                    <span>What Our</span>
                                    Customer Say’s
                                </div>
                                <div class="sub-head-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <div class="col-sm-12">
                            <div class="owl-carousel owl-theme rounded-top-arrow" id="home-client-testimonials">
                                <!-- Client Testimonials Slider Item -->
                                <div class="item">
                                    <div class="client-testimonial">
                                        <div class="media">
                                            <div class="client-testimonial-icon rounded-circle">
                                                <img src="images/team_1.jpg" alt="" />
                                            </div>
                                            <div class="client-inner-content media-body">
                                                <h3>John Morise</h3>
                                                <p>Vivamus ac ultrices diam, vitae accumsan tellus. Integer sollicitudin vulputate lacus, congue vulputate nisl eleifend in.</p>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <span><i class="icofont-star"></i> <i class="icofont-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Testimonials Slider Item -->

                                <!-- Client Testimonials Slider Item -->
                                <div class="item">
                                    <div class="client-testimonial">
                                        <div class="media">
                                            <div class="client-testimonial-icon rounded-circle">
                                                <img src="images/team_2.jpg" alt="" />
                                            </div>
                                            <div class="client-inner-content media-body">
                                                <h3>John Morise</h3>
                                                <p>Vivamus ac ultrices diam, vitae accumsan tellus. Integer sollicitudin vulputate lacus, congue vulputate nisl eleifend in.</p>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <span><i class="icofont-star"></i> <i class="icofont-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Testimonials Slider Item -->

                                <!-- Client Testimonials Slider Item -->
                                <div class="item">
                                    <div class="client-testimonial">
                                        <div class="media">
                                            <div class="client-testimonial-icon rounded-circle">
                                                <img src="images/team_3.jpg" alt="" />
                                            </div>
                                            <div class="client-inner-content media-body">
                                                <h3>John Morise</h3>
                                                <p>Vivamus ac ultrices diam, vitae accumsan tellus. Integer sollicitudin vulputate lacus, congue vulputate nisl eleifend in.</p>
                                                <div class="rating">
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <i class="icofont-star"></i>
                                                    <span><i class="icofont-star"></i> <i class="icofont-star"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Client Testimonials Slider Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Customer Section End -->

            <!-- Our Blog Section Start -->
            <section class="wide-tb-100 bg-navy-blue">
                <div class="container">
                    <div class="row">
                        <!-- Main Heading Start -->
                        <div class="col-sm-12">
                            <div class="heading-wrap d-flex align-items-center light">
                                <div class="heading-main">
                                    <span>From Our Blog</span>
                                    Latest News
                                </div>
                                <div class="sub-head-text">
                                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium
                                </div>
                            </div>
                        </div>
                        <!-- Main Heading End -->

                        <!-- Blog Items -->
                        <div class="col-sm-12 col-md-4 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.1s">
                            <div class="blog-wrap-dark">
                                <a href="blog-single.html"><img src="images/blog/blog_post_1.jpg" alt="" /></a>
                                <div class="blog-content">
                                    <div class="meta-box">
                                        <span>Jan 16, 2019</span>
                                        <span>
                                            <a href="#"><i class="icofont-comment"></i> 07</a>
                                        </span>
                                    </div>
                                    <h4 class="h4-md mb-3"><a href="blog-single.html">Mandating Solar Panels on New Homes</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantiumg</p>

                                    <a href="blog-single.html" class="btn-theme bg-pink">Read More <i class="icofont-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Items -->

                        <!-- Blog Items -->
                        <div class="col-sm-12 col-md-4 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.1s">
                            <div class="blog-wrap-dark">
                                <a href="blog-single.html"><img src="images/blog/blog_post_2.jpg" alt="" /></a>
                                <div class="blog-content">
                                    <div class="meta-box">
                                        <span>Jan 16, 2019</span>
                                        <span>
                                            <a href="#"><i class="icofont-comment"></i> 07</a>
                                        </span>
                                    </div>
                                    <h4 class="h4-md mb-3"><a href="blog-single.html">Radiant Heating Systems For Homes</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantiumg</p>

                                    <a href="blog-single.html" class="btn-theme bg-pink">Read More <i class="icofont-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Items -->

                        <!-- Blog Items -->
                        <div class="col-sm-12 col-md-4 wow fadeInLeft" data-wow-duration="0" data-wow-delay="0.1s">
                            <div class="blog-wrap-dark">
                                <a href="blog-single.html"><img src="images/blog/blog_post_3.jpg" alt="" /></a>
                                <div class="blog-content">
                                    <div class="meta-box">
                                        <span>Jan 16, 2019</span>
                                        <span>
                                            <a href="#"><i class="icofont-comment"></i> 07</a>
                                        </span>
                                    </div>
                                    <h4 class="h4-md mb-3"><a href="blog-single.html">Mandating Solar Panels on New Homes</a></h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantiumg</p>

                                    <a href="blog-single.html" class="btn-theme bg-pink">Read More <i class="icofont-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- Blog Items -->
                    </div>
                </div>
            </section>
            <!-- Our Blog Section End -->

            <!-- Our Partners Section Start -->
            <section class="wide-tb-50 bg-light-gray">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow fadeInUp" data-wow-duration="0" data-wow-delay="0.2s">
                            <div class="owl-carousel owl-theme" id="home-clients">
                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner1.png" alt="" />
                                </div>
                                <!-- Client Logo -->

                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner2.png" alt="" />
                                </div>
                                <!-- Client Logo -->

                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner3.png" alt="" />
                                </div>
                                <!-- Client Logo -->

                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner4.png" alt="" />
                                </div>
                                <!-- Client Logo -->

                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner5.png" alt="" />
                                </div>
                                <!-- Client Logo -->

                                <!-- Client Logo -->
                                <div class="item">
                                    <img src="images/partners/partner6.png" alt="" />
                                </div>
                                <!-- Client Logo -->
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="spacer-70 d-none d-md-inline-block">&nbsp;</div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Our Partners Section End -->
        </main>

        <?php include "temp/footer.php" ?>

    </body>
</html>
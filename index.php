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
                                    We are a team of passionate professionals committed to delivering reliable engineering solutions with quality, integrity, and precision.
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
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-profile-2-tab" data-toggle="pill" href="#pills-profile-2" role="tab" aria-controls="pills-profile-2" aria-selected="false">Our Vision</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content theme-tabbing" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                <h3 class="txt-white text-center mb-4">RSD Engineering Works</h3>
                                                <p>
                                                    Established in 2001, R.S.D. Engineering is a trusted and experienced name in the field of industrial pipeline solutions, fabrication, and structural erection services. Under the leadership of Mr. Senthil Kumar. R (Proprietor), we specialize in handling dynamic pipeline projects including air, dire, sandpipe, and custom industrial piping systems.<br>
                                                    Over the years, we’ve built a reputation for delivering high-quality workmanship and reliable service across Coimbatore and Tamil Nadu. Our team is skilled in structural fabrication, machinery chute installations, and tailored erection works to suit diverse industrial needs.<br>
                                                    With a strong focus on safety, precision, and client satisfaction, R.S.D. Engineering continues to be a preferred partner for industries seeking dependable pipeline and fabrication services.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                                <h3 class="txt-white text-center mb-4">Mission</h3>
                                                <p>
                                                    To deliver high-quality, reliable, and customized engineering solutions in pipeline installation, industrial fabrication, and structural erection. We are committed to ensuring safety, precision, and client satisfaction in every project we undertake, while fostering long-term relationships built on trust and performance.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="pills-profile-2" role="tabpanel" aria-labelledby="pills-profile-2-tab">
                                                <h3 class="txt-white text-center mb-4">Vision</h3>
                                                <p>
                                                    To be recognized as a leading engineering service provider in South India by continuously upgrading our skills, embracing modern technologies, and maintaining excellence in service delivery — making R.S.D. Engineering the first choice for industrial infrastructure and fabrication needs.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tabbing End -->
                    </div>
                </div>
            </section>
            <!-- Who We Are Section End -->

            <!-- Statistics Counter Section Start -->
            <section class="wide-tb-100 bg-scroll bg-4 pos-rel">
                <div class="bg-overlay blue opacity-70"></div>
                <div class="container wide-tb-100">
                    <div class="row">
                        <!-- Heading Start -->
                        <div class="col-sm-12 text-center mb-4">
                            <div class="display-head">
                                <span class="txt-pink"> Some Of Our Facts</span>
                            </div>
                        </div>
                        <!-- Heading End -->

                        <!-- Counter Col Start -->
                        <div class="col counter-style-1 col-6 col-lg-3 col-sm-6">
                            <span class="counter">24</span>
                            <span>+</span>
                            <div>
                                Years in Bussines
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Counter Col Start -->
                        <div class="col counter-style-1 col-6 col-lg-3 col-sm-6">
                            <span class="counter">100</span>
                            <span>+</span>
                            <div>
                                Happy Clients
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Spacer For Medium -->
                        <div class="w-100 d-none d-sm-block d-lg-none spacer-60"></div>
                        <!-- Spacer For Medium -->

                        <!-- Counter Col Start -->
                        <div class="col counter-style-1 col-6 col-lg-3 col-sm-6">
                            <span class="counter">80</span>
                            <span>+</span>
                            <div>
                                Projects Completed
                            </div>
                        </div>
                        <!-- Counter Col End -->

                        <!-- Counter Col Start -->
                        <div class="col counter-style-1 col-6 col-lg-3 col-sm-6">
                            <span class="counter">20</span>
                            <span>+</span>
                            <div>
                                Trained Staff
                            </div>
                        </div>
                        <!-- Counter Col End -->
                    </div>
                </div>
            </section>
            <!-- Statistics Counter Section End -->

            <!-- Services Slider Start -->
            <section class="wide-tb-100">
                <div class="container">
                    <div class="row">
                        <!-- Heading Start -->
                        <div class="col-sm-12 text-center">
                            <div class="display-lead">
                                Fabrication
                            </div>
                            <div class="display-head">
                                RSD Engineering Works
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
                                            <h3 class="h3-md txt-pink m-0">Plumbing</h3>
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
        </main>

        <?php include "temp/footer.php" ?>

    </body>
</html>
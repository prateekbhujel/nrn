<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NRN Website</title>
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/bootstrap.min.css">
    <link rel="icon" type="images/png" href="https://norviceducations.edu.np/frontend/images/favicon.jpg">

    <!-- Admin Assets for Bootstrap and jQuery -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Toastr CSS (for flash messages) -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">

    <!-- Lightbox CSS -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/style.css?453362290">

<!-- :: Style Responsive CSS -->
<link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/responsive.css?1378087210">
    <!-- Custom Styles -->
      <!-- :: Owl Carousel -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/owl.theme.default.min.css">

    <!-- :: Lity -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/lity.min.css">

    <!-- :: Nice Select CSS -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/nice-select.css">

    <!-- :: DatePicker CSS -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/datepicker.min.css">

    <!-- :: TimePicker CSS -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/jquery.timepicker.min.css">

    <!-- :: Magnific Popup CSS -->
    <link rel="stylesheet" href="https://norviceducations.edu.np/frontend/css/magnific-popup.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #004d99;
        }

        .navbar-nav .nav-item .nav-link {
            color: white !important;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0066cc;
        }

        .dropdown-menu {
            background-color: #003366;
        }

        /* Hero Section */
        .hero-section {
            background-image: url('https://source.unsplash.com/1600x900/?nepal');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 600;
        }

        .hero-section p {
            font-size: 1.2rem;
        }

        /* Card Section */
        .card {
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
        }

        /* Carousel Styles */
        .carousel-item img {
            object-fit: cover;
            height: 500px;
        }

        /* Footer */
        .footer {
            background-color: #003366;
            color: white;
            padding: 40px 0;
        }

        .footer a {
            color: #fff;
        }

        .footer a:hover {
            color: #ffcc00;
        }

        /* Gallery */
        .gallery img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        /* PDF Viewer */
        .pdf-viewer {
            border: 1px solid #ddd;
            height: 600px;
            overflow: hidden;
            margin-top: 30px;
        }

        .pdf-viewer iframe {
            width: 100%;
            height: 100%;
        }
        .ram{
                font-size: 50px;
    font-weight: 700;
    line-height: 0.8;
    font-family: 'Rajdhani', sans-serif;
    margin-bottom: 15px;
        }
    </style>

</head>

<body>

<header class="all-navbar" id="page">

    <!-- :: Top Navbar -->
    <div class="top-navbar">
        <div class="container">
            <div class="content-box d-flex align-items-center justify-content-between">

                <!-- Website Info -->
                <ul class="website-info">
                    <li>
                        <a class="topmenu-mail" href="mailto:norvicine@gmail.com / norvicnursingedu@blc.com.np">
                            <i class="far fa-envelope"></i>
                            norvicine@gmail.com / norvicnursingedu@blc.com.np
                        </a>
                    </li>
                    <li>
                        <i class="fas flaticon-call"></i>
                        <a class="topmenu-mail" href="tel:+977-1-4017577, 4017641">
                            +977-1-4017577, 4017641
                        </a>
                    </li>
                </ul>

                <!-- Social Media Icons -->
                <ul class="website-icon-social">
                    <li>
                        <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</header>



<!-- Navbar -->
<nav class="nav-bar">
    <div class="container">
        <div class="content-box d-flex align-items-center justify-content-between">

            <!-- Logo Section -->
            <div class="logo">
                <a href="https://norviceducations.edu.np" class="logo-nav">
                    <img class="img-fluid one" src="https://norviceducations.edu.np/frontend/images/logo.png" alt="01 Logo">
                    <img class="img-fluid two" src="https://norviceducations.edu.np/frontend/images/logo2.png" alt="01 Logo">
                </a>
                <a href="#open-nav-bar-menu" class="open-nav-bar">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>

            <!-- Navbar Links -->
            <div class="nav-bar-links" id="open-nav-bar-menu">
                <ul class="level-1">

                    <!-- Home -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np" class="link-level-1">Home</a>
                    </li>

                    <!-- About Us -->
                    <li class="item-level-1 has-menu">
                        <a href="https://norviceducations.edu.np/about" class="link-level-1">About Us</a>
                        <ul class="level-2">
                            <li class="item-level-2">
                                <a class="link-level-2" href="https://norviceducations.edu.np/about">Introduction</a>
                            </li>
                            <li class="item-level-2">
                                <a class="link-level-2" href="https://norviceducations.edu.np/about/chairman-message">Chairman's Message</a>
                            </li>
                            <li class="item-level-2">
                                <a class="link-level-2" href="https://norviceducations.edu.np/about/chief-executive-officer-2">Chief Executive Officer</a>
                            </li>
                            <li class="item-level-2">
                                <a class="link-level-2" href="https://norviceducations.edu.np/about/principal-s-message">Campus Chief's Message</a>
                            </li>
                        </ul>
                    </li>

                    <!-- Programme -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np/all-programs" class="link-level-1">Programme</a>
                    </li>

                    <!-- News -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np/news" class="link-level-1">News</a>
                    </li>

                    <!-- Facility -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np/facilities" class="link-level-1">Facility</a>
                    </li>

                    <!-- Gallery -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np/gallery" class="link-level-1">Gallery</a>
                    </li>

                    <!-- Contact Us -->
                    <li class="item-level-1">
                        <a href="https://norviceducations.edu.np/contact-us" class="link-level-1">Contact Us</a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</nav>


<section class="header" style="height: 90vh !important;">
        <div class="header-carousel owl-carousel owl-theme">
                                                <div class="sec-hero display-table"
                        style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTXdFGStlMvO9JTHwgo9k9BF1_zRBejdeC0ug&s);">
                                    <div class="table-cell" style="height: 90vh !important;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <div class="banner">
                                    <h1 class="handline">Empowering Through Service</h1>
                                    <p class="about-website">Servicing the less fortunate back home in Nepal</p>

                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                                <div class="sec-hero display-table"
                            style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3mHNfnHfjrevUV1r8T4BkThxsxNG0aMi5Sg&s)">
                                <div class="table-cell" style="height: 90vh !important;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <div class="banner">
                                <h1 class="headline">"Connecting hearts, bridging worlds."</h1>
                                    <p class="about-website">Empowering the Nepali diaspora to thrive globally while staying rooted in the spirit of Nepal. Together, we create opportunities, foster connections, and celebrate our heritage.</p>


                                                                            <a href="#!"
                                                                                        class="btn-1 move-section">Read More</a>
                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                                <div class="sec-hero display-table"
                            style="background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQROPABNSzTNEYogTm5-iGtdkknPAUWXGF1ww&s)">
                                <div class="table-cell" style="height: 90vh !important;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <div class="banner">
                                    <h1 class="handline">Treat Every Patient Like They Are Family</h1>
                                    <p class="about-website">Hands To Do No Harm -I Pledge To Use My Knowledge To Provide Holistic Care, Advocate For The Patient, And To Implement Evidence-Based Practices.</p>

                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                                <div class="sec-hero display-table"
                            style="background-image: url(https://img.freepik.com/premium-photo/group-people-with-group-people-posing-photo_979520-161547.jpg)">
                                <div class="table-cell" style="height: 90vh !important;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <div class="banner">
                                    <h1 class="handline">Nursing  is a work of heart</h1>
                                    <p class="about-website">&quot;Nurses : The Glue that holds healthcare together&quot;</p>

                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
                                                <div class="sec-hero display-table"
                            style="background-image: url(https://norviceducations.edu.np/storage/banner/2023/06/slide1_1687846558.jpg)">
                                <div class="table-cell" style="height: 90vh !important;">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-lg-6">
                                <div class="banner">
                                    <h1 class="handline">Our fingerprints don’t fade from the lives we touch</h1>
                                    <p class="about-website">Committed to keeping you prepared during the COVID-19 pandemic. Our nursing continuing education credits help you fulfill state requirements and advance your career.</p>

                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        </div>
    </section>

    <section id="marquee-notice">
            <div class="container">
                <div class="nine-mar">
                    <div class="mar-title">Notice</div>
                    <marquee direction="left" class="notice-txt">
                                                    <a href="https://norviceducations.edu.np/notice/opening-in-staff-nurse-for-2023"
                                class="nine-notice">Opening in Staff Nurse for 2023</a>
                                                    <a href="https://norviceducations.edu.np/notice/admission-open-for-pbns-bsn-graduates"
                                class="nine-notice">Admission open for PBNS/ BSN Graduates</a>
                                                    <a href="https://norviceducations.edu.np/notice/mec-entrance-application-form-notice-2024"
                                class="nine-notice">MEC Entrance Application form notice 2024</a>
                                            </marquee>
                </div>
            </div>
        </section>
        <section class="features-2">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-4">
                                            <div class="features-item first">
                    <i class="far fa-eye threeicon"></i>
                    <div class="item-text">
                        <h4>Vision</h4>
                        <p>Our Vision is to become an internationally recognized health care institution and to play a
                            pioneering role in health care education and research.</p>
                        <a href="http://norviceducations.edu.np/public/about" class="readmore">Read More</a>
                    </div>
                </div>
                                    </div>
                <div class="col-sm-6 col-md-4">
                                            <div class="features-item last">
                    <i class="fa fa-bullseye threeicon" aria-hidden="true"></i>
                    <div class="item-text">
                        <h4>Mission</h4>
                        <p>Our Mission to produce skilled, qualified, competent and ethical healthcare professionals who would
                            constitute the future of heath care..</p>
                        <a href="http://norviceducations.edu.np/public/about" class="readmore">Read More</a>
                    </div>
                </div>
                                    </div>
                <div class="col-sm-6 col-md-4">
                                            <div class="features-item last">
                    <i class="fa fa-flag-checkered threeicon" aria-hidden="true"></i>
                    <div class="item-text">
                        <h4>Goal</h4>
                        <p>Our Goal is to produce conscientious, motivated and task-oriented basic to
                            high level health professionals who as a part of healthcare..</p>
                        <a href="http://norviceducations.edu.np/public/about" class="readmore">Read More</a>
                    </div>
                </div>
                                    </div>
            </div>

        </div>
    </section>

    <section class="about-us about-us-3 py-100" id="start">
        <div class="container">
            <div class="row">
                                    <div class="col-lg-6">
                <div class="about-img-box">
                    <div class="img-box">
                       <img class="img-fluid" src="http://norviceducations.edu.np/public/storage/photos/1/newabout1.jpg" alt="About">
                    </div>
                    <div class="about-experience">
                        <i class="flaticon-stethoscope"></i>
                        <div class="ram">2009</div>
                        <h5>SINCE</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-text-box">
                    <div class="sec-title">
                        <h2>Welcome to Norvic College of Health Sciences and Technologies</h2>
                        <h3>Quality Healthcare Starts With Quality Nurses</h3>
                    </div>
                    <p style="font-size:16px">Norvic College of Health Sciences and Technologies (NCHST) (Previously in operation as Norvic Institute of Nursing Education) is the sister organization of Norvic International
                        Hospital. It is currently located of Maharajganj, Kathmandu.
                    </p>
                    <p class="last" style="font-size:16px">As such this institution is proud to be the only ISO 9001: 2015 Certified
                        Institution in the country. We offer Nursing Education in friendly environments that enable
                        students to grow professionally..</p>
                    <div class="row">
                        <div class="col">
                            <a class="btn-1" href="http://norviceducations.edu.np/public/about">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
                            </div>
        </div>
    </section>


        <section class="testimonial testimonial-2 py-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-10 offset-lg-1">
                    <div class="testimonial-carousel owl-carousel owl-theme">
                                                    <div class="testimonial-carousel-item">
                                <div class="testimonial-pic">
                                                                            <img src="https://norviceducations.edu.np/storage/testimonial/2023/07/baba_1688281671.jpg" alt="Blog">
                                                                    </div>
                                <div class="content-text-box">
                                    <p>I am incredibly proud to share my experience as an alumnus of the distinguished Norvic College of Health Sciences and Technologies (Previously in operation as Norvic Institute of Nursing Education) in Kathmandu, Nepal. The institute's unwavering commitment to excellence, coupled with its esteemed faculty, played a pivotal role in shaping my career trajectory as a nurse. Norvic provided me with...
                                </div>
                                <div class="testimonial-doctor">
                                    <h4>Baba Rani Bisunke</h4>
                                    <span>Alumnus</span>
                                </div>

                            </div>

                                                    <div class="testimonial-carousel-item">
                                <div class="testimonial-pic">
                                                                            <img src="https://norviceducations.edu.np/storage/testimonial/2023/07/anita_1688282132.jpg" alt="Blog">
                                                                    </div>
                                <div class="content-text-box">
                                    <p>It's me Anita Ghimire, 3rd batch of Norvic College of Health Sciences and Technologies (Previously in operation as Norvic Instituate of Nursing Education). I am proud to say that I have completed my Bachelor of Science in Nursing degree and am currently working as a healthcare manager in Austin, Texas. My journey to becoming Registered Nurse in America was not...
                                </div>
                                <div class="testimonial-doctor">
                                    <h4>Anita Ghimire</h4>
                                    <span>Alumnus</span>
                                </div>

                            </div>

                                                    <div class="testimonial-carousel-item">
                                <div class="testimonial-pic">
                                                                            <img src="https://norviceducations.edu.np/storage/testimonial/2023/07/ashmiata_1688282340.jpg" alt="Blog">
                                                                    </div>
                                <div class="content-text-box">
                                    <p>﻿As an alumnus of the esteemed Norvic College of Health Sciences and Technologies NCHST(Previously in operation as Norvic Institute of Nursing Education NINE) in Kathmandu, Nepal, I take immense pride in the profound impact it has had on my career trajectory. The institute's unwavering commitment to excellence and its adept faculty provided me with a robust foundation in nursing knowledge...
                                </div>
                                <div class="testimonial-doctor">
                                    <h4>Ashmita Pathak</h4>
                                    <span>Alumnus</span>
                                </div>

                            </div>

                                                    <div class="testimonial-carousel-item">
                                <div class="testimonial-pic">
                                                                            <img src="https://norviceducations.edu.np/storage/testimonial/2023/07/sama_1688285602.jpg" alt="Blog">
                                                                    </div>
                                <div class="content-text-box">
                                    <p>I graduated from Norvic College of Health Sciences and Technologies (NCHST (Previously in operating as Norvic Institute of Nursing Education (NINE)&nbsp; in the year 2019. Now I am currently employed under Victorian Order of Nurses
(VON), Canada, and stationed at Nova Scotia. I am extremely grateful to NCHST for providing me both
theoretical and practical knowledge in the field of nursing which...
                                </div>
                                <div class="testimonial-doctor">
                                    <h4>Sama Singh Kunwar</h4>
                                    <span>Alumnus</span>
                                </div>

                            </div>

                                                    <div class="testimonial-carousel-item">
                                <div class="testimonial-pic">
                                                                            <img src="https://norviceducations.edu.np/storage/testimonial/2023/07/thumbnaildambar-kumari-karki_1690724935.jpg" alt="Blog">
                                                                    </div>
                                <div class="content-text-box">
                                    I graduated from NCHST (Previously in operation as Norvic Institute of Nursing Education) in the year 2023. Now I am currently employed ALLENZA Innovation Healthcare Solutions, Dubai. I am extremely grateful to NCHST for providing me both theoretical and practical knowledge in the field of nursing which has enabled me to successfully continue my nursing practice in Dubai as well....
                                </div>
                                <div class="testimonial-doctor">
                                    <h4>Dambar Kumari Karki</h4>
                                    <span>Alumnus</span>
                                </div>

                            </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="testimonial-view blog-item">
                <span class="text-box" style="padding: 0;">

                <a href="https://norviceducations.edu.np/testimonial" class="more link">View All</a>
                </span>
            </div> -->
    </section>

    <main class="container mt-4">
        <section class="hero-section text-center py-5">
            <h1>Welcome to NRNA</h1>
            <p>Connecting Nepalis worldwide to foster development and collaboration.</p>
        </section>

        <section class="mt-5">
            <h2 class="text-center">Recent Highlights</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/highlight1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Highlight 1</h5>
                            <p class="card-text">A brief description of a key event or achievement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/highlight2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Highlight 2</h5>
                            <p class="card-text">A brief description of a key event or achievement.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="images/highlight3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Highlight 3</h5>
                            <p class="card-text">A brief description of a key event or achievement.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Photo Gallery Section -->
    <section id="photo-gallery" class="container py-5">
        <h2 class="text-center">Photo Gallery</h2>
        <div class="row gallery">
            <div class="col-12 col-md-4">
                <a href="https://source.unsplash.com/600x400/?nature" data-lightbox="gallery"><img src="https://norviceducations.edu.np/storage/banner/2023/06/slide1_1687846558.jpg" alt="Image 1" class="img-fluid"></a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://source.unsplash.com/600x400/?landscape" data-lightbox="gallery"><img src="https://source.unsplash.com/600x400/?landscape" alt="Image 2" class="img-fluid"></a>
            </div>
            <div class="col-12 col-md-4">
                <a href="https://source.unsplash.com/600x400/?culture" data-lightbox="gallery"><img src="https://source.unsplash.com/600x400/?culture" alt="Image 3" class="img-fluid"></a>
            </div>
        </div>
    </section>

    <!-- PDF Viewer Section -->
    <section class="container py-5">
        <h2 class="text-center">PDF Viewer</h2>
        <div class="pdf-viewer">
            <iframe src="https://www.pdf995.com/samples/pdf.pdf" frameborder="0"></iframe>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">

    <!-- Footer Content -->
    <div class="footer-content">
        <div class="container">
            <div class="row">

                <!-- Contact Us Section -->
                <div class="col-sm-12 col-md-5 col-lg-4">
                    <div class="footer-title">
                        <h4>Contact Us</h4>
                        <ul class="opening-hours">
                            <li>Maharajgunj, Kathmandu, Nepal</li>
                            <li>Tel.: <a href="tel:+977-1-4017577,4017641">+977-1-4017577, 4017641</a></li>
                            <li>Fax: 4017577</li>
                            <li>
                                E-mail: 
                                <a href="mailto:norvicine@gmail.com">norvicine@gmail.com</a> / 
                                <a href="mailto:norvicnursingedu@blc.com.np">norvicnursingedu@blc.com.np</a>
                            </li>
                        </ul>
                        <ul class="footer-icon">
                            <li>
                                <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/Norvic-Institute-of-Nursing-Education-905646376249757/" target="_blank">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="col-sm-12 col-md-7 col-lg-8">
                    <div class="footer-title">
                        <h4>Quick Links</h4>
                    </div>
                    <div class="footer-listing">
                        <ul class="links row">
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np">Home</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/about">About Us</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/chairman-message">Chairman's Message</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/chief-executive-officer-2">Chief Executive Officer</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/principal-s-message">Campus Chief's Message</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="#!">Scholarships</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/faculty-and-staff">Faculty and Staff</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/career">Norvic Careers</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/all-programs">Programme</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/gallery">Gallery</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/testimonial">Testimonials</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/news">News & Blogs</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/notice">Notice</a></li>
                            <li class="col-xs-6 col-sm-6 col-md-6 col-lg-4"><a href="https://norviceducations.edu.np/contact-us">Contact Us</a></li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="copyright">
        <div class="container">
            <p class="p1">Copyright © Norvic College of Health Sciences and Technologies.</p>
            <p class="p2">
                Designed and maintained by 
                <a href="https://www.peacenepal.com/" target="_blank">Peace Nepal Dot Com</a>
            </p>
        </div>
    </div>

</footer>

    <!-- Admin Assets: JS -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>

    <!-- Lightbox JS -->
    <script src="https://cdn.jsdelivr.net/npm/lightbox2/dist/js/lightbox.min.js"></script>

    <script>
        // Toastr Notifications
        toastr.success('Welcome to NRN Website!');
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.subscribe').click(function() {
        var email = $('#subscription-email-text').val();
        $.ajax({
            type: 'post',
            url: "https://norviceducations.edu.np/email-subscription/store",
            data: {
                _token: $("meta[name='csrf-token']").attr('content'),
                email: email,
            },
            dataType: "json",

            success: function(response) {
                $("#subscription-email-text").val("");
                $("#subscription-email-text").val("");
                $('#message-subscription').html("");
                $('#message-subscription').removeClass("d-none");
                $('#message-subscription').removeClass("text-danger");
                $('#message-subscription').addClass("text-success");
                $('#message-subscription').append(
                    response.message);
                setTimeout(() => {
                    $('#message-subscription').addClass("d-none");
                }, 5000);
            },
            error: function(request, status, error) {
                let json = jQuery.parseJSON(request.responseText);
                $("#subscription-email-text").val("");
                $('#message-subscription').html("");
                $('#message-subscription').removeClass("d-none");
                $('#message-subscription').removeClass("text-success");
                $('#message-subscription').addClass("text-danger");
                $('#message-subscription').append(
                    json.message);
                setTimeout(() => {
                    $('#message-subscription').addClass("d-none");
                }, 5000);

            },

        })
    })
</script>
    
    <!-- :: jQuery JS -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery-3.6.0.min.js"></script>

    <!-- :: Bootstrap JS Bundle With Popper JS -->
    <script src="https://norviceducations.edu.np/frontend/js/bootstrap.bundle.min.js"></script>

    <!-- :: Owl Carousel JS -->
    <script src="https://norviceducations.edu.np/frontend/js/owl.carousel.min.js"></script>

    <!-- :: Lity -->
    <script src="https://norviceducations.edu.np/frontend/js/lity.min.js"></script>

    <!-- :: Nice Select -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery.nice-select.min.js"></script>

    <!-- :: DatePicker -->
    <script src="https://norviceducations.edu.np/frontend/js/datepicker.min.js"></script>

    <!-- :: TimePicker -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery.timepicker.min.js"></script>

    <!-- :: Magnific Popup -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery.magnific-popup.min.js"></script>

    <!-- :: Waypoints -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery.waypoints.min.js"></script>

    <!-- :: CounterUp -->
    <script src="https://norviceducations.edu.np/frontend/js/jquery.counterup.min.js"></script>

    <!-- :: Main JS -->
    <script src="https://norviceducations.edu.np/frontend/js/main.js"></script>
    <script src="https://norviceducations.edu.np/frontend/js/ajax-script.js"></script>

    <script>
    $(document).ready(function() {
  var closeHeight = '9em';  
  var moreText = 'Read All';  
  var lessText = 'Close';
  var duration = '3000';
  var easing = 'linear';  

  $('.page-template-page_blog-php #content .entry, .container #content .entry').each(function() {
   
  var current = $(this).children('.entry-content');
  current.data('fullHeight', current.height()).css('height', closeHeight);

  current.after('<a href="javascript:void(0);" class="more-link closed">' + moreText + '</a>');

  });
   
  var openSlider = function() {
  link = $(this);
  var openHeight = link.prev('.entry-content').data('fullHeight') + 'px';
  link.prev('.entry-content').animate({'height': openHeight}, {duration: duration }, easing);
  link.text(lessText).addClass('open').removeClass('closed');
  link.unbind('click', openSlider);
  link.bind('click', closeSlider);
  }

  var closeSlider = function() {
  link = $(this);
  link.prev('.entry-content').animate({'height': closeHeight}, {duration: duration }, easing);
  link.text(moreText).addClass('closed').removeClass('open');
  link.unbind('click');
  link.bind('click', openSlider);
  }
   
  $('.more-link').bind('click', openSlider);
   
});
</script>
        <script type="text/javascript">
        $('form').submit(function() {
            $(this).find("button[type='submit']").prop('disabled', true);
        });


        // Example starter JavaScript for disabling form submissions if there are invalid fields

        // alert("hello");
        $(document).ready(function() {
            
                $('.btn-close').on('click', function() {
                    $(this).closest('.modal').modal('hide');
                });
                $('#popup1').modal('show');
            
                $('.btn-close').on('click', function() {
                    $(this).closest('.modal').modal('hide');
                });
                $('#popup2').modal('show');
                        $('.btn-close').on('click', function() {
                $(this).closest('.modal').modal('hide');
            });

        });
    </script>

</body>

</html>

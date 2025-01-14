<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NRN Website</title>

    <!-- Admin Assets for Bootstrap and jQuery -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

    <!-- Toastr CSS (for flash messages) -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">

    <!-- Lightbox CSS -->
    <link href="https://cdn.jsdelivr.net/npm/lightbox2/dist/css/lightbox.min.css" rel="stylesheet">

    <!-- Custom Styles -->
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
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">NRN Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gallery
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#photo-gallery">Photo Gallery</a></li>
                            <li><a class="dropdown-item" href="#video-gallery">Video Gallery</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>Welcome to NRN</h1>
        <p>Your gateway to Non-Resident Nepali services.</p>
    </section>

    <!-- About Section -->
    <section id="about" class="container py-5">
        <div class="row text-center">
            <div class="col-12 col-md-6">
                <h2>About NRN</h2>
                <p>Non-Resident Nepali (NRN) organization aims to bring together Nepali people living abroad to support the development of Nepal and contribute towards the welfare of Nepali communities worldwide.</p>
            </div>
            <div class="col-12 col-md-6">
                <img src="https://source.unsplash.com/600x400/?nepal,culture" alt="About NRN" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/600x400/?service" class="card-img-top" alt="Service 1">
                        <div class="card-body">
                            <h5 class="card-title">Service 1</h5>
                            <p class="card-text">Description of Service 1. Providing support for NRN’s in various sectors.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/600x400/?service" class="card-img-top" alt="Service 2">
                        <div class="card-body">
                            <h5 class="card-title">Service 2</h5>
                            <p class="card-text">Description of Service 2. Facilitating networking and collaboration opportunities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <img src="https://source.unsplash.com/600x400/?service" class="card-img-top" alt="Service 3">
                        <div class="card-body">
                            <h5 class="card-title">Service 3</h5>
                            <p class="card-text">Description of Service 3. Connecting NRNs with local businesses in Nepal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Photo Gallery Section -->
    <section id="photo-gallery" class="container py-5">
        <h2 class="text-center">Photo Gallery</h2>
        <div class="row gallery">
            <div class="col-12 col-md-4">
                <a href="https://source.unsplash.com/600x400/?nature" data-lightbox="gallery"><img src="https://source.unsplash.com/600x400/?nature" alt="Image 1" class="img-fluid"></a>
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
    <footer class="footer text-center">
        <div class="container">
            <p>© 2025 NRN Website | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a></p>
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

</body>

</html>

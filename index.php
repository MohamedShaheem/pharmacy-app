<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XMedi - Your Health, Our Priority</title>
    <link rel="shortcut icon" href="asset/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #17a2b8;
        }
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .custom-carousel {
            height: 600px;
            overflow: hidden;
        }
        .custom-carousel img {
            object-fit: cover;
            height: 100%;
        }
        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,.1);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
        }
        footer {
            background-color: #343a40;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><span class="text-success">X</span>Medi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <a href="login.php" class="btn btn-outline-success">Login</a>
            </div>
        </div>
    </nav>

    <div id="heroCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/img1.jpg" class="d-block w-100" alt="Healthcare professional">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Your Health, Our Priority</h2>
                    <p>Providing quality healthcare solutions for you and your family.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/img2.jpg" class="d-block w-100" alt="Medicine display">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Wide Range of Products</h2>
                    <p>From prescription medicines to health supplements, we've got you covered.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="asset/img3.jpg" class="d-block w-100" alt="Online pharmacy service">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Convenient Online Service</h2>
                    <p>Order your medications from the comfort of your home.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Our Services</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="asset/mdi1.jpg" class="card-img-top" alt="Prescription Medicines">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Prescription Medicines</h5>
                        <p class="card-text">Browse our wide range of prescription medicines, safely and quickly delivered to your doorstep.</p>
                        <a href="#" class="btn btn-primary mt-auto">Explore Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="asset/medi2.jpg" class="card-img-top" alt="Over-the-Counter Products">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Over-the-Counter Products</h5>
                        <p class="card-text">From pain relievers to cough syrup, find everything you need without a prescription.</p>
                        <a href="#" class="btn btn-primary mt-auto">Shop OTC Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="asset/mdi3.jpg" class="card-img-top" alt="Health Supplements">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Health Supplements</h5>
                        <p class="card-text">Enhance your wellness with our range of vitamins, minerals, and health supplements.</p>
                        <a href="#" class="btn btn-primary mt-auto">View Supplements</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container">
            <h2 class="text-center mb-4">Why Choose XMedi?</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <i class="fas fa-shipping-fast feature-icon mb-3"></i>
                    <h4>Fast Delivery</h4>
                    <p>Get your medicines delivered to your doorstep within 24 hours.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-user-md feature-icon mb-3"></i>
                    <h4>Expert Consultation</h4>
                    <p>Our licensed pharmacists are available for online consultation.</p>
                </div>
                <div class="col-md-4 text-center">
                    <i class="fas fa-shield-alt feature-icon mb-3"></i>
                    <h4>Quality Assurance</h4>
                    <p>All our products are sourced from trusted manufacturers.</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About XMedi</h5>
                    <p>Your trusted online pharmacy for all your healthcare needs.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Privacy Policy</a></li>
                        <li><a href="#" class="text-light">Terms of Service</a></li>
                        <li><a href="#" class="text-light">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <p>Email: info@Xmedi.com<br>Phone: +1 (123) 456-7890</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; 2024 XMedi. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
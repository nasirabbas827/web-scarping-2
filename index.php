<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Scraping Project</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* styles.css */
        .jumbotron {
            height: 600px;
            background-image: url('./images/business.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        .jumbotron::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)); /* Adjust the alpha values to control the gradient's opacity */
        }

        .jumbotron h1,
        .jumbotron p,
        .jumbotron a {
            position: relative;
            z-index: 1;
            color: #fff; /* Text color on the gradient overlay */
        }

        .card-img-top {
            height: 200px; /* Adjust the card image height */
            object-fit: cover;
        }

        .card-text {
            font-size: 16px;
        }

        .web-scraping-info {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .web-scraping-info h2 {
            color: #333;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<?php include('navbar.php'); ?>

<div class="jumbotron text-center">
    <h1>Welcome to our Web Scraping Project</h1>
    <p>We gather data from the web to provide valuable insights.</p>
    <a class="btn btn-primary" href="login.php">Learn More</a>
</div>

<!-- Web Scraping Info Section -->
<div class="container web-scraping-info">
    <h2>About Web Scraping</h2>
    <p>
        Web scraping is the process of extracting data from websites. It allows us to gather information, analyze trends, and make informed decisions. Our project specializes in web scraping techniques to provide you with valuable data for various purposes.
    </p>
</div>

<!-- Picture Cards -->
<div class="container mt-3 mb-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="./images/business.jpg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">Card 1</h5>
                    <p class="card-text">
                        Card 1 provides insights into the latest business trends. It includes data on stock prices, market analysis, and financial news.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="./images/business.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Card 2</h5>
                    <p class="card-text">
                        Card 2 focuses on technology trends. It offers information on the latest gadgets, software updates, and tech news.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="./images/business.jpg" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">
                        Card 3 is all about health and wellness. It provides insights into healthy living, nutrition, and fitness tips.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light text-center py-3">
    <p>&copy; 2023 Web Scraping Project</p>
</footer>

<!-- Add Bootstrap JS and jQuery links here -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Maleenaf  Boutique & Clothing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="index.css">
    <!-- Optional Bootstrap styling -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1 class="text-center">Maleenaf Boutique & Clothing</h1>
        <nav>
            <ul>
                <li><a href="#">Clothes</a></li>
                <li><a href="#">Sunglasses</a></li>
                <li><a href="#">Wrist Watches</a></li>
                <li><a href="#">Shoes</a></li>
            </ul>
        </nav>
    </header>

    <div class="carousel">
        <img class="carousel-img" src="img/slide1.jpg">
        <div class="carousel-text">
            <h2 style="margin-top: 120px; box-shadow: 1px 2px 1px 5px black; padding:5px;border-radius: 4px;" class="text-success">Welcome to M.Y. Boutique & Clothing</h2>
            <p>Shop our latest collections of clothes, sunglasses, wrist watches, and shoes.</p>
            <a href="#" class="btn">Shop Now</a>
        </div>
    </div>

    <main>
        <h2>New Arrivals</h2>

        <div class="product-grid">
            <?php
                // Connect to database
                include "server.php";
                // $conn = mysqli_connect("localhost", "root", "", "my");

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Query for new arrivals
                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);

                // Loop through results and display each product
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="product">';
                    echo '<img src="uploads/' . $row['image_url'] . '">';
                    echo '<h3>' . $row['product_name'] . '</h3>';
                    echo '<p class="price">&#8358;' . $row['price'] . '</p>';
                    echo '<a href="#" class="btn btn-secondary">Add to Cart</a>';
                    echo '</div>';
                }

                // Close database connection
                mysqli_close($conn);
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2023-<?php echo date("Y"); ?> Maleenaf Boutique & Clothing. All rights reserved.</p>
    </footer>

    <!-- Optional Bootstrap JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    <!-- Carousel slider JavaScript -->
    <script>
        var carouselImg = document.querySelector('.carousel-img');
        var carouselText = document.querySelector('.carousel-text');

        carouselImg.addEventListener('mouseenter', function() {
            carouselText.classList.add('animate__animated', 'animate__bounceInUp');
        });

        carouselImg.addEventListener('mouseleave', function() {
            carouselText.classList.remove('animate__animated', 'animate__bounceInUp');
        });
    </script>
</body>
</html>

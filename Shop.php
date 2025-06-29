<?php
$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guitar Shop</title>
    <link rel="stylesheet" href="Shop.css">
</head>
<body>
<header>
    <div class="logo">
        <span class="menu-icon"></span> Acoustic Haven
    </div>
    <nav>
        <ul>
            <li><a href="Acoustic.html">Home</a></li>
            <li><a href="shop.php" class="active">Shop</a></li>
            <li><a href="About.html">About</a></li>
            <li><a href="Conact.html">Contact</a></li>
            <li><a href="Login.html">Login</a></li>
            <li><a href="polic.html">Privacy Policy</a></li>
        </ul>
    </nav>
    <div class="cart-container">
        <a href="cart.html">
            <img src="shopping-cart.png" alt="Cart" class="cart-img">
            <span class="cart-text">View Cart</span>
        </a>
    </div>
</header>

<section class="shop">
    <h1>Buy Now!</h1>

    <div class="guitar-list">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="guitar-item">
                <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">

                <p><?= htmlspecialchars($row['name']) ?> - Rs.<?= number_format($row['price'], 2) ?></p>
                <button>Add to Cart</button>
            </div>
        <?php endwhile; ?>
    </div>

    <h2>Exclusive Signed Guitars</h2>
    <div class="exclusive-list">
        
        <div class="guitar-item">
            <img src="Signed.jpg" alt="Signed by Ed Sheeran!">
            <p>Ed Sheeran(Signed) - Rs.850000.00</p>
            <button>Add to Cart</button>
        </div>
        <div class="guitar-item">
            <img src="John.jpeg" alt="Signed by John Mayer!">
            <p>John Mayor(Signed) - Rs.750000.00</p>
            <button>Add to Cart</button>
        </div>
        
    </div>
</section>

<section class="coming-soon">
    <h2>Coming Soon!</h2>
    <h3>Stay tuned for new arrivals and exclusive offers.</h3>
</section>

<section class="slideshow-container">
    <div class="slide">
        <img src="sss.webp" alt="Slide 1">
    </div>
    <div class="slide">
        <img src="www.webp" alt="Slide 2">
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</section>

<footer>
    <p>&copy; 2025 Acoustic Haven. All rights reserved.</p>
</footer>

<script>
    let slideIndex = 0;
    function showSlides() {
        let slides = document.getElementsByClassName("slide");
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) { slideIndex = 1 }
        slides[slideIndex - 1].style.display = "block";
        timer = setTimeout(showSlides, 3000);
    }

    function plusSlides(n) {
        clearTimeout(timer);
        slideIndex += n;
        if (slideIndex > slides.length) { slideIndex = 1 }
        if (slideIndex < 1) { slideIndex = slides.length }
        showSlides();
    }

    let timer = setTimeout(showSlides, 3000);
</script>
<script src="cart.js"></script>

</body>
</html>

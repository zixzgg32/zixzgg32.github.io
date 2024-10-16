<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design Marketplace</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="light-mode">
    <header>
        <nav class="navbar">
            <div class="logo">DesignMarket</div>
            <menu class="navbar-list">
                <li class="navbar-item">
                    <a href="jasa/formJasa.php" class="item-navbar">
                        Become a Seller
                    </a>
                    
                </li>
                <li class="navbar-item">
                    <a href="notavailable.php" class="item-navbar">
                        Explore
                    </a>
                </li>
                <li class="navbar-item">
                    <a href="index.php" class="item-navbar">
                        Home
                    </a>
                </li>
            </menu>
            <?php if(isset($_SESSION['username'])): ?>
                <div class="user-info" id="hamburger-menu">
                    <img src="assets/profilePicture.png" alt="User Photo" class="mini-profile-picture">
                </div> 
            <?php else: ?>
                <div class="hamburger-menu" id="hamburger-menu">
                    &#9776;
                </div>
            <?php endif; ?>
        </nav>
    </header>

    <div id="side-menu" class="side-menu">
        <button id="close-menu" class="close-menu">&times;</button>
        <ul>
            <?php if(isset($_SESSION['username'])): ?>
                <div class="user-info"">
                    <img src="assets/profilePicture.png" alt="User Photo" class="profile-picture"><br>
                    <span class="profile-name"><?php echo $_SESSION['username']; ?></span>
                </div><br>
                <hr>
                <li><a href="index.php">Home</a></li>
                <li><a href="notavailable.php">Explore</a></li>
                <li><a href="jasa/formJasa.php">Become a Seller</a></li>
                <li><a href="aboutme.php">About Me</a></li>
                <hr>
                <li>
                    <input type="radio" name="switch" id="switchA" value="Light Mode">
                    <label for="switchA" class="switch">Light Mode</label><br>
                    <input type="radio" name="switch" id="switchB" value="Dark Mode">
                    <label for="switchB" class="switch">Dark Mode</label>
                </li>
                <hr>
                <li><a href="akun/logout.php" class="item-navbar">Logout</a></li>
            <?php else: ?>
                <div class="user-info"">
                    <img src="assets/profile-picture.png" alt="User Photo" class="profile-picture"><br>
                    <span style="align-self: center;"><a href="akun/login.php" class="profile-name">Login / Sign Up</a></span>
                </div><br>
                <hr>
                <li><a href="index.php">Home</a></li>
                <li><a href="notavailable.php">Explore</a></li>
                <li><a href="jasa/formJasa.php">Become a Seller</a></li>
                <li><a href="aboutme.php">About Me</a></li>
                <hr>
                <li>
                    <input type="radio" name="switch" id="switchA" value="Light Mode">
                    <label for="switchA" class="switch">Light Mode</label><br>
                    <input type="radio" name="switch" id="switchB" value="Dark Mode">
                    <label for="switchB" class="switch">Dark Mode</label>
                </li>
                <hr>
            <?php endif; ?>

        </ul>
    </div>

    <section class="search-section">
        <h1>Find the Perfect Design For Your Needs</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search by designer or design type">
            <button class="btn-search">Search</button>
        </div>
    </section>

    <section class="recommended-services">
        <h2>Recommended Design Services</h2>
        <div class="service-cards">
            <div class="card">
                <h3>John Doe</h3>
                <p><strong>Design Type:</strong> Logo Design</p>
                <p><strong>Contact:</strong> john.doe@email.com</p>
                <p><strong>Starting Price:</strong> $100</p>
                <button class="btn-discuss">Discuss</button>
            </div>
            <div class="card">
                <h3>Jane Smith</h3>
                <p><strong>Design Type:</strong> Website Design</p>
                <p><strong>Contact:</strong> jane.smith@email.com</p>
                <p><strong>Starting Price:</strong> $300</p>
                <button class="btn-discuss">Discuss</button>
            </div>
            <div class="card">
                <h3>Mike Johnson</h3>
                <p><strong>Design Type:</strong> Poster Design</p>
                <p><strong>Contact:</strong> mike.johnson@email.com</p>
                <p><strong>Starting Price:</strong> $50</p>
                <button class="btn-discuss">Discuss</button>
            </div>
        </div>
    </section>

    <footer id="footer">
        <div class="footer-content">
            <div class="footer-logo">DesignMarket</div>
            <div class="footer-contact">
                <p><strong>Contact Us:</strong> designmarket@designmarket.ac.id</p>
                <p><strong>Phone:</strong> +62-876-5432-4321</p>
            </div>
            <div class="footer-about">
                <a href="aboutme.php" class="item-navbar">About Me</a>
            </div>
        </div>
    </footer>

    <script src="script/script.js"></script>
</body>
</html>

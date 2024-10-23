<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about me</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">DesignMarket</div>
            <menu class="navbar-list">
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
                <div class="user-info">
                    <img src="assets/profilePicture.png" alt="User Photo" class="profile-picture"><br>
                    <span class="profile-name"><?php echo $_SESSION['username']; ?></span>
                </div><br>
                <hr>
                <li><a href="index.php">Home</a></li>
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
                <div class="user-info">
                    <img src="assets/profile-picture.png" alt="User Photo" class="profile-picture"><br>
                    <span style="align-self: center;"><a href="akun/login.php" class="profile-name">Login / Sign Up</a></span>
                </div><br>
                <hr>
                <li><a href="index.php">Home</a></li>
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

    <div class="about-container">
        <h1>About Me</h1>
        <div class="profile">
            <img src="assets/LOGO.jpg" alt="" class="profile-img">
            <div class="bio">
                <h2>Zhorif Fachdiat</h2>
                <p><strong>Universitas:</strong> Universitas Mulawarman</p>
                <p><strong>NIM:</strong> 2309106014</p>
                <p><strong>Kelas:</strong> A'23</p>
                <p><strong>Email:</strong> zhorif.f.32@gmail.com</p>
                <p>Website Design Marketplace berfungsi sebagai tempat orang berjualan dan juga membeli desain yang sesuai dengan selera mereka.</p>
                <a href="index.php" class="linkhome">back to marketplace</a>
            </div>
        </div>
    </div>
</body>
<script src="script/script.js"></script>
</html>
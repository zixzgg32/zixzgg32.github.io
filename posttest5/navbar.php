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
            <img src="assets/profilePicture.png" alt="User Photo" style="width: 40px; height: 40px; border-radius: 50%;">
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
            <div class="user-info" id="hamburger-menu">
                <img src="assets/profilePicture.png" alt="User Photo" style="width: 40px; height: 40px; border-radius: 50%;">
                <span><?php echo $_SESSION['username']; ?></span>
            </div> 
            <li><a href="index.php">Home</a></li>
            <li><a href="notavailable.php">Explore</a></li>
            <li><a href="notavailable.php">Become a Seller</a></li>
            <li><a href="aboutme.php">About Me</a></li>
            <li><a href="akun/logout.php" class="item-navbar">Logout</a></li>
        <?php else: ?>
            <li><a href="akun/login.php">Login / Sign Up</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="notavailable.php">Explore</a></li>
            <li><a href="notavailable.php">Become a Seller</a></li>
            <li><a href="aboutme.php">About Me</a></li>
        <?php endif; ?>
        <hr>
        <li>
            <label for="switch">Dark Mode</label>
        </li>
    </ul>
    <p class="side-menu">Dark Mode</p>
    <label class="switch" style="align-self: center;">
        <input type="checkbox" id="switch" class="switch">
        <span class="slider round"></span>
    </label>
</div>

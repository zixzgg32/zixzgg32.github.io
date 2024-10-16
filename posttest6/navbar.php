<header>
    <nav class="navbar">
        <div class="logo">DesignMarket</div>
        <menu class="navbar-list">
            <li class="navbar-item">
                <a href="../jasa/formJasa.php" class="item-navbar">
                    Become a Seller
                </a>
                
            </li>
            <li class="navbar-item">
                <a href="../notavailable.php" class="item-navbar">
                    Explore
                </a>
            </li>
            <li class="navbar-item">
                <a href="../index.php" class="item-navbar">
                    Home
                </a>
            </li>
        </menu>
        <?php if(isset($_SESSION['username'])): ?>
            <div class="user-info" id="hamburger-menu">
                <img src="../assets/profilePicture.png" alt="User Photo" class="mini-profile-picture">
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
                <img src="../assets/profilePicture.png" alt="User Photo" class="profile-picture"><br>
                <span class="profile-name"><?php echo $_SESSION['username']; ?></span>
            </div><br>
            <hr>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../notavailable.php">Explore</a></li>
            <li><a href="../jasa/formJasa.php">Become a Seller</a></li>
            <li><a href="../aboutme.php">About Me</a></li>
            <hr>
            <li>
                <input type="radio" name="switch" id="switchA" value="Light Mode">
                <label for="switchA" class="switch">Light Mode</label><br>
                <input type="radio" name="switch" id="switchB" value="Dark Mode">
                <label for="switchB" class="switch">Dark Mode</label>
            </li>
            <hr>
            <li><a href="../akun/logout.php" class="item-navbar">Logout</a></li>
        <?php else: ?>
            <div class="user-info"">
                <img src="../assets/profile-picture.png" alt="User Photo" class="profile-picture"><br>
                <span style="align-self: center;"><a href="../akun/login.php" class="profile-name">Login / Sign Up</a></span>
            </div><br>
            <hr>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../notavailable.php">Explore</a></li>
            <li><a href="../jasa/formJasa.php">Become a Seller</a></li>
            <li><a href="../aboutme.php">About Me</a></li>
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
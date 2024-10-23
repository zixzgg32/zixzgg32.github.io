<?php 
    session_start(); 
    require "connection.php";
    $sqlJasa = mysqli_query($conn, "SELECT * FROM jasa");
    $sqlKomen = mysqli_query($conn, "SELECT * FROM komentar");
    $sqlBalas = mysqli_query($conn, "SELECT * FROM balasankomen");


    $jasa = [];
    $komentar = [];
    $balasankomen = [];

    while ($row = mysqli_fetch_assoc($sqlJasa)){
        $jasa[] = $row;
    }
    while ($row = mysqli_fetch_assoc($sqlKomen)){
        $komentar[] = $row;
    }
    while ($row = mysqli_fetch_assoc($sqlBalas)){
        $balasankomen[] = $row;
    }



    $filterJasa = array_filter($jasa, function($item) {
        return $item['username'] !== 'Guest';
    });

    if (isset($_POST['send'])) {
        $idService = $_POST['idService'];
        $username = $_POST['username'];
        $komen = $_POST['komen'];

        if (!empty($komen) && !empty($idService) && !empty($username)) {
            $sqlKomen = $conn->prepare("INSERT INTO komentar (idService, user, komen) VALUES (?, ?, ?)");
            $sqlKomen->bind_param("iss", $idService, $username, $komen);

            if ($sqlKomen->execute()) {
                echo "
                <script>
                    alert('Pesan Berhasil Terkirim!');
                </script>";
            } else {
                echo "
                <script>
                    alert('Pesan Tidak Berhasil Terkirim!');
                </script>";
            }
        } else {
            echo "
            <script>
                alert('Data tidak boleh kosong!');
            </script>";
        }
    } 
?>
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

    <section class="recommended-services">
        <h2>Design Services You Might Want</h2>
        <div class="service-cards">
            <?php foreach($filterJasa as $jasa) : ?>
                <div class="card">
                    <div class="cardDemo">
                    <?php $direktori = "Database/demoDesign/" . $jasa["demoDesign"];?>
                        <?php echo "<img src='$direktori' alt='demoDesign' width='100px'>"?> 
                    </div>
                    <div class="cardDesk">
                        <h3><?= $jasa['username']; ?></h3>
                        <p><strong>Design Type:</strong> <?= $jasa['designType']; ?></p>
                        <?php
                            $username = $jasa['username'];
                            $emailQuery = mysqli_query($conn, "SELECT email FROM akun WHERE username = '$username'");
                            $akun = mysqli_fetch_assoc($emailQuery);
                        ?>
                        <p><strong>Contact:</strong> <?= $akun['email']; ?></p>
                        <p><strong>Price:</strong> $<?= $jasa['price']; ?></p>
                        <?php if(isset($_SESSION['username'])): ?>
                            <button class="btn-discuss" data-target="openModalDiscuss-<?= $jasa['id']; ?>">Discuss</button>
                        <?php else: ?>
                            <button class="btn-discuss" data-target="perluLogin">Discuss</button>
                        <?php endif; ?>
                    </div>
                    <div id="openModalDiscuss-<?= $jasa['id']; ?>" class="modal-wrapper">
                        <div class="modal">
                            <a href="#close" title="Close" class="close">&times;</a>
                            <div class="modal-header">
                                <img src="assets/profilePicture.png" alt="User Photo" class="profile-picture">
                                <h3><?= $jasa['username']; ?></h3>
                            </div>
                            <div class="modal-message">
                                <!-- Belum selesai -->
                            </div>
                            <div class="modal-sendMessage">
                                <form method="post">
                                    <textarea name="komen" placeholder="Type your message here..." required></textarea>
                                    <input type="hidden" name="idService" value="<?= htmlspecialchars($jasa['id'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <input type="hidden" name="username" value="<?= htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <button type="submit" name="send">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="perluLogin" class="modal-wrapper">
                        <div class="modal">
                            <a href="#close" title="Close" class="close">&times;</a>
                            <div class="modal-header">
                                <img src="assets/profilePicture.png" alt="User Photo" class="profile-picture">
                                <h3><?= $jasa['username']; ?></h3>
                            </div>
                            <div class="loginModal">
                                <h1><a href="akun/login.php">Login / Sign Up</a></h1>
                                <p>Pleas login first</p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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
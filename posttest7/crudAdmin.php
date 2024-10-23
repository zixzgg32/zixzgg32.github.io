<?php
    session_start();

    require "connection.php";
    $sql = mysqli_query($conn, "SELECT * FROM jasa");

    $jasa = [];

    while ($row = mysqli_fetch_assoc($sql)){
        $jasa[] = $row;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>CRUD Admin</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="light-mode">
    <header>
        <nav class="navbar">
            <div class="logo">DesignMarket</div>
            <div class="user-info" id="hamburger-menu">
                <img src="assets/ppAdmin.png" alt="User Photo" class="mini-profile-picture">
            </div> 
        </nav>
    </header>

    <div id="side-menu" class="side-menu">
        <button id="close-menu" class="close-menu">&times;</button>
        <ul>
            <div class="user-info">
                <img src="assets/ppAdmin.png" alt="User Photo" class="profile-picture"><br>
                <span class="profile-name"><?php echo $_SESSION['username']; ?></span>
            </div><br>
            <hr>
            <li>
                <input type="radio" name="switch" id="switchA" value="Light Mode">
                <label for="switchA" class="switch">Light Mode</label><br>
                <input type="radio" name="switch" id="switchB" value="Dark Mode">
                <label for="switchB" class="switch">Dark Mode</label>
            </li>
            <hr>
            <li><a href="akun/logout.php" class="item-navbar">Logout</a></li>
        </ul>
    </div>

    <h1 class="form-header">Service Data</h1>

    <section class="search-section">
        <div class="search-bar">
            <input type="text" name="keyword" id="keyword" placeholder="Search by designer or design type">
        </div>
    </section>

    <div class="searchServices" id="searchServices">
        <section class="creator-service-section">
            <table border=2>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Demo Design</th>
                        <th>Design Type</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($jasa as $jasa) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $jasa['username'] ?></td>
                        <?php $direktori = "Database/demoDesign/" . $jasa["demoDesign"]; ?>
                        <td><?php if ($jasa["demoDesign"] == "") {
                                    echo "Image Not Avilable";
                                } else {
                                    echo "<img src='$direktori' alt='demoDesign' width='100px'>";
                        } ?></td>
                        <td><?= $jasa["designType"] ?></td>
                        <td><?= "$". $jasa["price"] ?></td>
                        <td>
                            <a href="jasa/editJasa.php?id=<?= $jasa['id'] ?>" class="action">Edit</a> | 
                            <a href="jasa/deleteJasa.php?id=<?= $jasa['id'] ?>" onclick = "return confirm('Yakin ingin menghapus data?');" class="action">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; endforeach ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
<script src="script/script.js"></script>
</html>
<?php
    session_start();
    require "../connection.php";
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
    <title>Service</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="light-mode">
    <?php require '../navbar.php'; ?>
    
    <h1 class="form-header">Service Data</h1>

    <section class="creator-profile-section">
        <?php if(isset($_SESSION['username'])): ?>
            <div class="creator-picture"">
                <img src="../assets/profilePicture.png" alt="User Photo" class="profile-picture">
            </div>
            <div class="creator-info">
                <h1><?php echo $_SESSION['username']; ?></h1>
                <p><?php echo $_SESSION['email']; ?></p>
            </div>
            <div class="creator-rating">
                <h1>Rating</h1>
                <p>0.0</p>
            </div>
        <?php else: ?>
            <div class="creator-picture">
                <img src="../assets/profile-picture.png" alt="User Photo" class="profile-picture">
            </div><br>
            <div class="creator-info">
                <span style="align-self: center;">
                    <a href="../akun/login.php" class="creator info">Login / Sign Up</a>
                </span>
            </div>
        <?php endif; ?>
    </section>

    <section class="creator-service-section">
        <table border=2>
            <thead>
                <tr>
                    <th>No</th>
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
                    <?php $direktori = "../Database/demoDesign/" . $jasa["demoDesign"]; ?>
                    <td><?php if ($jasa["demoDesign"] == "") {
                                echo "Image Not Avilable";
                            } else {
                                echo "<img src='$direktori' alt='demoDesign' width='100px'>";
                    } ?></td>
                    <td><?= $jasa["designType"] ?></td>
                    <td><?= "$". $jasa["price"] ?></td>
                    <td>
                        <a href="editJasa.php?id=<?= $jasa['id'] ?>" class="action">Edit</a> | 
                        <a href="deleteJasa.php?id=<?= $jasa['id'] ?>" onclick = "return confirm('Yakin ingin menghapus data?');" class="action">Delete</a>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
        <br>
        <a href="createJasa.php" class="link-add">Add Service</a>
    </section>
</body>
<script src="../script/script.js"></script>
</html>
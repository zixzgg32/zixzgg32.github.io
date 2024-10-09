<?php
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
    <link rel="stylesheet" href="../style/styleJasa.css">
</head>
<body>
    <!-- ?php require '../navbar.php'; ?> -->
    <h1>Service Data</h1>
    <br>

    <a href="../index.php" class="link">Home</a>

    <table border=2>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Design Type</th>
                <th>email</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($jasa as $jasa) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $jasa["username"] ?></td>
                <td><?= $jasa["designType"] ?></td>
                <td><?= $jasa["email"] ?></td>
                <td><?= $jasa["price"] ?></td>
                <td>
                    <a href="editJasa.php?id=<?= $jasa['idJasa'] ?>" class="action">Edit</a> | 
                    <a href="deleteJasa.php?id=<?= $jasa['idJasa'] ?>" onclick = "return confirm('Yakin ingin menghapus data?');" class="action">Delete</a>
                </td>
            </tr>
            <?php $i++; endforeach ?>
        </tbody>
    </table>

    <br>
    <a href="createJasa.php" class="link">Add Service</a>

    <!-- <script src="../script/script.js"></script> -->

</body>
</html>
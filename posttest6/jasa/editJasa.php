<?php 
    session_start();
    require "../connection.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM jasa WHERE id = $id");

    while ($row = mysqli_fetch_assoc($result)){
        $jasa[]= $row;
    }

    $jasa = $jasa[0];

    if(isset($_POST["submit"])){
        $designType = $_POST["designType"];
        $price = $_POST["price"];
        $tmp_name = $_FILES["demoDesign"]["tmp_name"];
        $file_name = $_FILES["demoDesign"]["name"];
        $file_size = $_FILES["demoDesign"]["size"]; 

        $max_size = 2 * 1024 * 1024; 
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        $ekstensi = explode('.', $file_name);
        $ekstensi = strtolower(end($ekstensi));
        $ekstensi = "." . $ekstensi;

        $newFileName = date('Y-m-d H.i.s') . $ekstensi;

        $sql = "UPDATE jasa SET demoDesign='$newFileName', designType='$designType', price='$price' WHERE id = $id";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "
            <script>
                alert('Berhasil Mengubah Data jasa!');
                document.location.href = 'formJasa.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal Mengubah Data jasa!');
                document.location.href = 'formJasa.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="light-mode">
    <?php require '../navbar.php'; ?>

    <h1 class="form-header">Edit Service</h1>
    <section class="crud-service-section">
        <form action="" method="post" class="crud-service">
            <label for="demoDesign">Upload Demo Design</label><br>
            <input type="file" name="demoDesign" id="demoDesign" value="<?= $jasa["demoDesign"] ?>" required><br>

            <label for="designType">Design Type</label><br>
            <select name="designType" id="designType" required>
                <option name="designType" id="designType" value="Logo Designer" <?php if($jasa["designType"] == "Logo Designer") echo "selected" ?> >Logo Designer</option>
                <option name="designType" id="designType" value="UI/UX" <?php if($jasa["designType"] == "UI/UX") echo "selected" ?> >UI/UX</option>
                <option name="designType" id="designType" value="Web Designer" <?php if($jasa["designType"] == "Web Designer") echo "selected" ?> >Web Designer</option>
                <option name="designType" id="designType" value="Animation Designer" <?php if($jasa["designType"] == "Animation Designer") echo "selected" ?> >Animation Designer</option>
            </select>
            <br>

            <label for="price">Starting Price</label><br>
            <input type="number" name="price" id="price" value="<?= $jasa["price"] ?>" required>
            <br>

            <button type="submit" name="submit">Changes</button>
            <br>
        </form>
    </section>
    
</body>
<script src="../script/script.js"></script>
</html>
<?php 
    require "../connection.php";

    $idJasa = $_GET['id'];

    $result = mysqli_query($conn, "SELECT * FROM jasa WHERE idJasa = $idJasa");

    while ($row = mysqli_fetch_assoc($result)){
        $jasa[]= $row;
    }

    $jasa = $jasa[0];

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $designType = $_POST["designType"];
        $email = $_POST["email"];
        $price = $_POST["price"];

        $sql = "UPDATE jasa SET username='$username', designType='$designType', email='$email', price='$price' WHERE idJasa = $idJasa";
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
    <link rel="stylesheet" href="../style/styleJasa.css">
</head>
<body class="edit">
    <h1>Edit Service</h1>

    <form action="" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" value="<?= $jasa["username"] ?>" required>
        <br>

        <label for="designType">Design Type</label><br>
        <select name="designType" id="designType" required>
            <option name="designType" id="designType" value="Logo Designer" <?php if($jasa["designType"] == "Logo Designer") echo "selected" ?> >Logo Designer</option>
            <option name="designType" id="designType" value="UI/UX" <?php if($jasa["designType"] == "UI/UX") echo "selected" ?> >UI/UX</option>
            <option name="designType" id="designType" value="Web Designer" <?php if($jasa["designType"] == "Web Designer") echo "selected" ?> >Web Designer</option>
            <option name="designType" id="designType" value="Animation Designer" <?php if($jasa["designType"] == "Animation Designer") echo "selected" ?> >Animation Designer</option>
        </select>
        <br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="<?= $jasa["email"] ?>" required>
        <br>

        <label for="price">Starting Price</label><br>
        <input type="number" name="price" id="price" value="<?= $jasa["price"] ?>" required>
        <br>

        <button type="submit" name="submit">Changes</button>
        <br>

    </form>
</body>
</html>

<?php require '../footer.php' ?>
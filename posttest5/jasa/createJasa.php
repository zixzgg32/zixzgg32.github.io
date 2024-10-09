<?php 
    require "../connection.php";

    if(isset($_POST["submit"])){
        $username = $_POST["username"];
        $designType = $_POST["designType"];
        $email = $_POST['email'];
        $price = $_POST["price"];

        $sql = "INSERT INTO jasa VALUES ('','$username','$designType','$email','$price')";

        $result = mysqli_query($conn, $sql);

        if($result){
            echo "
            <script>
                alert('Berhasil Menambah Data Mahasiswa!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal Menambah Data Mahasiswa!');
                document.location.href = 'index.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
    <link rel="stylesheet" href="../style/styleJasa.css">
</head>
<body class="create">
    <h1>Create Your Own Service</h1>

    <form action="" method="post">
        <label for="username">Username</label><br>
        <input type="text" name="username" id="username" required>
        <br>

        <label for="designType">Design Type</label><br>
        <select name="designType" id="designType" required>
            <option name="designType" id="designType" value="Logo Designer">Logo Designer</option>
            <option name="designType" id="designType" value="UI/UX">UI/UX</option>
            <option name="designType" id="designType" value="Web Designer">Web Designer</option>
            <option name="designType" id="designType" value="Animation Designer">Animation Designer</option>
        </select>
        <br><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" required>
        <br>

        <label for="price">Starting Price</label><br>
        <input type="number" name="price" id="price" required>
        <br>

        <button type="submit" name="submit">Tambah</button>
        <br>
    </form>
</body>
</html>

<?php require '../footer.php' ?>
<?php
    require "../connection.php";
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repeat_password = $_POST['repeat_password'];

        if ($password !== $repeat_password) {
            echo "<script>alert('Password dan Repeat Password tidak cocok!');</script>";
        } else {
            $sql = "INSERT INTO akun VALUES ('','$email','$username','$password')";
            $result = mysqli_query($conn, $sql);
            echo "<script>alert('Signup berhasil!'); window.location.href = 'login.php';</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="light-mode">
    <?php require '../navbar.php'; ?>
    <h1 class="form-header">Sign Up</h1>
    <section class="crud-service-section">
        <form method="POST" action="signup.php" class="crud-service">
            <label for="email">Email:</label><br>
            <input type="email" name="email" id="email" required><br><br>

            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>

            <label for="repeat_password">Repeat Password:</label><br>
            <input type="password" name="repeat_password" id="repeat_password" required><br><br>

            <button type="submit" name="submit">Sign Up</button>
        </form><br>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </section>
</body>
<script src="../script/script.js"></script>
</html>
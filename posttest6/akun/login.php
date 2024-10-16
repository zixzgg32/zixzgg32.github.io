<?php
    require "../connection.php" ;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM akun WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $data = mysqli_fetch_assoc($result);

            if ($data['password'] == $password) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['user_id'] = $data['id']; 

                echo "<script>alert('Login berhasil')</script>";
                header("Location: ../index.php");
                exit;
            } else {
                echo "<script>alert('Password salah')</script>";
            }
        } else {
            echo "<script>alert('Username tidak ditemukan')</script>";
        }
    }

    mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="light-mode">
    <?php require '../navbar.php'; ?>
    <h1 class="form-header">Login</h1>
    <section class="crud-service-section">
        <form method="POST" action="login.php" class="crud-service">
            <label for="username">Username:</label><br>
            <input type="text" name="username" id="username" required><br><br>

            <label for="passworsd">Password:</label><br>
            <input type="password" name="password" id="password" required><br><br>

            <button type="submit" name="submit">Login</button>
        </form><br>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    </section>
</body>
<script src="../script/script.js"></script>
</html>
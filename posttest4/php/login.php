<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username_email = $_POST['username_email'];
    $password = $_POST['password'];
    echo "<script>alert('Login berhasil!'); window.location.href = '../index.html';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../style/account.css">
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <label for="username_email">Username/Email:</label>
        <input type="text" name="username_email" id="username_email" required><br><br>

        <label for="passworsd">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
    <script src="../script/script.js"></script>
</body>
</html>

<?php require 'footer.php' ?>
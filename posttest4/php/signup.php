<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if ($password !== $repeat_password) {
        echo "<script>alert('Password dan Repeat Password tidak cocok!');</script>";
    } else {
        echo "<script>alert('Signup berhasil!'); window.location.href = '../index.html';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../style/account.css">
</head>
<body>
    <h2>Sign Up</h2>
    <form method="POST" action="signup.php">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="repeat_password">Repeat Password:</label>
        <input type="password" name="repeat_password" id="repeat_password" required><br><br>

        <button type="submit">Sign Up</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
    <script src="../script/script.js"></script>
</body>
</html>

<?php include 'footer.php' ?>
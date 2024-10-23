<?php
    session_start();
    require "../connection.php" ;
    if (isset($_POST["submit"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM akun WHERE username = '$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user["password"])) {
                session_regenerate_id(true);
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['id'] = $user['id']; 
                $_SESSION['login'] = true;
                if ($_POST['username'] == "AdminDesign") {
                    $_SESSION["role"] = "admin";
                    echo 
                    "<script>
                        alert('Login Berhasil');
                        document.location.href = '../crudAdmin.php'
                    </script>";
                    exit;
                } else {
                    $_SESSION["role"] = "user";
                    echo 
                    "<script>
                        alert('Login Berhasil');
                        document.location.href = '../index.php'
                    </script>";
                    exit;
                }
            } else {
                echo "<script>
                        alert('Password Salah');
                        document.location.href = 'login.php';
                      </script>";
            }
        } else {
            echo "<script>
                alert('Username atau Password Salah');
                document.location.href = 'login.php';
            </script>";
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
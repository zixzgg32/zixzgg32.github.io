<?php 
    session_start();
    require "../connection.php";

    if(isset($_POST["submit"])){
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        } else {
            $username = "Guest";
        }

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

        if(!in_array(ltrim($ekstensi, '.'), $allowed_extensions)) {
            echo "
            <script>
                alert('Ekstensi file tidak diizinkan. Hanya jpg, jpeg, png, gif, pdf yang diizinkan.');
                document.location.href = 'formJasa.php';
            </script>";
        } 
        elseif ($file_size > $max_size) {
            echo "
            <script>
                alert('Ukuran file terlalu besar! Maksimal 2MB.');
                document.location.href = 'formJasa.php';
            </script>";
        } else {
            if(move_uploaded_file($tmp_name, '../Database/demoDesign/' . $newFileName)) {
                $sql = "INSERT INTO jasa VALUES ('', '$username', '$newFileName', '$designType', '$price')";
                $result = mysqli_query($conn, $sql);
        
                if($result){
                    echo "
                    <script>
                        alert('Berhasil Menambah Data Jasa!');
                        document.location.href = 'formJasa.php';
                    </script>";
                } else {
                    // Error message from MySQL if the query fails
                    $error = mysqli_error($conn);
                    echo "
                    <script>
                        alert('Gagal Menambah Data Jasa! Error: $error');
                        document.location.href = 'formJasa.php';
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('File Tidak Valid atau Gagal diunggah.');
                    document.location.href = 'formJasa.php';
                </script>";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Service</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body class="light-mode">
    <?php require '../navbar.php'; ?>

    <h1 class="form-header">Create Service</h1>

    <section class="crud-service-section">
        <form action="" method="post" enctype="multipart/form-data" class="crud-service">
            <label for="demoDesign">Upload Demo Design</label><br>
            <input type="file" name="demoDesign" id="demoDesign"><br>

            <label for="designType">Design Type</label><br>
            <select name="designType" id="designType" required>
                <option name="designType" id="designType" value="Logo Designer">Logo Designer</option>
                <option name="designType" id="designType" value="UI/UX">UI/UX</option>
                <option name="designType" id="designType" value="Web Designer">Web Designer</option>
                <option name="designType" id="designType" value="Animation Designer">Animation Designer</option>
            </select><br>

            <label for="price">Starting Price</label><br>
            <input type="number" name="price" id="price" required>
            <br><br>

            <button calss="form-button" type="submit" name="submit">CREATE</button>
            <br>
        </form> 
    </section>
    
</body>
<script src="../script/script.js"></script>
</html>
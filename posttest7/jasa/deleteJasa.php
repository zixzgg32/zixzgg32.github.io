<?php
    session_start();
    require "../connection.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM jasa WHERE id = $id");
    
    if($result){
        if ($_SESSION['username'] == "AdminDesign") {
            echo "
            <script>
                alert('Berhasil Menghapus Data Service!');
                document.location.href = '../crudAdmin.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Berhasil Menghapus Data Service!');
                document.location.href = 'formJasa.php';
            </script>";
        }    
    }
?>
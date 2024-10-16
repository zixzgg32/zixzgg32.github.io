<?php
    require "../connection.php";

    $id = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM jasa WHERE id = $id");
    
    if($result){
        echo "
        <script>
            alert('Berhasil Menghapus Data Mahasiswa!');
            document.location.href = 'formJasa.php';
        </script>";
    }
?>
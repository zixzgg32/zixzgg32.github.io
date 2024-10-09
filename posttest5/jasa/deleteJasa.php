<?php
    require "../connection.php";

    $idJasa = $_GET['id'];

    $result = mysqli_query($conn, "DELETE FROM jasa WHERE idJasa = $idJasa");
    
    if($result){
        echo "
        <script>
            alert('Berhasil Menghapus Data Mahasiswa!');
            document.location.href = 'formJasa.php';
        </script>";
    }
?>
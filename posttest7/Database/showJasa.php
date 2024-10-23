<?php 
    require "../connection.php";

    $keyword = $_GET['keyword'];

    $query = "SELECT * FROM jasa WHERE username LIKE '%$keyword%' OR designType LIKE '%$keyword%'";
    $sql = mysqli_query($conn, $query);

    $jasa = [];

    while ($row = mysqli_fetch_assoc($sql)){
        $jasa[] = $row;
    }
?>

<section class="creator-service-section">
    <table border=2>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Demo Design</th>
                <th>Design Type</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($jasa as $jasa) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $jasa['username'] ?></td>
                <?php $direktori = "Database/demoDesign/" . $jasa["demoDesign"]; ?>
                <td><?php if ($jasa["demoDesign"] == "") {
                            echo "Image Not Avilable";
                        } else {
                            echo "<img src='$direktori' alt='demoDesign' width='100px'>";
                } ?></td>
                <td><?= $jasa["designType"] ?></td>
                <td><?= "$". $jasa["price"] ?></td>
                <td>
                    <a href="jasa/editJasa.php?id=<?= $jasa['id'] ?>" class="action">Edit</a> | 
                    <a href="jasa/deleteJasa.php?id=<?= $jasa['id'] ?>" onclick = "return confirm('Yakin ingin menghapus data?');" class="action">Delete</a>
                </td>
            </tr>
            <?php $i++; endforeach ?>
        </tbody>
    </table>
</section>
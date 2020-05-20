<?php 
    if (!isset($_GET['id'])){
        header("location: ../index.php");
        exit;
    }

    require 'function.php';

    $id = $_GET['id'];

    $i = query("SELECT * FROM elektronik WHERE id = $id")[0];
?>

<html>
    <head>
        <title>document</title>
        <link rel="stylesheet" href="../css/detail.css">
    </head>

<body>
<div class="container">
        <div class="photo">
            <img src="../assets/img/<?= $i["photo"]; ?>" alt="">
         </div>
            <div class="keterangan">
                <p><?= $i["jenis"]; ?></p>
                <p><?= $i["merek"]; ?></p>
                <p><?= $i["tipe"]; ?></p>
                <p><?= $i["harga"]; ?></p>
            
                <div>
                    <a href="../index.php"><button class="tombol_kembali">Back</button></a>
                </div>
            </div>

            
    </div>
</body>
</html>

<?php
// menghubungkan dengan file php lainnya
require 'function.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
// melakukan query

// tombol cari di click
if (isset($_GET['cari'])) {
    $keyword = $_GET["keyword"];
    $elektronik = query("SELECT * FROM elektronik WHERE
                    photo LIKE '%$keyword%' OR
                    jenis  LIKE '%$keyword%' OR
                    tipe LIKE '%$keyword%' OR
                    merek LIKE '%$keyword%' OR
                    harga LIKE '%$keyword%'

                    ");
} else {
    $elektronik = query("SELECT * FROM elektronik");
}
?>

<html>

<head>
    <title></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 class="head">Elektronik</h1>
    <div class="kotak">
        <div class="logout">
            <a href="logout.php">Logout</a>
        </div>
        <div class="">
            <a href="tambah.php"><button class="add">Tambah Data</button></a>
        </div>
        <form action="" method="get">
            <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword" autocomplete="off">
            <button type="submit" name="cari">Cari!</button>
        </form>
        <table border="1" cellpadding="13" cellspacing="1">
            <tr>
                <th>Opsi</th>
                <th>Display Produk</th>
                <th>Jenis Elektronik</th>
                <th>Merek</th>
                <th>Tipe</th>
                <th>Harga</th>
            </tr>
            <?php if (empty($elektronik)) : ?>
                <tr>
                    <td colspan="6">
                        <h1>Data tidak ada!</h1>
                    </td>
                </tr>
            <?php else : ?>
                <?php $i = 1; ?>
                <?php foreach ($elektronik as $i) : ?>
                    <tr>
                        <td>
                            <div class="">
                                <a href="hapus.php?id=<?= $i["id"] ?>" onclick="return confirm('Hapus Data??')"><button class="delete">Hapus</button></a>
                                <a href="ubah.php?id=<?= $i["id"] ?>"><button class="change">Ubah</button></a>
                            </div>
                        </td>
                        <td><img width="100px" src="../assets/img/<?= $i["photo"]; ?>"></td>
                        <td><?= $i["jenis"]; ?></td>
                        <td><?= $i["merek"]; ?></td>
                        <td><?= $i["tipe"]; ?></td>
                        <td><?= $i["harga"]; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</body>

</html>
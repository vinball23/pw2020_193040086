<?php
// menghubungkan dengan file php lainnya
require 'php/function.php';
// melakukan query

// tombol cari di click
if (isset($_GET['cari'])) {
    $keyword = $_GET["keyword"];
    $elektronik = query("SELECT * FROM elektronik WHERE
                tipe LIKE '%$keyword%' 
                ");
} else {
    $elektronik = query("SELECT * FROM elektronik");
}
?>
<html>

<head>
    <title>Gadget.ku</title>
    <link rel="stylesheet" href="css/awal.css">
</head>

<body>
    <a href="php\login.php"><button class="admin">Go to Admin!</button></a><br>
    <form action="" method="get">
          <input type="text" name="keyword" autofocus placeholder="Masukkan Keyword" autocomplete="off">
          <button type="submit" name="cari">GO</button>
    </form>
    <?php if (empty($elektronik)) : ?>
        <tr>
            <td>
                <h1>Data tidak ada,masukkan keyword dengan benar.</h1>
            </td>
        </tr>
    <?php else : ?>
        <div class="box-wrap">
            <?php foreach ($elektronik as $i) : ?>
                <p class="box">
                    <a href="php/detail.php?id=<?= $i['id'] ?>">
                        <?= $i["tipe"] ?>
                    </a><br>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
</body>

</html>
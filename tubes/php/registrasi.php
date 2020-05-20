<?php
require 'function.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Registrasi Berhasil!');
                document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
                alert('Registrasi Gagal!');
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget.ku</title>
    <link rel="stylesheet" type="text/css" href="../css/registrasi.css">
</head>

<body>
    <form action="" method="post">
        <div id="login-box">
        <div class="left-box">
        <h1>REGISTRASI</h1>
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="register" value="Daftar">

            </div>
            <div class="right-box">
                <span class="sigin"></span>
            </div>
    </form>
    </div>
</body>

</html>
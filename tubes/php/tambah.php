<?php
require 'function.php';

session_start();
	if(!isset($_SESSION["username"])) {
		header("Location: login.php");
	exit;
}

if (isset($_POST["tambah"])) {
	if (tambah($_POST) > 0) {
		echo 	"<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php';
			</script>";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'admin.php';
			</script>";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/tambah.css">
	<title>Gadget.ku</title>
</head>

<body>
	<div class="box">
	<h3 style="margin-left : 40px;">Formulir Tambah Data</h3>
	<form action="" method="post">
		<ul style="list-style-type : none;">
			<li>
				<label for="photo"></label><br>
				<input class="boxes" type="text" name="photo" id="photo" placeholder="Picture" required><br>
			</li>
			<li>
				<label for="tipe"></label><br>
				<input class="boxes" type="text" name="tipe" id="tipe" placeholder="Tipe" required><br>
			</li>
			<li>
				<label for="jenis"></label><br>
				<select class="boxesinput" name="jenis" id="jenis" placeholder="Jenis" required><br><br>
					<option value="">-Jenis Elektronik-</option>
					<option value="Handphone">Handphone</option>
					<option value="Laptop">Laptop</option>
					<option value="Tablet">Tablet</option>
				</select>
			</li><br>
			<li>
				<label for="merek"></label><br>
				<select class="boxesinput" name="merek" id="merek" placeholder="Merek" required><br><br>
					<option value="">-Merek-</option>
					<option value="Asus">Asus</option>
					<option value="Apple">Apple</option>
					<option value="Samsung">Samsung</option>
				</select>
			</li><br>
			<li>
				<label for="harga"></label><br>
				<input class="harga" type="harga" name="harga" id="harga" placeholder="Harga" required><br>
			</li>
			<button class="tambah" type="submit" name="tambah">Tambah Data!</button>
			<button class="data" type="submit">
				<a href="../index.php" style="text-decoration: none; color : black;">Back</a>
			</button>
		</ul>
	</form>
	</div>
</body>

</html>
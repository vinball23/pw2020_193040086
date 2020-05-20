<?php
require 'function.php';
session_start();

if(!isset($_SESSION["username"])) {
	header("Location: login.php");
	exit;
}
$id = $_GET['id'];
$i = query("SELECT * FROM elektronik WHERE id = $id")[0];

if (isset($_POST["ubah"])) {
	if (ubah($_POST) > 0) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php';
			</script>";
	} else {
		echo "<script>
				alert('data gagal diubah!');
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
	<link rel="stylesheet" href="../css/ubah.css">	
	<title>Gadget.ku</title>
</head>

<body>
	<div class="box">
	<h3 style="margin-left : 40px;">Formulir Ubah Data</h3>
	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $i["id"]; ?>">
		<ul style="list-style-type : none;">
			<li>
				<label for="photo"></label><br>
				<input class="boxes" type="text" name="photo" id="photo" value="<?= $i["photo"]; ?>" required><br>
			</li>
			<li>
				<label for="tipe"></label><br>
				<input class="boxes" type="text" name="tipe" id="tipe" value="<?= $i["tipe"]; ?>" required><br>
			</li>
			<li>
				<label for="jenis"></label><br>
				<select class="boxesinput" name="jenis" id="jenis" required><br>
					<option value="<?= $i["jenis"]; ?>"><?= $i["jenis"]; ?></option>
					<option value="Handphone">Handphone</option>
					<option value="Laptop">Laptop</option>
					<option value="Tablet">Tablet</option>
				</select>
			</li><br>
			<li>
				<label for="merek"></label><br>
				<select class="boxesinput" name="merek" id="merek" required><br>
					<option value="<?= $i["merek"]; ?>"><?= $i["merek"]; ?></option>
					<option value="Asus">Asus</option>
					<option value="Apple">Apple</option>
					<option value="Samsung">Samsung</option>
				</select>
			</li><br>
			<li>
				<label for="harga"></label><br>
				<input class="harga" type="harga" name="harga" id="harga" required value="<?= $i["harga"]; ?>"><br>
			</li>
			<br>
			<button class="ubah" type="submit" name="ubah">Ubah Data!</button>
			<button class="back" type="">
				<a href="admin.php" style="text-decoration: none; color : black;">Back</a>
			</button>
		</ul>
	</form>
	</div> 
</body>

</html>
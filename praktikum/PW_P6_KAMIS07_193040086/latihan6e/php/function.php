<?php
function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "") or die("koneksi ke DB gagal");
    mysqli_select_db($conn, "tubes_193040086") or die("Database salah!");

    return $conn;
}

function query($sql)
{
    $conn = koneksi();
    $elektronik = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($elektronik)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    $conn = koneksi();

    $photo = htmlspecialchars($data["photo"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $merk = htmlspecialchars($data["merek"]);
    $type = htmlspecialchars($data["tipe"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO elektronik
                    VALUES
                    ('','$photo','$jenis','$merk','$tipe',' $harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM elektronik WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    $conn = koneksi();

    $id = $data["id"];
    $photo = htmlspecialchars($data["photo"]);
    $jenis = htmlspecialchars($data["jenis"]);
    $merek = htmlspecialchars($data["merek"]);
    $type = htmlspecialchars($data["tipe"]);
    $harga = htmlspecialchars($data["harga"]);

    $queryubah = "UPDATE elektronik
                SET
                photo = '$photo',
                jenis = '$jenis',
                merek = '$merek',
                tipe = '$tipe',
                harga = '$harga'
                WHERE id = '$id' ";

    mysqli_query($conn, $queryubah);
    return mysqli_affected_rows($conn);
}

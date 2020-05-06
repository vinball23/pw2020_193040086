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
    $type = htmlspecialchars($data["type"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO elektronik
                    VALUES
                    ('','$photo','$jenis','$merk','$type',' $harga')";

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
    $type = htmlspecialchars($data["type"]);
    $harga = htmlspecialchars($data["harga"]);

    $queryubah = "UPDATE elektronik
                SET
                photo = '$photo',
                jenis = '$jenis',
                merek = '$merek',
                type = '$type',
                harga = '$harga'
                WHERE id = '$id' ";

    mysqli_query($conn, $queryubah);
    return mysqli_affected_rows($conn);
}

function registrasi($data)
{
    $conn = koneksi();
    $username = strtolower(stripcslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);

    // cek username sudah ada belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah digunakan');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambah user baru
    $query_tambah = "INSERT INTO user VALUE('','$username','$password')";
    mysqli_query($conn, $query_tambah);

    return mysqli_affected_rows($conn);



}

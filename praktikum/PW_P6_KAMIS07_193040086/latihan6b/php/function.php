<?php 
function koneksi() {
    $conn = mysqli_connect("localhost", "root", "") or die ("koneksi ke DB gagal");
    mysqli_select_db($conn, "tubes_193040086") or die ("Database salah!");

    return $conn;
}

function query($sql){
    $conn = koneksi();
    $result = mysqli_query($conn, "$sql");

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

 function tambah($data){
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
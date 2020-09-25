<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "katalog";

// koneksi database
$conn = mysqli_connect($host, $user, $password, $db);

// query database
$result = mysqli_query($conn, "SELECT * FROM products");

if (!$result) {
    echo (mysqli_error($conn));
}

// fetching database
$datas = [];
while ($data = mysqli_fetch_assoc($result)) {
    $datas[] = $data;
}

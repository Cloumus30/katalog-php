<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "katalog";

// koneksi database
$conn = mysqli_connect($host, $user, $password, $db);

// query database
function query($queries)
{
    global $conn;
    $result = mysqli_query($conn, $queries);

    if (!$result) {
        echo (mysqli_error($conn));
    }

    // fetching database
    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

function insert($data)
{
    global $conn;

    $name = htmlspecialchars($data['productName']);
    $price = htmlspecialchars($data['price']);
    $stock = htmlspecialchars($data['stock']);
    $qty = htmlspecialchars($data['qty']);
    $descript = htmlspecialchars($data['desc']);
    $date = htmlspecialchars($data['date']);
    $image = htmlspecialchars($data['image']);

    $query = "INSERT INTO products VALUES 
    ('','$name','$descript','$price','$stock','$image','$date','$qty')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

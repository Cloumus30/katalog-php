<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "katalog";

// koneksi database
$conn = mysqli_connect($host, $user, $password, $db);

if (!isset($_REQUEST['order'])) {
    show();
} elseif ($_REQUEST['order'] === 'input') {

    insert($_REQUEST);
} elseif ($_REQUEST['order'] === 'delete') {
    delete($_REQUEST);
}

function insert($data)
{
    global $conn;

    $name = htmlspecialchars($data['productName']);
    $price = htmlspecialchars($data['price']);
    $category = htmlspecialchars($data['category']);
    $descript = htmlspecialchars($data['desc']);
    $date = htmlspecialchars($data['date']);
    $image = htmlspecialchars($data['image']);
    // $image = upload($data);
    // if (!$image) {
    //     return false;
    // }

    $query = "INSERT INTO products VALUES 
    ('','$name','$descript','$price','$image','$date','$category')
    ";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "Berhasil input";
    } else {
        echo "gagal Input";
    }
}

function delete($data)
{
    global $conn;
    $id = $data['idDelete'];
    $query = "DELETE FROM products WHERE id_product=$id";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        echo "Berhasil Hapus";
    } else {
        echo "gagal Hapus";
        echo mysqli_error($conn);
    }
}

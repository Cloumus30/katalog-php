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
    $category = htmlspecialchars($data['category']);
    $descript = htmlspecialchars($data['desc']);
    $date = htmlspecialchars($data['date']);
    $image = htmlspecialchars($data['image']);
    $image = upload($data);
    if (!$image) {
        return false;
    }

    $query = "INSERT INTO products VALUES 
    ('','$name','$descript','$price','$image','$date','$category')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function upload($data)
{
    $nameFile = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    $validExtension = ['jpg', 'jpeg', 'png'];
    $extensionFile = explode('.', $nameFile);
    $extensionFile = strtolower(end($extensionFile));

    if (!in_array($extensionFile, $validExtension)) {
        echo "<script> alert('Upload Bukan Gambar')
        </script>";
        return false;
    }

    if ($fileSize > 2000000) {
        echo "<script> alert('Ukuran Gambar terlalu besar')
        </script>";
        return false;
    }
    $newName = $data['productName'];
    $newName .= uniqid();
    $newName .=  '.';
    $newName .= $extensionFile;
    move_uploaded_file($tmpName, 'img/upload/' . $newName);
    return $newName;
}

function delete($data)
{
    global $conn;
    $id = $data['idDelete'];
    $image = 'img/upload/' . $data['image'];
    unlink("$image");
    $query = "DELETE FROM products WHERE id_product=$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data)
{
    global $conn;
    $id = htmlspecialchars($data['id']);
    $name = htmlspecialchars($data['productName']);
    $price = htmlspecialchars($data['price']);
    $category = htmlspecialchars($data['category']);
    $descript = htmlspecialchars($data['desc']);
    $date = htmlspecialchars($data['date']);
    $imageOld = htmlspecialchars($data['imageOld']);

    if ($_FILES['image']['error'] === 4) {
        $image = $imageOld;
    } else {
        $image = upload($data);
    }

    $query = "UPDATE products SET 
    name='$name', 
    price = $price, 
    category = '$category', 
    descript = '$descript', 
    date = '$date', 
    image = '$image' WHERE id_product = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


// if (isset($_REQUEST['id'])) {
//     delete($_REQUEST);
// }

<?php
require 'app.php';
$datas = query("SELECT * FROM products");


if (isset($_REQUEST["name"])) {
    $notifInsert = insert($_REQUEST);
    if ($notifInsert > 0) {
        echo "<script> alert('input berhasil')
        window.location.href='dataProductAjax.php'
        </script>";
    } else {
        echo "<script> alert('input gagal')
        window.location.href='dataProductAjax.php'
        </script>";
        die;
    }
}

if (isset($_POST["update"])) {
    $notifUpdate = update($_POST);
    if ($notifUpdate > 0) {
        echo "<script> alert('update berhasil')
        window.location.href='dataProductAjax.php'
        </script>";
    } else {
        echo "<script> alert('update gagal')</script>";
        echo mysqli_error($conn);
        die;
    }
}

if (isset($_POST["delete"])) {
    $notifDelete  = delete($_POST);
    if ($notifDelete > 0) {
        echo "<script> alert('hapus berhasil')
        window.location.href='dataProductAjax.php'
        </script>";
    } else {
        echo "<script> alert('delete gagal')
        window.location.href='dataProductAjax.php'
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Component</title>
    <link rel="stylesheet" href="css/styleMain.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/modal.css">
</head>

<body>
    <nav class="nav-container bg-primary text-light">
        <span class="arrow reverseRotate" title="Categories">&#8593</span>
        <h1>Cloudias</h1>
        <div class="menuBar" title="menu bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="ul-flex list-nostyle ">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <div class="dropdown">
                <li>dropdown &#9662</li>
                <div class="drop-content">
                    <a href="#">drop1 </a>
                    <a href="#">drop2</a>
                    <a href="#">drop3</a>
                </div>
            </div>
            <li class="modalBtn" data-modal-id="inputModal">+ Input Barang</li>
            <li><a href="">link 3</a></li>
        </ul>
    </nav>
    <div class="layout">
        <div class="sidebar">
            <h5>Categories:</h5>
            <div class="category">
                <a href="product.php">-Products</a>
            </div>
            <br>
            <h5>Admin:</h5>
            <div class="category">
                <a href="dataProductAjax.php">-Data Produk</a>
                <a href="#">-Coming soon</a>
            </div>
        </div>
        <div class="content" style="padding: 0;" id="idContent">
            <h3>DATA PRODUCTS ADMIN</h3>
            <!-- Table Data Product -->

            <table class="tableProduct">
                <thead>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>kategori</th>
                    <th>Tanggal Input</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </thead>
                <tbody id="tbodyAjax">
                    <?php foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $data["id_product"]; ?></td>
                            <td><?= $data["name"]; ?></td>
                            <td><?= number_format($data["price"], 0, '', '.'); ?></td>
                            <td><?= $data["descript"]; ?></td>
                            <td><?= $data["category"]; ?></td>
                            <td><?= $data["date"]; ?></td>
                            <td><img src="img/upload/<?= $data["image"]; ?>" alt="<?= $data["image"]; ?>"></td>
                            <td>

                                <button class="btn btn-primary modalBtn" data-modal-id="editModal<?= $data["id_product"] ?>">edit</button>
                                <!-- edit modal -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="backModal">
                                        <div class="modal" id="editModal<?= $data["id_product"] ?>">
                                            <input type="hidden" value="<?= $data["id_product"] ?>" name="id">
                                            <div class="modalImg">
                                                <img src="img/upload/<?= $data['image'] ?>" alt="<?= $data['image'] ?>">
                                                <input type="file" name="image" accept=".jpg" id="imageUpload">
                                                <input type="hidden" name="imageOld" value="<?= $data['image'] ?>">
                                            </div>
                                            <div class="modalHead">
                                                <p>Input Barang</p>
                                            </div>
                                            <div class="modalContent">
                                                <table class="tableForm">
                                                    <tr>
                                                        <td>
                                                            <label for="productName">Nama Barang</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="productName" value="<?= $data["name"]; ?>" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="price">Harga Barang</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="price" value="<?= $data["price"]; ?>" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="category">Kategori</label>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="category" value="<?= $data["category"]; ?>" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="desc">Deskripsi Barang</label>
                                                        </td>
                                                        <td>
                                                            <textarea name="desc" cols="30" rows="10"><?= $data["descript"]; ?></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="date">Tanggal Input</label>
                                                        </td>
                                                        <td>
                                                            <input type="date" name="date" value="<?= $data["date"]; ?>" required>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="modalFooter">
                                                <button type="submit" name="update" class="submitBtn">Inputken</button>
                                                <button type="reset" class="closeModal" data-modal-close="modal1">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- edit modal -->
                                <!-- <form action="" method="POST"> -->
                                <input type="hidden" class="idDelete" value="<?= $data["id_product"] ?>" name="idDelete">
                                <input type="hidden" class="imageDelete" value="<?= $data["image"] ?>" name="image">
                                <button class="btn btn-danger deleteBtn" name="delete" type="submit">delete</button>
                                <!-- </form> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Table Data Product end -->

            <!-- Input Modal -->
            <form action="inputAjax.php" method="post" enctype="multipart/form-data">
                <div class="backModal">
                    <div class="modal" id="inputModal">
                        <div class="modalImg">
                            <!-- <img src="img/IMG-20200907-WA0022.jpg" alt="image"> -->
                            <label for="imageUpload">Upload Image</label>
                            <input type="file" name="image" accept=".jpg" id="imageUpload" required>
                        </div>
                        <div class="modalHead">
                            <p>Input Barang</p>
                        </div>
                        <div class="modalContent">
                            <table class="tableForm">
                                <tr>
                                    <td>
                                        <label for="productName">Nama Barang</label>
                                    </td>
                                    <td>
                                        <input type="text" id="productName" name="productName" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="price">Harga Barang</label>
                                    </td>
                                    <td>
                                        <input type="text" name="price" id="price" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="category">Kategori</label>
                                    </td>
                                    <td>
                                        <input type="text" name="category" id="category" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="desc">Deskripsi Barang</label>
                                    </td>
                                    <td>
                                        <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="date">Tanggal Input</label>
                                    </td>
                                    <td>
                                        <input type="date" id="date" name="date" required>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modalFooter">
                            <button type="submit" name="submit" id="submitInput" class="submitBtn">Inputken</button>
                            <button type="reset" class="closeModal" data-modal-close="modal1">Close</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Input Modal End -->
        </div>
    </div>

    <script src="js/scriptMain.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>
<?php
require 'app.php';
$datas = query("SELECT * FROM products");

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
                <a href="#">-Gamis</a>
                <a href="#">-Setelan Atasan</a>
                <a href="#">-Jilbab</a>
            </div>
            <br>
            <h5>Admin:</h5>
            <div class="category">
                <a href="#">-Data Produk</a>
                <a href="#">-Coming soon</a>
            </div>
        </div>
        <div class="content">
            <h3>DATA PRODUCTS ADMIN</h3>
            <!-- Table Data Product -->

            <table class="tableProduct">
                <thead>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Qty</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Input</th>
                    <th>Gambar</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php foreach ($datas as $data) : ?>
                        <tr>
                            <td><?= $data["id_product"]; ?></td>
                            <td><?= $data["name"]; ?></td>
                            <td><?= number_format($data["price"], 0, '', '.'); ?></td>
                            <td><?= number_format($data["stock"], 0, '', '.'); ?></td>
                            <td><?= $data["qty"]; ?></td>
                            <td><?= $data["descript"]; ?></td>
                            <td><?= $data["date"]; ?></td>
                            <td><img src="img/<?= $data["image"]; ?>" alt="<?= $data["image"]; ?>"></td>
                            <td>
                                <button class="btn btn-primary">edit</button>
                                <button class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- Table Data Product end -->

            <!-- Input Modal -->
            <form action="" method="post">
                <div class="backModal">
                    <div class="modal" id="inputModal">
                        <div class="modalImg">
                            <!-- <img src="img/IMG-20200907-WA0022.jpg" alt="image"> -->
                            <label for="imageUpload">Upload Image</label>
                            <input type="file" name="image" accept=".jpg" id="imageUpload">
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
                                        <input type="text" id="productName" name="productName">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="price">Harga Barang</label>
                                    </td>
                                    <td>
                                        <input type="text" name="price" id="price">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="stock">Stock</label>
                                    </td>
                                    <td>
                                        <input type="number" name="stock" id="stock">
                                    </td>
                                    <td>
                                        <select name="qty" id="qty">
                                            <option value="">pcs</option>
                                            <option value="">pack</option>
                                        </select>
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
                                        <input type="date" id="date" name="date">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="modalFooter">
                            <button type="submit" name="submit" class="submitBtn">Inputken</button>
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
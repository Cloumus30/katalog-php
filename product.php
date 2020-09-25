<?php
require 'app.php';

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
            <li><a href="#" class="modalBtn" data-modal-id="inputModal">+ Input Barang</a></li>
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
        </div>
        <div class="content">
            <h3>PRODUCTS</h3>

            <!-- cards -->
            <?php foreach ($datas as $product) : ?>
                <div class="cards">
                    <div class="cards-img">
                        <img src="img/<?= $product['image'] ?>" alt="<?= $product['image'] ?>">
                    </div>
                    <p class="title">
                        <?= $product['name'] ?>
                    </p>
                    <p class="priceCard">Harga:Rp <?= number_format($product['price'], 0, "", ".") ?>
                    </p>
                    <p class="stock">Stock: <?= $product['stock'] ?></p>

                    <div class="button">
                        <button class="modalBtn" data-modal-id="<?= $product['id_product'] ?>">Lihat</button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="backModal">
                    <div class="modal" id="<?= $product['id_product'] ?>">
                        <div class="modalImg">
                            <img src="img/<?= $product['image'] ?>" alt="image">
                        </div>

                        <div class="modalHead">
                            <p><?= $product['name'] ?></p>
                            <!-- <button class="closeModal crossClose">X</button> -->
                        </div>
                        <div class="modalContent">
                            <p class="modalDesc">Deskripsi: <?= $product['descript'] ?></p>
                        </div>
                        <div class="modalFooter">
                            <!-- <button class="buyModal">buy</button> -->
                            <p><span class="priceModal bg-success"> Harga: Rp <?= number_format($product['price'], 0, "", ".");  ?></span>
                                <span class="stockModal"> Stock: <?= $product['stock'] ?></span>
                            </p>
                            <button class="closeModal" data-modal-close="modal1">Close</button>
                        </div>
                    </div>
                </div>
                <!-- Modal End -->

            <?php endforeach; ?>
            <!-- cards end -->


            <!-- Input Modal -->
            <form action="">
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
                            </table>
                        </div>
                        <div class="modalFooter">
                            <button type="submit" class="submitBtn">Inputken</button>
                            <button type="reset" class="closeModal" data-modal-close="modal1">Close</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Input Modal End -->

            <!-- <div class="cards">
                <div class="cards-img">
                    <img src="img/IMG-20200907-WA0022.jpg" alt="Gambar Produk">
                </div>
                <p class="title">
                    Jarum Pentul
                </p>
                <p class="price">Harga: 25.000</p>
                <p class="stock">Stock: 20</p>

                <div class="button">
                    <button><a href="#">Lihat</a></button>
                </div>
            </div>
            <div class="cards">
                <div class="cards-img">
                    <img src="img/IMG-20200907-WA0022.jpg" alt="Gambar Produk">
                </div>
                <p class="title">
                    Jarum Pentul
                </p>
                <p class="price">Harga: 25.000</p>
                <p class="stock">Stock: 20</p>

                <div class="button">
                    <button><a href="#">Lihat</a></button>
                </div>
            </div>
            <div class="cards">
                <div class="cards-img">
                    <img src="img/IMG-20200907-WA0022.jpg" alt="Gambar Produk">
                </div>
                <p class="title">
                    Jarum Pentul
                </p>
                <p class="price">Harga: 25.000</p>
                <p class="stock">Stock: 20</p>

                <div class="button">
                    <button><a href="#">Lihat</a></button>
                </div>
            </div>
            <div class="cards">
                <div class="cards-img">
                    <img src="img/IMG-20200907-WA0022.jpg" alt="Gambar Produk">
                </div>
                <p class="title">
                    Jarum Pentul
                </p>
                <p class="price">Harga: 25.000</p>
                <p class="stock">Stock: 20</p>

                <div class="button">
                    <button><a href="#">Lihat</a></button>
                </div>
            </div> -->
        </div>
    </div>

    <script src="js/scriptMain.js"></script>
    <script src="js/modal.js"></script>
</body>

</html>
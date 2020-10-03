<?php
require '../app.php';
$datas = query("SELECT * FROM products");

if (isset($_REQUEST["delete"])) {
    $notifDelete  = delete($_REQUEST);
    if ($notifDelete > 0) {
        echo "<script> alert('hapus berhasil')
        window.location.href='dataProduct.php'
        </script>";
    } else {
        echo "<script> alert('delete gagal')
        window.location.href='dataProduct.php'
        </script>";
    }
}
?>

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
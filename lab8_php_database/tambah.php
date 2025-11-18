<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    // upload file
    $gambar = "";
    if ($_FILES['file_gambar']['error'] == 0) {
        $filename = time() . "_" . str_replace(" ", "_", $_FILES['file_gambar']['name']);
        $path = "gambar/" . $filename;

        move_uploaded_file($_FILES['file_gambar']['tmp_name'], $path);
        $gambar = $path;
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('$nama', '$kategori', '$harga_jual', '$harga_beli', '$stok', '$gambar')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h1>Tambah Barang</h1>

<form method="POST" enctype="multipart/form-data">
    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Kategori</label>
    <select name="kategori">
        <option value="Komputer">Komputer</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Hand Phone">Hand Phone</option>
    </select>

    <label>Harga Jual</label>
    <input type="number" name="harga_jual" required>

    <label>Harga Beli</label>
    <input type="number" name="harga_beli" required>

    <label>Stok</label>
    <input type="number" name="stok" required>

    <label>Gambar</label>
    <input type="file" name="file_gambar">

    <button type="submit" name="submit">Simpan</button>
</form>

</div>
</body>
</html>

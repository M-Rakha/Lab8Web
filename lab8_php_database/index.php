<?php
include("koneksi.php");

$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Data Barang</h1>

<a class="btn" href="tambah.php">+ Tambah Data</a>

<table border="1">
<tr>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga Beli</th>
    <th>Harga Jual</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) : ?>
<tr>
    <td><img src="<?= $row['gambar']; ?>" width="80"></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['kategori']; ?></td>
    <td><?= $row['harga_beli']; ?></td>
    <td><?= $row['harga_jual']; ?></td>
    <td><?= $row['stok']; ?></td>
    <td>
        <a href="ubah.php?id=<?= $row['id_barang']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id_barang']; ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php endwhile; ?>

</table>
</div>
</body>
</html>

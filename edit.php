<?php 
include 'koneksi.php';

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data barang berdasarkan ID tersebut
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id_barang = '$id'");
$row  = mysqli_fetch_array($data);

// 3. Proses Update data saat tombol simpan ditekan
if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $rak  = $_POST['rak'];

    $query = "UPDATE barang SET 
              nama_barang = '$nama', 
              stok = '$stok', 
              lokasi_rak = '$rak' 
              WHERE id_barang = '$id'";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "Gagal mengupdate: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
</head>
<body>
    <h2>Edit Data Barang</h2>
    <a href="index.php">Kembali</a>
    <br><br>

    <form method="POST">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama" value="<?= $row['nama_barang']; ?>" required><br><br>

        <label>Jumlah Stok:</label><br>
        <input type="number" name="stok" value="<?= $row['stok']; ?>" required><br><br>

        <label>Lokasi Rak:</label><br>
        <input type="text" name="rak" value="<?= $row['lokasi_rak']; ?>"><br><br>

        <button type="submit" name="update">Update Data</button>
    </form>
</body>
</html>

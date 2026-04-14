<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Barang</title></head>
<body>
    <h2>Input Barang Baru</h2>
    <form method="POST">
        <input type="text" name="nama" placeholder="Nama Barang" required><br>
        <input type="number" name="stok" placeholder="Jumlah Stok" required><br>
        <input type="text" name="rak" placeholder="Lokasi Rak"><br>
        <button type="submit" name="submit">Simpan ke Gudang</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        $stok = $_POST['stok'];
        $rak  = $_POST['rak'];

        $query = "INSERT INTO barang (nama_barang, stok, lokasi_rak) VALUES ('$nama', '$stok', '$rak')";
        if(mysqli_query($conn, $query)){
            echo "<script>alert('Data Berhasil Disimpan!'); window.location='index.php';</script>";
        }
    }
    ?>
</body>
</html>
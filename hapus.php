<?php
include 'koneksi.php';

// Mengambil ID dari URL
$id = $_GET['id'];

// Query untuk menghapus data berdasarkan id_barang
$query = "DELETE FROM barang WHERE id_barang = '$id'";

if (mysqli_query($conn, $query)) {
    // Jika berhasil, munculkan alert dan pindah ke halaman index
    echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location='index.php';
          </script>";
} else {
    // Jika gagal, tampilkan pesan error
    echo "Gagal menghapus data: " . mysqli_error($conn);
}
?>
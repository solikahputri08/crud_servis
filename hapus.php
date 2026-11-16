<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $hapus = mysqli_query($koneksi, "DELETE FROM servis WHERE id = '$id'");

    if ($hapus) {
        header("Location: index.php?pesan=Data servis berhasil dihapus");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    echo "ID servis tidak ditemukan!";
}
?>
<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $no_nota         = $_POST['no_nota'] ?? '';
    $nama_pelanggan  = $_POST['nama_pelanggan'] ?? '';
    $biaya           = $_POST['biaya'] ?? 0;
    $keluhan         = $_POST['keluhan'] ?? '';
    $status_servis   = $_POST['status_servis'] ?? '';
    $jenis_perangkat = $_POST['jenis_perangkat'] ?? '';

    $sql = "INSERT INTO servis (no_nota, nama_pelanggan, biaya, keluhan, status_servis, jenis_perangkat) 
            VALUES ('$no_nota', '$nama_pelanggan', '$biaya', '$keluhan', '$status_servis', '$jenis_perangkat')";
    
    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
        exit;
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Servis Komputer</title>
</head>
<body>
    <h2>Tambah Data Servis Komputer</h2>
    <form method="POST" action="">
        <label>No Nota:</label><br>
        <input type="text" name="no_nota" required><br><br>

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>

        <label>Biaya:</label><br>
        <input type="number" name="biaya" required><br><br>

        <label>Keluhan:</label><br>
        <textarea name="keluhan" required></textarea><br><br>

        <label>Status_Servis:</label><br>
        <input type="radio" name="status_servis" value="Proses" required> Proses
        <input type="radio" name="jenis_perangkat" value="Selesai"> Selesai<br><br>

        <label>Jenis_Perangkat:</label><br>
        <select name="jenis_perangkat" required>
            <option value="Laptop">Laptop</option>
            <option value="Pc Desktop">Pc Desktop</option>
            <option value="Printer">Printer</option>
            <option value="Proyektor">Proyektor</option>
            <option value="Jaringan">Jaringan</option>
        </select><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

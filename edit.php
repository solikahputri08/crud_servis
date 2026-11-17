<?php
include "koneksi.php";

$id     = $_GET['id'];
$ambil  = mysqli_query($koneksi, "SELECT * FROM servis WHERE id = '$id'");
$data   = mysqli_fetch_assoc($ambil);

if (isset($_POST['update'])) {
    $no_nota         = $_POST['no_nota'];
    $nama_pelanggan  = $_POST['nama_pelanggan'];
    $biaya           = $_POST['biaya'];
    $keluhan         = $_POST['keluhan'];
    $status_servis   = $_POST['status_servis'];
    $jenis_perangkat = $_POST['jenis_perangkat'];

    $sql = "UPDATE servis SET 
            no_nota = '$no_nota',
            nama_pelanggan = '$nama_pelanggan',
            biaya = '$biaya',
            keluhan = '$keluhan',
            status_servis = '$status_servis',
            jenis_perangkat = '$jenis_perangkat'
            WHERE id = '$id'";
    $ubah = mysqli_query($koneksi, $sql);

    if ($ubah) {
        header("Location: index.php?pesan=Data berhasil diubah");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Servis Komputer</title>
</head>
<body>
    <h2>Edit Data Servis Komputer</h2>
    <form method="POST" action="">
        <label>No Nota:</label><br>
        <input type="text" name="no_nota" value="<?php echo $data['no_nota']; ?>"><br><br>

        <label>Nama Pelanggan:</label><br>
        <input type="text" name="nama_pelanggan" value="<?php echo $data['nama_pelanggan']; ?>"><br><br>

        <label>Biaya:</label><br>
        <input type="number" name="biaya" value="<?php echo $data['biaya']; ?>"><br><br>

        <label>Keluhan:</label><br>
        <textarea name="keluhan"><?php echo $data['keluhan']; ?></textarea><br><br>

        <label>Status Servis:</label><br>
         <input type="radio" name="status_servis" value="Proses" <?php if ($data['status_servis'] == 'Proses') echo 'checked'; ?>> Proses
        <input type="radio" name="status_servis" value="Selesai" <?php if ($data['status_servis'] == 'Selesai') echo 'checked'; ?>> Selesai<br><br>
        
        <label>Jenis Perangkat:</label><br>
         <select name="jenis_perangkat">
            <option value="Laptop" <?php if ($data['jenis_perangkat'] == 'Laptop') echo 'selected'; ?>>Laptop</option>
            <option value="Pc Desktop" <?php if ($data['status_servis'] == 'Pc Desktop') echo 'selected'; ?>>Pc Desktop</option>
            <option value="Printer" <?php if ($data['status_servis'] == 'Printer') echo 'selected'; ?>>Printer</option>
            <option value="Proyektor" <?php if ($data['status_servis'] == 'Proyektor') echo 'selected'; ?>>Proyektor</option>
            <option value="Jaringan" <?php if ($data['status_servis'] == 'Jaringan') echo 'selected'; ?>>Jaringan</option>
        </select><br><br>

        <button type="submit" name="update">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
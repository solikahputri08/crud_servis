<?php
include "koneksi.php";

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

if ($cari != '') {
    $keyword = mysqli_real_escape_string($koneksi, $cari);
    $query = mysqli_query($koneksi, "SELECT * FROM servis WHERE nama_pelanggan LIKE '%$keyword%'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM servis");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Servis Komputer</title>
</head>
<body>

    <h2>Daftar Servis Komputer</h2>

    <a href="tambah.php">+ Tambah Servis</a>
    <br><br>

    <form method="GET" action="">
        <input type="text" name="cari" placeholder="Cari nama pelanggan..."
        value="<?php echo htmlspecialchars($cari); ?>">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>

    <br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status: <?php echo htmlspecialchars($_GET['pesan']); ?></b></p>
    <?php } ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>No_Nota</th>
            <th>Nama Pelanggan</th>
            <th>Biaya</th>
            <th>Keluhan</th>
            <th>Status_Servis</th>
            <th>Jenis_Perangkat</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['no_nota']; ?></td>
            <td><?php echo $data['nama_pelanggan']; ?></td>
            <td><?php echo $data['biaya']; ?></td>
            <td><?php echo $data['keluhan']; ?></td>
            <td><?php echo $data['status_servis']; ?></td>
            <td><?php echo $data['jenis_perangkat']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</body>
</html>
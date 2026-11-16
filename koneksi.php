<?php
$koneksi = mysqli_connect("localhost", "root", "", "servis_komputer");

if (!$koneksi) {
    die("Koneksi database gagal: " .mysqli_connect_error());
}
?>
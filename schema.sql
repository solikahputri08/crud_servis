CREATE DATABASE servis_komputer;

USE servis_komputer;

CREATE TABLE servis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    no_nota VARCHAR(20),
    nama_pelanggan VARCHAR(100),
    biaya INT,
    keluhan TEXT,
    status_servis ENUM('Proses', 'Selesai'),
    jenis_perangkat VARCHAR(30)
);

INSERT INTO servis(no_nota, nama_pelanggan, biaya, keluhan, status_servis, jenis_perangkat)VALUES
('22','gio','990.000','jelek jaringannya','selesai','jaringan')
('jia','zia','2.000.000','kerusakan di kamera','proses','laptop')
('55','kaesang','690.000','lemot','selesai','pc desktop')
('dian','1.800.000','printernya gampang panas','proses','printer')
-- Import melalui phpMyAdmin. Tidak menghapus database atau tabel yang telah ada.
CREATE DATABASE IF NOT EXISTS stusikasus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE stusikasus;
CREATE TABLE IF NOT EXISTS cctv (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    no INT UNSIGNED NULL,
    provinsi VARCHAR(100) NOT NULL DEFAULT '',
    kab_kota VARCHAR(100) NOT NULL DEFAULT '',
    kecamatan VARCHAR(100) NOT NULL DEFAULT '',
    kelurahan VARCHAR(100) NOT NULL DEFAULT '',
    nama_cctv VARCHAR(255) NOT NULL,
    status VARCHAR(100) NOT NULL DEFAULT '',
    alamat TEXT NOT NULL,
    longitude DECIMAL(10,7) NULL,
    latitude DECIMAL(10,7) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Data sumber tidak dimasukkan otomatis. Isi dari atribut geoportal yang telah diperiksa.

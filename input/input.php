<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.html");
    exit;
}
$nama_cctv = trim($_POST['nama_cctv'] ?? '');
if ($nama_cctv === '') { exit("Nama CCTV wajib diisi."); }
$no_raw = trim($_POST['no'] ?? '');
$no = $no_raw === '' ? null : filter_var($no_raw, FILTER_VALIDATE_INT);
if ($no_raw !== '' && ($no === false || $no < 1)) { exit("Nomor sumber tidak valid."); }
$longitude_raw = trim($_POST['longitude'] ?? '');
$latitude_raw = trim($_POST['latitude'] ?? '');
if (($longitude_raw === '') !== ($latitude_raw === '')) { exit("Koordinat harus diisi berpasangan."); }
$longitude = $longitude_raw === '' ? null : filter_var($longitude_raw, FILTER_VALIDATE_FLOAT);
$latitude = $latitude_raw === '' ? null : filter_var($latitude_raw, FILTER_VALIDATE_FLOAT);
if ($longitude === false || ($longitude !== null && ($longitude < -180 || $longitude > 180))) { exit("Longitude tidak valid."); }
if ($latitude === false || ($latitude !== null && ($latitude < -90 || $latitude > 90))) { exit("Latitude tidak valid."); }
$provinsi = trim($_POST['provinsi'] ?? '');
$kab_kota = trim($_POST['kab_kota'] ?? '');
$kecamatan = trim($_POST['kecamatan'] ?? '');
$kelurahan = trim($_POST['kelurahan'] ?? '');
$status = trim($_POST['status'] ?? '');
$alamat = trim($_POST['alamat'] ?? '');
// Sesuaikan dengan setting MySQL pada komputer Anda
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stusikasus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
$provinsi = $conn->real_escape_string($provinsi);
$kab_kota = $conn->real_escape_string($kab_kota);
$kecamatan = $conn->real_escape_string($kecamatan);
$kelurahan = $conn->real_escape_string($kelurahan);
$nama_cctv = $conn->real_escape_string($nama_cctv);
$status = $conn->real_escape_string($status);
$alamat = $conn->real_escape_string($alamat);
$no_sql = $no === null ? "NULL" : (string) $no;
$longitude_sql = $longitude === null ? "NULL" : (string) $longitude;
$latitude_sql = $latitude === null ? "NULL" : (string) $latitude;
$sql = "INSERT INTO cctv (no, provinsi, kab_kota, kecamatan, kelurahan, nama_cctv, status, alamat, longitude, latitude)
        VALUES ($no_sql, '$provinsi', '$kab_kota', '$kecamatan', '$kelurahan', '$nama_cctv', '$status', '$alamat', $longitude_sql, $latitude_sql)";
if ($conn->query($sql) !== TRUE) {
    die("Error: " . $conn->error);
}
$conn->close();
header("Location: ../index.php");
exit;

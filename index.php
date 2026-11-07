<?php
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
$sql = "SELECT * FROM cctv";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Data Titik CCTV Kota Samarinda</title></head>
<body>
<h2>Data Titik CCTV Kota Samarinda</h2>
<p><a href="input/index.html">Input Data</a></p>
<?php
if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>";
    echo "<th>Nomor Sumber</th>";
    echo "<th>Provinsi</th>";
    echo "<th>Kabupaten/Kota</th>";
    echo "<th>Kecamatan</th>";
    echo "<th>Kelurahan</th>";
    echo "<th>Nama CCTV</th>";
    echo "<th>Status</th>";
    echo "<th>Alamat</th>";
    echo "<th>Longitude</th>";
    echo "<th>Latitude</th>";
    echo "<th colspan='2'>Aksi</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars((string) ($row["no"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["provinsi"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["kab_kota"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["kecamatan"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["kelurahan"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["nama_cctv"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["status"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["alamat"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["longitude"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td>" . htmlspecialchars((string) ($row["latitude"] ?? ""), ENT_QUOTES, "UTF-8") . "</td>";
        echo "<td><a href='delete.php?id=" . (int) $row["id"] . "'>hapus</a></td>";
        echo "<td><a href='edit/index.php?id=" . (int) $row["id"] . "'>edit</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Data belum tersedia. Klik Input Data untuk menambahkan data geoportal.";
}
$conn->close();
?>
<p>Sumber: <a href="https://geoportal.samarindakota.go.id/satu-peta">Geoportal Kota Samarinda</a>, layer Titik CCTV Kota Samarinda.</p>
</body>
</html>

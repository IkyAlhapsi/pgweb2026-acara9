<?php
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if ($id === false || $id === null || $id < 1) { exit("ID data tidak valid."); }
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
$sql = "SELECT * FROM cctv WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows === 0) { exit("Data tidak ditemukan."); }
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Form Edit CCTV</title></head>
<body>
<h2>Form Edit Data CCTV</h2>
<?php
echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
while ($row = $result->fetch_assoc()) {
    echo "<input type='hidden' name='id' value='" . (int) $row['id'] . "'>";
    echo "<label for='no'>Nomor Sumber:</label><br>";
    echo "<input type='text' id='no' name='no' value='" . htmlspecialchars((string) ($row['no'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='provinsi'>Provinsi:</label><br>";
    echo "<input type='text' id='provinsi' name='provinsi' value='" . htmlspecialchars((string) ($row['provinsi'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='kab_kota'>Kabupaten/Kota:</label><br>";
    echo "<input type='text' id='kab_kota' name='kab_kota' value='" . htmlspecialchars((string) ($row['kab_kota'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='kecamatan'>Kecamatan:</label><br>";
    echo "<input type='text' id='kecamatan' name='kecamatan' value='" . htmlspecialchars((string) ($row['kecamatan'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='kelurahan'>Kelurahan:</label><br>";
    echo "<input type='text' id='kelurahan' name='kelurahan' value='" . htmlspecialchars((string) ($row['kelurahan'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='nama_cctv'>Nama CCTV:</label><br>";
    echo "<input type='text' id='nama_cctv' name='nama_cctv' value='" . htmlspecialchars((string) ($row['nama_cctv'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='status'>Status:</label><br>";
    echo "<input type='text' id='status' name='status' value='" . htmlspecialchars((string) ($row['status'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='alamat'>Alamat:</label><br>";
    echo "<input type='text' id='alamat' name='alamat' value='" . htmlspecialchars((string) ($row['alamat'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='longitude'>Longitude:</label><br>";
    echo "<input type='text' id='longitude' name='longitude' value='" . htmlspecialchars((string) ($row['longitude'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
    echo "<label for='latitude'>Latitude:</label><br>";
    echo "<input type='text' id='latitude' name='latitude' value='" . htmlspecialchars((string) ($row['latitude'] ?? ''), ENT_QUOTES, "UTF-8") . "'><br>";
}
echo "<br><input type='submit' value='Submit'>";
echo "</form>";
$conn->close();
?>
<p id="informasi" style="color: red;"></p>
<script>
function validateForm() {
    let text = "";
    const nama = document.getElementById("nama_cctv").value.trim();
    const no = document.getElementById("no").value.trim();
    const longitude = document.getElementById("longitude").value.trim();
    const latitude = document.getElementById("latitude").value.trim();
    if (nama === "") {
        text = "Nama CCTV wajib diisi.";
    } else if (no !== "" && (!Number.isInteger(Number(no)) || Number(no) < 1)) {
        text = "Nomor sumber harus berupa bilangan bulat positif.";
    } else if ((longitude === "") !== (latitude === "")) {
        text = "Isi longitude dan latitude secara berpasangan, atau kosongkan keduanya jika belum diketahui.";
    } else if (longitude !== "" && (!Number.isFinite(Number(longitude)) || Number(longitude) < -180 || Number(longitude) > 180)) {
        text = "Longitude harus berupa angka antara -180 dan 180.";
    } else if (latitude !== "" && (!Number.isFinite(Number(latitude)) || Number(latitude) < -90 || Number(latitude) > 90)) {
        text = "Latitude harus berupa angka antara -90 dan 90.";
    }
    document.getElementById("informasi").textContent = text;
    return text === "";
}
</script>
<p><a href="../index.php">Kembali ke Data CCTV</a></p>
</body>
</html>

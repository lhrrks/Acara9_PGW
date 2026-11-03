<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pgw*"; // Sesuaikan dengan nama database kamu

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM hidran_kering";
$result = $conn->query($sql);

echo "<h2>Data Sebaran Hidran Kering</h2>";

// Hyperlink teks biasa untuk tambah data:
echo "<p><a href='input/index.html'>Input</a></p>";

echo "<table border='1px' cellpadding='8' cellspacing='0'><tr>
<th>ID</th>
<th>OGC FID</th>
<th>No</th>
<th>Nama Kode</th>
<th>Alamat</th>
<th>Status</th>
<th>Longitude</th>
<th>Latitude</th>
<th colspan='2'>Aksi</th></tr>";

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>".
        "<td>".$row["id"]."</td>".
        "<td>".$row["ogc_fid"]."</td>".
        "<td>".$row["no"]."</td>".
        "<td>".$row["nama_kode"]."</td>".
        "<td>".$row["alamat"]."</td>".
        "<td>".$row["status"]."</td>".
        "<td>".$row["longitude"]."</td>".
        "<td>".$row["latitude"]."</td>".
        "<td><a href='delete.php?id=".$row["id"]."'>hapus</a></td>".
        "<td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>".
        "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>Tidak ada data.</td></tr>";
}
echo "</table>";

$conn->close();
?>
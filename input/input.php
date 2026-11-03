<?php
$ogc_fid    = $_POST['ogc_fid'];
$no         = $_POST['no'];
$nama_kode  = $_POST['nama_kode'];
$alamat     = $_POST['alamat'];
$status     = $_POST['status'];
$longitude  = $_POST['longitude'];
$latitude   = $_POST['latitude'];

// Sesuaikan koneksi database MySQL kamu
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "pgw*";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query INSERT data baru ke tabel hidran_kering
$sql = "INSERT INTO hidran_kering (ogc_fid, no, nama_kode, alamat, status, longitude, latitude) 
        VALUES ($ogc_fid, $no, '$nama_kode', '$alamat', '$status', $longitude, $latitude)";

if ($conn->query($sql) === TRUE) {
    echo "Data baru berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

// Kembali ke halaman utama (index.php di folder luar)
header("Location: ../index.php");
exit();
?>
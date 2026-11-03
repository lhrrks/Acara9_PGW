<?php
$id = $_POST['id'];
$ogc_fid = $_POST['ogc_fid'];
$no = $_POST['no'];
$nama_kode = $_POST['nama_kode'];
$alamat = $_POST['alamat'];
$status = $_POST['status'];
$longitude = $_POST['longitude'];
$latitude = $_POST['latitude'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgw*";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query UPDATE untuk tabel hidran_kering
$sql = "UPDATE hidran_kering SET 
        ogc_fid=$ogc_fid, 
        no=$no, 
        nama_kode='$nama_kode', 
        alamat='$alamat', 
        status='$status', 
        longitude=$longitude, 
        latitude=$latitude 
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: ../index.php");
exit();
?>
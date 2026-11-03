<!DOCTYPE html>
<html>
<body>
<h2>Form Edit Data Hidran Kering</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pgw*";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM hidran_kering WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'><br>";
        
        echo "<label for='ogc_fid'>OGC FID: </label><br>";
        echo "<input type='text' id='ogc_fid' name='ogc_fid' value='".$row['ogc_fid']."'><br>";
        
        echo "<label for='no'>No: </label><br>";
        echo "<input type='text' id='no' name='no' value='".$row['no']."'><br>";
        
        echo "<label for='nama_kode'>Nama Kode: </label><br>";
        echo "<input type='text' id='nama_kode' name='nama_kode' value='".$row['nama_kode']."'><br>";
        
        echo "<label for='alamat'>Alamat: </label><br>";
        echo "<input type='text' id='alamat' name='alamat' value='".$row['alamat']."'><br>";
        
        echo "<label for='status'>Status: </label><br>";
        echo "<input type='text' id='status' name='status' value='".$row['status']."'><br>";
        
        echo "<label for='long'>Longitude: </label><br>";
        echo "<input type='text' id='long' name='longitude' value='".$row['longitude']."'><br>";
        
        echo "<label for='lat'>Latitude: </label><br>";
        echo "<input type='text' id='lat' name='latitude' value='".$row['latitude']."'><br><br>";
        
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    }
}
$conn->close();
?>
<p id="informasi"></p>

<script>
function validateForm() {
    let long = document.getElementById("long").value;
    let lat = document.getElementById("lat").value;
    let text = "";
    
    // Contoh validasi angka koordinat
    if (isNaN(long) || isNaN(lat)) {
        text = "Koordinat (Longitude & Latitude) harus berupa angka!";
        document.getElementById("informasi").innerHTML = text;
        return false;
    }
    return true;
}
</script>
</body>
</html>
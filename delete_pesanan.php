<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "db_umkm_pariwisata"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID dari URL
$id_pesanan = $_GET['id'];

// Menghapus data dari database
$sql = "DELETE FROM pesanan WHERE id_pesanan = $id_pesanan";

if ($conn->query($sql) === TRUE) {
    header("Location: daftar_pesanan.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

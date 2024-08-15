<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "db_umkm_pariwisata"; // Sesuaikan dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validasi input
    $nama_pemesan = isset($_POST['nama_pemesan']) ? trim($_POST['nama_pemesan']) : '';
    $nomor_hp = isset($_POST['nomor_hp']) ? trim($_POST['nomor_hp']) : '';
    $tanggal_mulai_wisata = isset($_POST['tanggal_mulai_wisata']) ? trim($_POST['tanggal_mulai_wisata']) : '';
    $durasi_wisata = isset($_POST['durasi_wisata']) ? (int)$_POST['durasi_wisata'] : 0;
    $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
    $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
    $layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;
    $jumlah_peserta = isset($_POST['jumlah_peserta']) ? (int)$_POST['jumlah_peserta'] : 1;
    $harga_paket = isset($_POST['subtotal']) ? (float)$_POST['subtotal'] : 0.0;
    $jumlah_tagihan = isset($_POST['total']) ? (float)$_POST['total'] : 0.0;

    // Persiapan query dengan prepared statement
    $stmt = $conn->prepare("INSERT INTO pesanan (nama_pemesan, nomor_hp, tanggal_mulai_wisata, durasi_wisata, layanan_penginapan, layanan_transportasi, layanan_makanan, jumlah_peserta, harga_paket, jumlah_tagihan)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameter ke statement
    $stmt->bind_param("sssiiiiidd", $nama_pemesan, $nomor_hp, $tanggal_mulai_wisata, $durasi_wisata, $layanan_penginapan, $layanan_transportasi, $layanan_makanan, $jumlah_peserta, $harga_paket, $jumlah_tagihan);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Alihkan ke halaman terima kasih
        header('Location: terima_kasih.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

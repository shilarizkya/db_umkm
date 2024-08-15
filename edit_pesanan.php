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

// Mendapatkan data dari URL
$id_pesanan = $_GET['id'];

// Mengambil data pesanan berdasarkan ID
$sql = "SELECT * FROM pesanan WHERE id_pesanan = $id_pesanan";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_pemesan = $_POST['nama_pemesan'];
    $nomor_hp = $_POST['nomor_hp'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $durasi_wisata = $_POST['durasi_wisata'];
    $layanan_penginapan = isset($_POST['layanan_penginapan']) ? 1 : 0;
    $layanan_transportasi = isset($_POST['layanan_transportasi']) ? 1 : 0;
    $layanan_makanan = isset($_POST['layanan_makanan']) ? 1 : 0;
    $harga_paket = $_POST['harga_paket'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    $sql_update = "UPDATE pesanan SET nama_pemesan='$nama_pemesan', nomor_hp='$nomor_hp', jumlah_peserta=$jumlah_peserta, durasi_wisata=$durasi_wisata, layanan_penginapan=$layanan_penginapan, layanan_transportasi=$layanan_transportasi, layanan_makanan=$layanan_makanan, harga_paket=$harga_paket, jumlah_tagihan=$jumlah_tagihan WHERE id_pesanan=$id_pesanan";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: daftar_pesanan.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
</head>
<body>
    <h2>Edit Pesanan</h2>
    <form method="post">
        Nama Pemesan: <input type="text" name="nama_pemesan" value="<?php echo $row['nama_pemesan']; ?>"><br>
        Nomor HP: <input type="text" name="nomor_hp" value="<?php echo $row['nomor_hp']; ?>"><br>
        Jumlah Peserta: <input type="number" name="jumlah_peserta" value="<?php echo $row['jumlah_peserta']; ?>"><br>
        Durasi Wisata: <input type="number" name="durasi_wisata" value="<?php echo $row['durasi_wisata']; ?>"><br>
        Layanan Penginapan: <input type="checkbox" name="layanan_penginapan" <?php echo $row['layanan_penginapan'] ? 'checked' : ''; ?>><br>
        Layanan Transportasi: <input type="checkbox" name="layanan_transportasi" <?php echo $row['layanan_transportasi'] ? 'checked' : ''; ?>><br>
        Layanan Makanan: <input type="checkbox" name="layanan_makanan" <?php echo $row['layanan_makanan'] ? 'checked' : ''; ?>><br>
        Harga Paket: <input type="text" name="harga_paket" value="<?php echo $row['harga_paket']; ?>"><br>
        Jumlah Tagihan: <input type="text" name="jumlah_tagihan" value="<?php echo $row['jumlah_tagihan']; ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Wisata Pantai Jawa Barat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active bg-secondary" href="daftar_pesanan.php">Daftar Pesanan</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Daftar Pesanan</h2>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Jumlah Peserta</th>
                    <th>Jumlah Hari</th>
                    <th>Akomodasi</th>
                    <th>Transportasi</th>
                    <th>Service/Makanan</th>
                    <th>Harga Paket</th>
                    <th>Total Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM pesanan";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nama_pemesan']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['nomor_hp']) . "</td>";
                        echo "<td>" . (int)$row['jumlah_peserta'] . "</td>";
                        echo "<td>" . (int)$row['durasi_wisata'] . "</td>";
                        echo "<td>" . ($row['layanan_penginapan'] ? 'Y' : 'N') . "</td>";
                        echo "<td>" . ($row['layanan_transportasi'] ? 'Y' : 'N') . "</td>";
                        echo "<td>" . ($row['layanan_makanan'] ? 'Y' : 'N') . "</td>";
                        echo "<td>" . number_format((float)$row['harga_paket'], 0, ',', '.') . "</td>";
                        echo "<td>" . number_format((float)$row['jumlah_tagihan'], 0, ',', '.') . "</td>";
                        echo "<td><a href='edit_pesanan.php?id=" . $row['id_pesanan'] . "' class='btn btn-primary btn-sm'>Edit</a> ";
                        echo "<a href='delete_pesanan.php?id=" . $row['id_pesanan'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>Tidak ada data pesanan</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Paket Wisata</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .banner {
            width: 100%;
            height: 300px;
            background-image: url('https://media.suara.com/pictures/970x544/2022/01/03/82096-pantai.jpg');
            background-size: cover;
            background-position: center;
        }
        .header-text {
            text-align: center;
            padding: 10px;
            color: black;
            background-color: #add8e6;
        }
        .navbar {
            background-color: #add8e6;
        }
        .navbar-nav .nav-link {
            color: black;
        }
        .footer-blue {
            background-color: #add8e6;
        }
    </style>
    <script>
        function hitungTotal() {
            // Ambil nilai dari form
            var durasiWisata = parseInt(document.getElementById('durasi_wisata').value) || 0;
            var layananPenginapan = document.getElementById('layanan_penginapan').checked ? 1000000 : 0;
            var layananTransportasi = document.getElementById('layanan_transportasi').checked ? 1200000 : 0;
            var layananMakanan = document.getElementById('layanan_makanan').checked ? 500000 : 0;
            var jumlahPeserta = parseInt(document.getElementById('jumlah_peserta').value) || 1;

            // Hitung subtotal dan total
            var subtotal = durasiWisata * (layananPenginapan + layananTransportasi + layananMakanan);
            var total = subtotal * jumlahPeserta;

            // Tampilkan hasil ke dalam form
            document.getElementById('subtotal').value = subtotal;
            document.getElementById('total').value = total;
        }
    </script>
</head>
<body>
    <header class="banner">
        <div class="header-text">
            <h1>Pemesanan Paket Wisata Pantai Jawa Barat</h1>
        </div>
    </header> 

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
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
                        <a class="nav-link active bg-secondary" href="form_pemesanan.php">Form Pemesanan</a>
                    </li>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'operator') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="daftar_pesanan.php">Daftar Pesanan</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['username'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Form Pemesanan Paket Wisata</h2>
        <form method="post" action="process_order.php">
            <!-- Nama Pemesan -->
            <div class="form-group">
                <label for="nama_customer">Nama Pemesan:</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
            </div>

            <!-- Nomor HP -->
            <div class="form-group">
                <label for="no_telp_customer">Nomor HP:</label>
                <input type="text" class="form-control" id="no_telp_customer" name="no_telp_customer" required>
            </div>

            <!-- Tanggal Mulai Wisata -->
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai Wisata:</label>
                <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
            </div>

            <!-- Durasi Wisata -->
            <div class="form-group">
                <label for="durasi_wisata">Durasi Wisata (hari):</label>
                <input type="number" class="form-control" id="durasi_wisata" name="durasi_wisata" required>
            </div>

            <!-- Layanan Paket -->
            <div class="form-group">
                <label>Layanan Paket:</label><br>
                <input type="checkbox" id="layanan_penginapan" name="layanan_paket[]" value="Penginapan">
                <label for="layanan_penginapan">Penginapan (Rp. 1.000.000,-)</label><br>
                <input type="checkbox" id="layanan_transportasi" name="layanan_paket[]" value="Transportasi">
                <label for="layanan_transportasi">Transportasi (Rp. 1.200.000,-)</label><br>
                <input type="checkbox" id="layanan_makanan" name="layanan_paket[]" value="Makanan">
                <label for="layanan_makanan">Makanan (Rp. 500.000,-)</label>
            </div>

            <!-- Jumlah Peserta -->
            <div class="form-group">
                <label for="jumlah_peserta">Jumlah Peserta:</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" required>
            </div>

            <!-- Subtotal -->
            <div class="form-group">
                <label for="subtotal">Harga Paket Wisata:</label>
                <input type="text" class="form-control" id="subtotal" name="subtotal" readonly>
            </div>

            <!-- Total -->
            <div class="form-group">
                <label for="total">Jumlah Tagihan:</label>
                <input type="text" class="form-control" id="total" name="total" readonly>
            </div>

            <!-- Tombol -->
            <button type="button" class="btn btn-primary" onclick="hitungTotal()">Hitung</button>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>

    <footer class="footer-blue text-center text-lg-start mt-4">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Tentang Kami</h5>
                    <p>Ikuti trip musim panas bersama kami ke pantai indah yang ada di Jawa Barat.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Tautan</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-dark">Beranda</a></li>
                        <li><a href="form_pemesanan.php" class="text-dark">Paket Wisata</a></li>
                        <li><a href="#" class="text-dark">Kontak Kami</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Kontak Kami</h5>
                    <p>Email: info@summertrip.com</p>
                    <p>Telepon: 021-12345678</p>
                </div>
            </div>
        </div>
        <div class="text-center p-3 footer-blue">
            <span>© 2024 Hak Cipta Terpelihara: Wisata Pantai Jawa Barat</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



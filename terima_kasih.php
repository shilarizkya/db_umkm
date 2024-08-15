<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .thankyou-banner {
            width: 100%;
            height: 300px;
            background-image: url('https://media.suara.com/pictures/970x544/2022/01/03/82096-pantai.jpg'); /* Ganti dengan URL gambar banner Anda */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 2em;
            font-weight: bold;
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
</head>
<body>
    <!-- Navigation Bar -->
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
                        <a class="nav-link" href="form_pemesanan.php">Form Pemesanan</a>
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

    <div class="thankyou-banner">
        Terima Kasih!
    </div>
    <div class="container mt-5 text-center">
        <p>Terima kasih atas pemesanan Anda. Kami akan menghubungi Anda dalam waktu dekat untuk konfirmasi lebih lanjut.</p>
        <a href="index.php" class="btn btn-primary">OK</a>
    </div>

    <!-- Footer -->
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
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

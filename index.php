<?php
session_start();

// Fungsi untuk memeriksa apakah pengguna adalah operator
function isOperator() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'operator';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Wisata Pantai Jawa Barat</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS untuk mengatur banner dan elemen lainnya */
        body, html {
            margin: 0;
            padding: 0;
        }
        .banner-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            width: 100%;
            height: 400px; /* Tinggi banner, sesuaikan dengan kebutuhan Anda */
        }
        .banner-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .banner-content {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: black;
            font-size: 32px;
            font-weight: bold;
            font-background: #add8e6;
            text-align: center;
            z-index: 2;
        }
        .banner-wrapper {
            position: relative;
            width: 100%;
            display: flex;
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
        .menu {
            margin-bottom: 20px;
        }
        .video-embed {
            width: 100%;
            height: 150px;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .footer-blue {
            background-color: #add8e6;
        }
    </style>
</head>
<body>

<div class="banner-wrapper">
        <div class="banner-content">
            Selamat Datang Di Wisata Pantai Jawa Barat
        </div>
        <div class="banner-container">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS2_v9bquIiN6bavkZjOSbtuQc63lOPVAN2Dg&s" alt="Pantai 1">
            <img src="https://www.blibli.com/friends-backend/wp-content/uploads/2023/03/B200447-Cover-pantai-yang-terkenal-di-thailand.jpg" alt="Pantai 2">
            <img src="https://nagantour.com/wp-content/uploads/2023/06/Pantai-Terindah-Di-Yogyakarta.jpg" alt="Pantai 3">
        </div>
    </div>

    <!-- Menu Utama -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form_pemesanan.php">Form Pemesanan</a>
                    </li>
                    <?php if (isOperator()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="daftar_pesanan.php">Daftar Pesanan</a>
                    </li>
                    <?php endif; ?>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="logout.php">Logout</a>
                              </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                              </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container">
        <div class="row">
            <!-- Paket Wisata 1 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/02/28/FotoJet-84-1077648917.jpg" class="card-img-top" alt="Tour 1">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Ujung Genteng</h5>
                        <p class="card-text">Tour Package 2 hari 1 malam include penginapan dan transportasi.</p>
                        <a href="form_pemesanan.php?paket=1" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Paket Wisata 2 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2F5857b333-e201-439e-5173-661262f3f100%2Fw%3D750&w=1920&q=75" class="card-img-top" alt="Tour 2">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Pangandaran</h5>
                        <p class="card-text">Tour Package 2 hari 1 malam include penginapan dan transportasi</p>
                        <a href="form_pemesanan.php?paket=2" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Video YouTube -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Ujung Genteng</h5>
                        <iframe class="video-embed" src="https://www.youtube.com/embed/7bbSNkuVGzU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Pangandaran</h5>
                        <iframe class="video-embed" src="https://www.youtube.com/embed/cVUEcQUSX2g" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Paket Wisata 3 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://img.okezone.com/content/2024/05/28/408/3014146/pantai-ranca-buaya-garut-lokasi-fasilitas-wisata-dan-harga-tiket-masuk-D31HDycp2J.JPG" class="card-img-top" alt="Tour 3">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Ranca Buaya</h5>
                        <p class="card-text">Tour Package 2 hari 1 malam include penginapan dan transportasi.</p>
                        <a href="form_pemesanan.php?paket=3" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Paket Wisata 4 -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p1/364/2023/10/31/pantai-cemara-cidaun-cianjur-349032334.jpg" class="card-img-top" alt="Tour 4">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Cemara Cidaun</h5>
                        <p class="card-text">Tour Package 2 hari 1 malam include penginapan dan transportasi.</p>
                        <a href="form_pemesanan.php?paket=4" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Video YouTube -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pantai RancaBuaya</h5>
                        <iframe class="video-embed" src="https://www.youtube.com/embed/npUVf66lw_Y" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Pantai Cidaun</h5>
                        <iframe class="video-embed" src="https://www.youtube.com/embed/WnQkpw3leLg" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
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
                        <li><a href="#" class="text-dark">Beranda</a></li>
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


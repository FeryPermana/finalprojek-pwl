<?php
session_start();
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pemesanan JOIN pelanggan
                        ON pemesanan.id_pelanggan=pelanggan.id_pelanggan
                        WHERE pemesanan.id_pemesanan='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DSLR</title>
    <link rel="stylesheet" href="style/navbar.css" />
    <link rel="stylesheet" href="style/DSLR.css" />
    <link rel="stylesheet" href="style/dropdown.css" />
    <link rel="stylesheet" href="style/footer.css" />
    <script src="https://use.fontawesome.com/99cdecee55.js"></script>
    <style>
        .alert {
            padding: 50px;
            font-size: 50px;
            background-color: black;
            color: white;
        }

        strong {
            color: red;
        }
    </style>
</head>

<body>
    <?php include('template/navbar.php') ?>

    <section class="carousel">
        <img src="assets/banner/banner DSLR !.png" alt="">
    </section>
    <section class="best">
        <!-- mengambil namajenis produk -->
        <?php $dapat = $koneksi->query("SELECT * FROM jenis_produk where id_jenis_produk='$_GET[id]'"); ?>
        <?php $judul = $dapat->fetch_assoc() ?>
        <h1 style="font-size: 60px; color:black; text-align:center"><?= $judul['nama_jenis_produk']; ?></h1>
        <div class="card">
            <?php $ambil = $koneksi->query("SELECT * FROM produk JOIN jenis_produk ON produk.id_jenis_produk=jenis_produk.id_jenis_produk Where produk.id_jenis_produk='$_GET[id]'"); ?>
            <?php while ($produk = $ambil->fetch_assoc()) { ?>
                <div class="card-item">
                    <div class="ractangle">
                        <div class="display">
                            <h2><?= $produk['nama_produk']; ?></h2>
                        </div>
                        <a href="detail.php?id=<?= $produk['id_produk'] ?>">MORE</a>
                    </div>
                    <img src="foto_produk/<?= $produk['foto_produk']; ?>" alt="" />
                </div>
            <?php } ?>
        </div>
        ?>
    </section>
    <?php include('template/footer.php') ?>
    <?php include('template/javascript.php') ?>
    <?php include('template/jsdropdown.php') ?>
</body>

</html>
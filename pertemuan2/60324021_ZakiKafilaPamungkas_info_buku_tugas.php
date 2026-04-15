<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Buku - Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Informasi Buku</h1>

        <?php
        // Data Buku
        $judul1 = "Laravel: From Beginner to Advanced";
        $pengarang1 = "Sultan Agung";
        $penerbit1 = "Informatika";
        $tahun_terbit1 = 2023;
        $harga1 = 125000;
        $stok1 = 8;
        $isbn1 = "978-602-1234-56-7";
        $kategori1 = "Database";
        $bahasa1 = "Inggris";
        $halaman1 = 900;
        $berat1 = 450;

        $judul2 = "Mastering MySQL Database";
        $pengarang2 = "Zaki Musyaffa";
        $penerbit2 = "Gramedia";
        $tahun_terbit2 = 2024;
        $harga2 = 150000;
        $stok2 = 50;
        $isbn2 = "978-602-5678-12-3";
        $kategori2 = "Database";
        $bahasa2 = "Inggris";
        $halaman2 = 300;
        $berat2 = 280;

        $judul3 = "Programming Web dengan html untuk pemula";
        $pengarang3 = "Muliyono";
        $penerbit3 = "Erlangga";
        $tahun_terbit3 = 2026;
        $harga3 = 175000;
        $stok3 = 6;
        $isbn3 = "978-602-9012-34-5";
        $kategori3 = "Web Design";
        $bahasa3 = "Indonesia";
        $halaman3 = 500;
        $berat3 = 300;

        $judul4 = "Trik Membuat Website dalam 30 hari dengan HTML & CSS untuk pemula";
        $pengarang4 = "Murfid Arafi";
        $penerbit4 = "Bentang Pustaka";
        $tahun_terbit4 = 2025;
        $harga4 = 180000;
        $stok4 = 12;
        $isbn4 = "978-602-3456-78-9";
        $kategori4 = "Web Design";
        $bahasa4 = "Indonesia";
        $halaman4 = 400;
        $berat4 = 250;
        ?>

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $judul1; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Pengarang</th>
                        <td>: <?php echo $pengarang1; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: <?php echo $penerbit1; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: <?php echo $tahun_terbit1; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: <?php echo $isbn1; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp <?php echo number_format($harga1, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <?php echo $stok1; ?> buku</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><?php echo $kategori1; ?></td>
                    </tr>
                    <tr>
                        <th>Bahasa</th>
                        <td>: <?php echo $bahasa1; ?></td>
                    </tr>
                    <tr>
                        <th>Halaman Buku</th>
                        <td>: <?php echo $halaman1; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Buku</th>
                        <td>: <?php echo $berat1; ?> Gram</td>
                    </tr>
                </table>
            </div>
        </div><br />

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $judul2; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Pengarang</th>
                        <td>: <?php echo $pengarang2; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: <?php echo $penerbit2; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: <?php echo $tahun_terbit2; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: <?php echo $isbn2; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp <?php echo number_format($harga2, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <?php echo $stok2; ?> buku</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><?php echo $kategori2; ?></td>
                    </tr>
                    <tr>
                        <th>Bahasa</th>
                        <td>: <?php echo $bahasa2; ?></td>
                    </tr>
                    <tr>
                        <th>Halaman Buku</th>
                        <td>: <?php echo $halaman2; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Buku</th>
                        <td>: <?php echo $berat2; ?> Gram</td>
                    </tr>
                </table>
            </div>
        </div><br />

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $judul3; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Pengarang</th>
                        <td>: <?php echo $pengarang3; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: <?php echo $penerbit3; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: <?php echo $tahun_terbit3; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: <?php echo $isbn3; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp <?php echo number_format($harga3, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <?php echo $stok3; ?> buku</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><?php echo $kategori3; ?></td>
                    </tr>
                    <tr>
                        <th>Bahasa</th>
                        <td>: <?php echo $bahasa3; ?></td>
                    </tr>
                    <tr>
                        <th>Halaman Buku</th>
                        <td>: <?php echo $halaman3; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Buku</th>
                        <td>: <?php echo $berat3; ?> Gram</td>
                    </tr>
                </table>
            </div>
        </div><br />

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0"><?php echo $judul4; ?></h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Pengarang</th>
                        <td>: <?php echo $pengarang4; ?></td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>: <?php echo $penerbit4; ?></td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: <?php echo $tahun_terbit4; ?></td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>: <?php echo $isbn4; ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>: Rp <?php echo number_format($harga4, 0, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <?php echo $stok4; ?> buku</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td><?php echo $kategori4; ?></td>
                    </tr>
                    <tr>
                        <th>Bahasa</th>
                        <td>: <?php echo $bahasa4; ?></td>
                    </tr>
                    <tr>
                        <th>Halaman Buku</th>
                        <td>: <?php echo $halaman4; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Buku</th>
                        <td>: <?php echo $berat4; ?> Gram</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

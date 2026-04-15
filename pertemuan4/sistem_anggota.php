<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Anggota Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>

    <?php
    require_once 'functions_anggota.php';

    $anggota_list = [
        ["id" => "AGT-001", "nama" => "Hendra Wijaya",   "email" => "hendra.wijaya@email.com",   "status" => "Aktif",     "total_pinjaman" => 9,  "tanggal_daftar" => "2023-07-11"],
        ["id" => "AGT-002", "nama" => "Mega Putri",      "email" => "mega.putri@email.com",       "status" => "Non-Aktif", "total_pinjaman" => 4,  "tanggal_daftar" => "2021-05-22"],
        ["id" => "AGT-003", "nama" => "Taufik Ramadan",  "email" => "taufik.ramadan@email.com",   "status" => "Aktif",     "total_pinjaman" => 13, "tanggal_daftar" => "2022-10-03"],
        ["id" => "AGT-004", "nama" => "Indah Permata",   "email" => "indah.permata@email.com",    "status" => "Non-Aktif", "total_pinjaman" => 6,  "tanggal_daftar" => "2020-08-17"],
        ["id" => "AGT-005", "nama" => "Arif Setiawan",   "email" => "arif.setiawan@email.com",    "status" => "Aktif",     "total_pinjaman" => 2,  "tanggal_daftar" => "2024-04-09"],
    ];

    // Search & Sort
    $keyword = $_GET['search'] ?? '';
    $anggota_sorted = sort_by_nama($anggota_list);
    if ($keyword) {
        $anggota_sorted = search_by_nama($anggota_sorted, $keyword);
    }

    // Statistik
    $total    = hitung_total_anggota($anggota_list);
    $aktif    = hitung_anggota_aktif($anggota_list);
    $rata     = hitung_rata_rata_pinjaman($anggota_list);
    $teraktif = cari_anggota_teraktif($anggota_list);

    $aktif_list    = filter_by_status($anggota_list, "Aktif");
    $nonaktif_list = filter_by_status($anggota_list, "Non-Aktif");
    ?>

    <div class="container mt-5">
        <h1 class="mb-4"><i class="bi bi-people"></i> Sistem Anggota Perpustakaan</h1>

        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-bg-primary p-3">
                    <h5>Total Anggota</h5>
                    <h2><?= $total ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-success p-3">
                    <h5>Anggota Aktif</h5>
                    <h2><?= $aktif ?></h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-bg-warning p-3">
                    <h5>Rata Pinjaman</h5>
                    <h2><?= number_format($rata, 2) ?></h2>
                </div>
            </div>
        </div>

        <!-- Search -->
        <form class="mb-3">
            <input type="text" name="search" class="form-control" placeholder="Cari nama anggota..." value="<?= $keyword ?>">
        </form>

        <!-- Tabel -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">Daftar Anggota</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Pinjaman</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anggota_sorted as $a): ?>
                            <tr>
                                <td><?= $a['id'] ?></td>
                                <td><?= $a['nama'] ?></td>
                                <td><?= validasi_email($a['email']) ? $a['email'] : "Invalid" ?></td>
                                <td><?= $a['status'] ?></td>
                                <td><?= $a['total_pinjaman'] ?></td>
                                <td><?= format_tanggal_indo($a['tanggal_daftar']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Teraktif -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">Anggota Teraktif</div>
            <div class="card-body">
                <h4><?= $teraktif['nama'] ?></h4>
                <p>Total Pinjaman: <?= $teraktif['total_pinjaman'] ?></p>
            </div>
        </div>

        <!-- Aktif dan tidak -->
        <div class="row">
            <div class="col-md-6">
                <h5>Aktif</h5>
                <ul class="list-group">
                    <?php foreach ($aktif_list as $a): ?>
                        <li class="list-group-item"><?= $a['nama'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h5>Non-Aktif</h5>
                <ul class="list-group">
                    <?php foreach ($nonaktif_list as $a): ?>
                        <li class="list-group-item"><?= $a['nama'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Perhitungan Diskon - Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Sistem Perhitungan Diskon Bertingkat</h1>

        <?php
        // TODO: Isi data pembeli dan buku di sini
        $nama_pembeli = "Zaki Musyaffa";
        $judul_buku = "Laravel Advanced";
        $harga_satuan = 150000;
        $jumlah_beli = 4;
        $is_member = true; // true atau false

        // TODO: Hitung subtotal
        $subtotal = $harga_satuan * $jumlah_beli;

        // TODO: Tentukan persentase diskon berdasarkan jumlah
        $persentase_diskon = 0;

        if ($jumlah_beli >= 1 && $jumlah_beli <= 2) {
            $persentase_diskon = 0;
        } elseif ($jumlah_beli >= 3 && $jumlah_beli <= 5) {
            $persentase_diskon = 10;
        } elseif ($jumlah_beli >= 6 && $jumlah_beli <= 10) {
            $persentase_diskon = 15;
        } else {
            $persentase_diskon = 20;
        }

        // TODO: Hitung diskon
        $diskon = $subtotal * ($persentase_diskon / 100);

        // TODO: Total setelah diskon pertama
        $total_setelah_diskon1 = $subtotal - $diskon;

        // TODO: Hitung diskon member jika member
        $diskon_member = 0;
        if ($is_member) {
            $diskon_member = $total_setelah_diskon1 * 0.05;
        }

        // TODO: Total setelah semua diskon
        $total_setelah_diskon = $total_setelah_diskon1 - $diskon_member;

        // TODO: Hitung PPN
        $ppn = $total_setelah_diskon * 0.11;

        // TODO: Total akhir
        $total_akhir = $total_setelah_diskon + $ppn;

        // TODO: Total penghematan
        // $total_hemat mencakup diskon reguler dan diskon member (jika ada)
        $total_hemat = $diskon + $diskon_member;
        ?>

        <!-- TODO: Tampilkan hasil perhitungan dengan Bootstrap -->
        <!-- Gunakan card, table, dan badge -->

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Detail Pembelian
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Nama Pembeli</td>
                        <td><?php echo $nama_pembeli; ?></td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td><?php echo $judul_buku; ?></td>
                    </tr>
                    <tr>
                        <td>Harga Satuan</td>
                        <td>Rp. <?php echo number_format($harga_satuan, 0, ",", "."); ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Beli</td>
                        <td><?php echo $jumlah_beli; ?></td>
                    </tr>
                    <tr>
                        <th>Validasi Member</th>
                        <td>
                            <?php
                            if ($is_member) {
                                echo '<span class="badge bg-success">Ya</span>';
                            } else {
                                echo '<span class="badge bg-danger">Tidak</span>';
                            }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div><br />

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Hasil Perhitungan
            </div>
            <table class="table table-bordered">
                <tr>
                    <td>Subtotal</td>
                    <td>Rp. <?php echo number_format($subtotal, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td>Diskon (<?php echo $persentase_diskon; ?>%)</td>
                    <td>- Rp. <?php echo number_format($diskon, 0, ",", "."); ?></td>
                </tr>

                <?php
                if ($is_member) {
                    echo "<tr>
                                <td>Diskon Member (5%)</td>
                                <td>- Rp. " . number_format($diskon_member, 0, ",", ".") . "</td>
                              </tr>";
                }
                ?>

                <tr>
                    <td>Total Setelah Diskon</td>
                    <td>Rp. <?php echo number_format($total_setelah_diskon, 0, ",", "."); ?></td>
                </tr>
                <tr>
                    <td>PPN (11%)</td>
                    <td>Rp. <?php echo number_format($ppn, 0, ",", "."); ?></td>
                </tr>
                <tr class="table-success">
                    <td>Total Akhir</td>
                    <td>Rp. <?php echo number_format($total_akhir, 0, ",", "."); ?></td>
                </tr>
                <tr class="table-info">
                    <td>Total Penghematan</td>
                    <td>Rp. <?php echo number_format($total_hemat, 0, ",", "."); ?></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
//Bikin Koneksi
$c = mysqli_connect('localhost', 'root', '', 'inventori2');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/atlantis.min.css">
    <title>Cetak Laporan Pengembalian Barang</title>
</head>

<body>
    <header style="text-align:center;">
        DATA PENGEMBALIAN BARANG
        <?php
        include '../koneksi/koneksi.php';

        $bulan = $_POST['bulan'];

        $query = "SELECT pb.id_peminjaman, u.nama AS nama_user, b.kode_barang, b.nama_barang, pb.jumlah, DATE_FORMAT(pb.tanggal_peminjaman, '%d-%m-%Y') AS tanggal_peminjaman, DATE_FORMAT(pb.tanggal_pengembalian, '%d-%m-%Y') AS tanggal_pengembalian, pb.jaminan, pb.status
        FROM peminjaman_barang pb
        INNER JOIN user u ON pb.id_user = u.id_user
        INNER JOIN barang b ON pb.id_barang = b.id_barang
        WHERE status='Dikembalikan' AND DATE_FORMAT(pb.tanggal_peminjaman,'%Y-%m') = '$bulan'";
        $result = $c->query($query);

        $item = mysqli_fetch_assoc($result);
        ?>
        <div class="">
        Bulan :
            <?= isset($item['tanggal_masuk']) ? date('F', strtotime($item['tanggal_masuk'])) : ''; ?>

        </div>
    </header>
    <hr>
    <section>
    <div class="table-responsive">
        <table class="table table-bordered data-table" border="1" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Jaminan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $get = mysqli_query($c, "SELECT pb.id_peminjaman, u.nama AS nama_user, b.kode_barang, b.nama_barang, pb.jumlah, DATE_FORMAT(pb.tanggal_peminjaman, '%d-%m-%Y') AS tanggal_peminjaman, DATE_FORMAT(pb.tanggal_pengembalian, '%d-%m-%Y') AS tanggal_pengembalian, pb.jaminan, pb.status
                FROM peminjaman_barang pb
                INNER JOIN user u ON pb.id_user = u.id_user
                INNER JOIN barang b ON pb.id_barang = b.id_barang
                WHERE status='Dikembalikan' AND DATE_FORMAT(pb.tanggal_peminjaman,'%Y-%m') = '$bulan'");
                $i = 1;

                while ($p = mysqli_fetch_array($get)) {
                    // $id_barang = $p['id_barang'];
                    $id_peminjaman = $p['id_peminjaman'];
                    $nama_user = $p['nama_user'];
                    $kode_barang = $p['kode_barang'];
                    $nama_barang = $p['nama_barang'];
                    $jumlah = $p['jumlah'];
                    $tanggal_peminjaman = $p['tanggal_peminjaman'];
                    $tanggal_pengembalian = $p['tanggal_pengembalian'];
                    $jaminan = $p['jaminan'];
                    $status = $p['status'];


                    ?>

                    <tr>
                        <td>
                            <?= $i++; ?>
                        </td>
                        <td>
                            <?= $nama_user; ?>
                        </td>
                        <td>
                            <?= $kode_barang; ?>
                        </td>
                        <td>
                            <?= $nama_barang; ?>
                        </td>
                        <td>
                            <?= $jumlah; ?>
                        </td>
                        <td>
                            <?= $tanggal_peminjaman; ?>
                        </td>
                        <td>
                            <?= $tanggal_pengembalian; ?>
                        </td>
                        <td>
                            <?= $jaminan; ?>
                        </td>
                        <td>
                            <?= $status; ?>
                        </td>
                    </tr>
                    <?php
                }
                ; //end of while
                ?>

            </tbody>
        </table>
    </div>
    <br>
                    <br>
            <form id="signature-form" class="row">
                <div class="col-md-6">
                    <!-- Konten kiri (tanda tangan) -->
                    <div class="signature">
                        <div class="col-12" style="">
                            <label for="signature">Padang, </label><br>
                            <canvas id="signature-canvas" width="300" height="100"></canvas><br>
                            <label for="signature">Admin</label>
                            <br>
                            <label for="signature"></label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Konten kanan (kosong untuk formulir lainnya) -->
                </div>

                <!-- Tambahkan script JavaScript untuk menangani tanda tangan di sini -->
                <script>
                    function printReport() {
                        // Cetak laporan secara otomatis
                        window.print();
                    }
                    // Panggil fungsi cetak saat halaman dimuat
                    printReport();
                </script>

                <!-- Tambahkan link JS Bootstrap di sini -->
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </form>

    </section>
    <script>
        window.print()

    </script>
</body>

</html>
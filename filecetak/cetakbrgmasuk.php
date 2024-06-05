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
    <title>Cetak Laporan Barang Masuk</title>
</head>

<body>
    <header style="text-align:center;">
        DATA BARANG MASUK
        <?php
        include '../koneksi/koneksi.php';

        $bulan = $_POST['bulan'];

        $query = "SELECT * FROM barang_masuk 
    INNER JOIN barang ON barang_masuk.id_barang = barang.id_barang 
    WHERE DATE_FORMAT(barang_masuk.tanggal_masuk,'%Y-%m') = '$bulan'";
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
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Merk</th>
                        <th>Tanggal Masuk</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    $bulan = $_POST['bulan'];

                    $query = "SELECT * FROM barang_masuk 
                                    INNER JOIN barang ON barang_masuk.id_barang = barang.id_barang 
                                    WHERE DATE_FORMAT(barang_masuk.tanggal_masuk,'%Y-%m') = '$bulan'";
                    $result = $c->query($query);
                    $i = 1;

                    while ($p = mysqli_fetch_array($result)) {
                        $id_masuk = $p['id_masuk'];
                        $nama_barang = $p['nama_barang'];
                        $jumlah = $p['jumlah'];
                        $satuan = $p['satuan'];
                        $tanggal_masuk = $p['tanggal_masuk'];
                        $id_barang = $p['id_barang'];
                        $merk = $p['merk'];

                        ?>

                        <tr>
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <?= $nama_barang; ?>
                            </td>
                            <td>
                                <?= $jumlah; ?>
                            </td>
                            <td>
                                <?= $merk; ?>
                            </td>
                            <td>
                                <?= $tanggal_masuk; ?>
                            </td>
                        </tr>
                        <?php
                    }
                    ; //end of while
                    ?>
                </tbody>
            </table>
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

        </div>
    </section>
    <script>
        window.print()

    </script>
</body>

</html>
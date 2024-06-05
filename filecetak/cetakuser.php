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
    <title>Cetak Laporan Peminjam</title>
</head>

<body>
    <header style="text-align:center;">
        DATA PEMINJAM BARANG
        <?php
        include '../koneksi/koneksi.php';

        // $nama_barang = $_POST['nama_barang'];
        
        $query = "SELECT * from user";
        $result = $c->query($query);

        $item = mysqli_fetch_assoc($result);
        ?>
        <div class="">
            
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
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>No Hp</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * from user";
                    $result = $c->query($query);
                    $i = 1;

                    while ($p = mysqli_fetch_array($result)) {
                        $id_user = $p['id_user'];
                        $nama = $p['nama'];
                        $jenis_kelamin = $p['jenis_kelamin'];
                        $email = $p['email'];
                        $no_hp = $p['no_hp'];
                        ?>
                        <tr>
                            <td>
                                <?= $i++; ?>
                            </td>
                            <td>
                                <?= $nama; ?>
                            </td>
                            <td>
                                <?= $jenis_kelamin; ?>
                            </td>
                            <td>
                                <?= $email; ?>
                            </td>
                            <td>
                                <?= $no_hp; ?>
                            </td>
                        </tr>
                        <?php
                    }
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
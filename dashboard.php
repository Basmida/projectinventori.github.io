<?php
require 'ceklogin.php';
include 'navbar.php';

//Hitung jumlah barang
$h1 = mysqli_query($c, "select * from barang");
$h2 = mysqli_num_rows($h1)
    ?>

<?php
//Hitung jumlah mutasi
$h3 = mysqli_query($c, "select * from mutasi");
$h4 = mysqli_num_rows($h3)
    ?>

<?php
//Hitung jumlah peminjaman barang
$h5 = mysqli_query($c, "select * from peminjaman_barang");
$h6 = mysqli_num_rows($h5)
    ?>

<?php
//Hitung jumlah user
$h7 = mysqli_query($c, "select * from user");
$h8 = mysqli_num_rows($h7)
    ?>

<?php
//Hitung jumlah status peminjaman 
$h9 = mysqli_query($c, "select * from peminjaman_barang where status='Dipinjam'");
$h10 = mysqli_num_rows($h9)
    ?>

<?php
//Hitung jumlah status peminjaman 
$h11 = mysqli_query($c, "select * from peminjaman_barang where status!='Dipinjam'");
$h12 = mysqli_num_rows($h11)
    ?>

<?php
//Cari barang yang sering dipinjam
$cari = mysqli_query($c, "SELECT pb.*, b.nama_barang
FROM peminjaman_barang pb
INNER JOIN barang b ON pb.id_barang = b.id_barang
ORDER BY pb.jumlah DESC
LIMIT 3;");
$cari1 = mysqli_fetch_assoc($cari);

$namabrg = $cari1['nama_barang'];
$jumlahbrg = $cari1['jumlah'];
// echo 'nama barang  :' .  $namabrg;
// echo 'jumlah  :' .  $jumlahbrg;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SistemIventori</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Skrip jQuery untuk modal -->
    <script>
        $(document).ready(function () {
            $(".btn-kembali").click(function () {
                var idPeminjaman = $(this).data("id");
                $("#modalPengembalian-" + idPeminjaman).modal("show");
            });
        });
    </script>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/atlantis.min.css">


</head>

<body id="page-top">
    <!-- Begin Page Content -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php
        if ($_SESSION['level'] == 'user') {
            ?>
            <!-- Untuk user -->
        <div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
            <h3 class="mt-3 text-center font-weight-bold">Website Inventori Barang</h3>
            <h3 class="mb-4 text-center font-weight-bold">Jurusan Teknologi Informasi</h3>
            <img src="img/gambar1.png" class="img-fluid rounded" style="widht: 100%;" alt="...">
        </div>

        <!-- image background-->
        <!-- <img src="img/bg2.png" class="img-fluid" alt="..."> -->

        <!-- Content Row -->
        <div class="row mt-2">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Aturan Peminjaman barang</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body col-auto">
                        <div class="chart-area">
                            <div class="row small">
                                <!-- No 1 -->
                                <p class="px-3 font-weight-bold mb-0">1. Peminjam dan Syarat Peminjaman:</p>
                                <p class="px-4 mt-0 mb-0">- Peminjaman barang inventori terbuka untuk mahasiswa, dosen,
                                    dan staf dengan kartu identitas valid.</p>
                                <p class="px-4 mt-0 mb-0">- Mahasiswa harus memiliki izin dari dosen pembimbing atau
                                    pihak yang berwenang.</p>
                                <!-- No 2 -->
                                <p class="px-3 font-weight-bold mb-0 mt-1">2. Waktu Peminjaman:</p>
                                <p class="px-4 mt-0 mb-0">- Peminjaman barang inventori terbuka untuk mahasiswa, dosen,
                                    dan staf dengan kartu identitas valid.</p>
                                <p class="px-4 mt-0 mb-0">- Mahasiswa harus memiliki izin dari dosen pembimbing atau
                                    pihak yang berwenang.</p>
                                <!-- No 3 -->
                                <p class="px-3 font-weight-bold mb-0 mt-1">3. Peminjam dan Syarat Peminjaman:</p>
                                <p class="px-4 mt-0 mb-0">- Barang inventori dapat dipinjam untuk penggunaan dalam
                                    periode tertentu.</p>
                                <p class="px-4 mt-0 mb-0">- Durasi peminjaman diatur sesuai dengan kebutuhan, biasanya
                                    dalam rentang jam, hari, atau minggu.</p>
                                <!-- No 4 -->
                                <p class="px-3 font-weight-bold mb-0 mt-1">4. Jumlah Barang yang Dapat Dipinjam:</p>
                                <p class="px-4 mt-0 mb-0">- Batasan jumlah barang yang dapat dipinjam oleh satu individu
                                    diberlakukan untuk memastikan ketersediaan barang bagi semua pengguna.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                         $nama_user = $_SESSION['nama'];
                        $ambildata = mysqli_query($c, "SELECT *
                        FROM user u 
                        JOIN peminjaman_barang p ON u.id_user = p.id_user
                        JOIN barang b ON b.id_barang = p.id_barang
                        WHERE p.status = 'Dipinjam' AND  u.nama = '$nama_user'");

                        while ($fetch = mysqli_fetch_array($ambildata)) {
                            $barang = $fetch['nama_barang'];
                            $merk = $fetch['merk'];
                            $status = $fetch['status'];
                            $tanggal_pengembalian = $fetch['tanggal_pengembalian'];

                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" style="max-width: 300px"
                                role="alert">
                                <strong>Perhatian!</strong>Segera kembalikan
                                <?= $barang; ?>
                                <?= $merk; ?>
                                tenggat
                                <?= $tanggal_pengembalian; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?php
        } else {
        ?>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Card Jumlah barang -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Barang</div>
                                    <p class="text-xs mb-1">(Tabel stock barang)</p>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $h2; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-archive fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jumlah Mutasi Barang -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Barang Mutasi</div>
                                    <p class="text-xs mb-1">(Tabel mutasi barang)</p>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $h4; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jumlah Peminjaman Barang -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Jumlah Peminjaman
                                    </div>
                                    <p class="text-xs mb-1">(Tabel peminjaman barang)</p>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $h6; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Jumlah user -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Peminjam</div>
                                    <p class="text-xs mb-1">(Tabel Peminjam)</p>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?= $h8; ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Peminjaman Barang</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area" style="height: fit-content;">
                                <div class="row">
                                    <?php
                                    // Persentase Peminjaman Barang
                                    $trackDipinjam = ($h10 / $h6) * 100;
                                    $hasilDipinjam = round($trackDipinjam);
                                    if ($hasilDipinjam) {
                                        ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card border-info" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="card-title">Persentase Peminjaman Barang</p>
                                                    <h3 class="card-title font-weight-bold">
                                                        <?= $hasilDipinjam; ?>%
                                                    </h3>
                                                    <a href="peminjaman.php" class="btn btn-primary">Telusuri</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    // Persentase Pengembalian Barang
                                    $trackDikembalikan = ($h12 / $h6) * 100;
                                    $hasilDikembalikan = round($trackDikembalikan);
                                    if ($hasilDikembalikan) {
                                        ?>
                                        <div class="col-md-6 mb-3">
                                            <div class="card border-info" style="width: 100%;">
                                                <div class="card-body">
                                                    <p class="card-title">Persentase Pengembalian Barang</p>
                                                    <h3 class="card-title font-weight-bold">
                                                        <?= $hasilDikembalikan; ?>%
                                                    </h3>
                                                    <a href="peminjaman.php" class="btn btn-primary">Telusuri</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <!-- Tabel Data Barang Sering Dipinjam -->
                                    <div class="col-md-12">
                                        <div class="card border-primary" style="width: 100%;">
                                            <div class="card-body">
                                                <p class="card-title">Data Barang Sering Dipinjam</p>
                                                <table
                                                    class="table-sm table-bordered data-table table table-hover text-emphasis-primary"
                                                    border="1">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                                    </tr>

                                                    <?php
                                                    $i = 1;
                                                    while ($row = mysqli_fetch_assoc($cari)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?= $i++; ?>
                                                            </td>
                                                            <td>
                                                                <?= $row['nama_barang']; ?>
                                                            </td>
                                                            <td>
                                                                <?= $row['jumlah']; ?>
                                                            </td>
                                                            <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Notifikasi</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body">
                            <?php
                            $ambildata = mysqli_query($c, "select * from barang where stock < 1");

                            while ($fetch = mysqli_fetch_array($ambildata)) {
                                $barang = $fetch['nama_barang'];
                                $merk = $fetch['merk'];

                                ?>
                                <div class="alert alert-warning alert-dismissible fade show" style="max-width: 300px"
                                    role="alert">
                                    <strong>Perhatian!</strong> Stock Barang
                                    <?= $barang; ?>
                                    <?= $merk; ?> telah habis.
                                    <button type="button" class="btn-close" disabled aria-label="Close"></button>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
    <?php
    }?>
    </div>

    <!-- /.container-fluid -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>© Website Kelompok 2 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="nav-link btn btn-primary" href="logout.php">
                        <!-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> -->
                        <span>Logout</span></a>
                </div>
            </div>
        </div>
    </div>

    <!-- <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Logout</span></a>
            </li> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<!-- <h4 class="small font-weight-bold">Tracking Pengembalian Barang <span class="float-right">
<?= $trackDikembalikan; ?>%
                                    </span></h4>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->

<!-- <h4 class="small font-weight-bold">Tracking Peminjaman Barang <span class="float-right">
                                <?= $trackDipinjam; ?>%
                                    </span>
                                </h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> -->
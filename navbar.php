<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center mt-2">
            <div class="sidebar-brand-text mx-3">INVENTORI JURUSAN TI</div>
        </a>


        <!-- Divider -->
        <hr class="sidebar-divider my-0 mt-2">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item mt-2">
            <a class="nav-link" href="dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mt-2">

        <!-- Heading -->
        <div class="sidebar-heading mt-2 mb-0">
            Menu
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Inventori</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    
                    <?php
                    if ($_SESSION['level'] == 'user') {
                        ?>
                        <a class="collapse-item" href="barang.php">Stock Barang</a>
                        <a class="collapse-item" href="l2.php">Ruang Mutasi Barang</a>
                    <?php
                    }else {
                        ?>
                        <a class="collapse-item" href="barang.php">Stock Barang</a>
                        <a class="collapse-item" href="masuk.php">Barang Masuk</a>
                        <a class="collapse-item" href="mutasi.php">Mutasi Barang</a>
                        <a class="collapse-item" href="l2.php">Ruang Mutasi Barang</a>
                        
                        <?php
                    } ?>
                    
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item mt-2">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-table"></i>
                <span>Peminjaman</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="peminjaman.php">Peminjaman Barang</a>
                    <a class="collapse-item" href="pengembalian.php">Pengembalian Barang</a>
                    <?php
                    if ($_SESSION['level'] == 'admin') {
                        ?>
                        <a class="collapse-item" href="user.php">Kelola Peminjam</a>
                        <?php
                    } ?>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <!-- <hr class="sidebar-divider"> -->

        <!-- Heading -->
        <!-- <div class="sidebar-heading">
            Addons
        </div> -->

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                <span>Logout</span></a>
        </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block mt-2">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline mt-5">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <form class="form-inline">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </form>

                <!-- Topbar Search -->
                <div class="">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <!-- Ubah menjadi elemen img -->
                    <img src="img/logo1.png" style="width: 140px; height: 50px; ">
                </div>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                     <?php
                                     $ambil2 = mysqli_query($c, "select * from barang_masuk m, barang b where m.id_barang=b.id_barang");

                                     while ($fetch = mysqli_fetch_array($ambil2)) {
                                         $barang = $fetch['nama_barang'];
                                         $merk = $fetch['merk'];
                                         $jumlah = $fetch['jumlah'];
                                         $tanggal_masuk = $fetch['tanggal_masuk'];

                                         ?>
                                        <div class="small text-gray-500"><?= $tanggal_masuk; ?></div>
                                        <div class="alert alert-dismissible fade show"
                                            style="max-width: 300px" role="alert">
                                            <strong>Berhasil!</strong>
                                            <?= $jumlah; ?>
                                            <?= $barang; ?>
                                            <?= $merk; ?> telah ditambahkan.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                        <?php
                                     }
                                     ?> 
                                </div>
                            </a> -->
                            
                            <!-- dashboard untuk admin -->
                            <?php
                            if ($_SESSION['level'] == 'admin') {
                                ?>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <?php
                                        $ambildata = mysqli_query($c, "select * from barang where stock < 1");

                                        while ($fetch = mysqli_fetch_array($ambildata)) {
                                            $barang = $fetch['nama_barang'];
                                            $merk = $fetch['merk'];

                                            ?>
                                            <!-- <div class="small text-gray-500"><?= $tanggal_masuk; ?></div> -->
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>Perhatian!</strong> Stock Barang
                                                <?= $barang; ?>
                                                <?= $merk; ?> telah habis.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            
                            <?php
                            } ?>

                         <!-- dashboard untuk user -->
                        <?php
                        if ($_SESSION['level'] == 'user') {
                            ?>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
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
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                        <?php
                                    }
                                }
                                    ?>

                                     <!-- dashboard untuk pimpinan -->
                                     <?php
                        if ($_SESSION['level'] == 'pimpinan') {
                            ?>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <?php
                                    $ambildata = mysqli_query($c, "SELECT *
                                    FROM peminjaman_barang p
                                    JOIN barang b ON p.id_barang = b.id_barang
                                    WHERE p.status = 'Dipinjam'");

                                    while ($fetch = mysqli_fetch_array($ambildata)) {
                                        $barang = $fetch['nama_barang'];
                                        $merk = $fetch['merk'];
                                        $status = $fetch['status'];
                                        $tanggal_pengembalian = $fetch['tanggal_pengembalian'];

                                        ?>
                                        <!-- <div class="alert alert-warning alert-dismissible fade show" style="max-width: 300px"
                                            role="alert">
                                            <strong>Perhatian!</strong>Segera kembalikan
                                            <?= $barang; ?>
                                            <?= $merk; ?>
                                            tenggat
                                            <?= $tanggal_pengembalian; ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div> -->
                                        <?php
                                    }
                                    ?>

                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            <?php
                        } ?>
        </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                    <?= $_SESSION['nama']; ?>
                </span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <div class="dropdown-divider"></div>
            </div>
        </li>

        </ul>

        </nav>
                    
<?php include 'layout/header.php'; ?>

<?php
// Include file koneksi
include 'koneksi.php';

// Ambil data dari database
$sql = "SELECT sessions.id, trainers.name AS trainer_name, date, session_number, time, topic 
        FROM sessions 
        JOIN trainers ON sessions.trainer_id = trainers.id";
$result = $conn->query($sql);
?>

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Kelola Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tambah_jadwal.php">
                        <i class="bi bi-circle"></i><span>Tambah Jadwal</span>
                    </a>
                </li>
                <li>
                    <a href="daftar_sesi.php">
                        <i class="bi bi-circle"></i><span>Daftar Sesi</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Rekapitulasi</span>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="rekapitulasi.php">
                    <i class="bi bi-circle"></i><span>Rekapitulasi Trainer</span>
                </a>
            </li>
        </ul>
      </li><!-- End Tables Nav -->


    </ul>
</aside><!-- End Sidebar -->

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Sesi Pelatihan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Daftar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="container mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Trainer</th>
                    <th>Tanggal</th>
                    <th>Sesi</th>
                    <th>Waktu</th>
                    <th>Topik</th>
                    <th>Aksi</th> <!-- Kolom Aksi -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data untuk setiap baris
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["trainer_name"] . "</td>
                                <td>" . $row["date"] . "</td>
                                <td>" . $row["session_number"] . "</td>
                                <td>" . $row["time"] . "</td>
                                <td>" . $row["topic"] . "</td>
                                <td>
                                    <a href='edit_sesi.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_sesi.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah anda yakin ingin menghapus sesi?\")'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>Tidak ada sesi pelatihan.</td></tr>"; // Update colspan menjadi 7
                }
                ?>
            </tbody>
        </table>
    </div>
</main><!-- End Main -->

<?php include 'layout/footer.php'; ?>

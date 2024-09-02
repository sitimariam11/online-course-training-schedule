<?php
include 'koneksi.php';

// Check if ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing data for the session
    $sql = "SELECT * FROM sessions WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Session not found!";
        exit;
    }
} else {
    echo "Invalid Request!";
    exit;
}

// Update the session data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $trainer_id = $_POST['trainer_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $topic = $_POST['topic'];

    $sql = "UPDATE sessions SET trainer_id='$trainer_id', date='$date', time='$time', topic='$topic' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: daftar_sesi.php?message=Berhasil mengubah data!");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<?php include 'layout/header.php'; ?>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Kelola Jadwal</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
      </li><!-- End Forms Nav -->

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

  </aside><!-- End Sidebar-->


<main id="main" class="main">
  <div class="pagetitle">
    <h1>Edit Sesi Pelatihan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="daftar_sesi.php">Daftar Sesi</a></li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-15">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Informasi Sesi Pelatihan</h5>

            <!-- Form untuk mengedit sesi -->
            <form action="" method="post">
              <div class="row mb-3">
                <label for="trainer_id" class="col-sm-2 col-form-label">Nama Trainer</label>
                <div class="col-sm-10">
                  <select name="trainer_id" class="form-control">
                    <?php
                    // Fetch trainers for the dropdown
                    $trainer_sql = "SELECT * FROM trainers";
                    $trainer_result = $conn->query($trainer_sql);
                    while ($trainer = $trainer_result->fetch_assoc()) {
                        $selected = $row['trainer_id'] == $trainer['id'] ? 'selected' : '';
                        echo "<option value='" . $trainer['id'] . "' $selected>" . $trainer['name'] . "</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                  <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="time" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="time" name="time" class="form-control" value="<?php echo $row['time']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="topic" class="col-sm-2 col-form-label">Topik</label>
                <div class="col-sm-10">
                  <input type="text" name="topic" class="form-control" value="<?php echo $row['topic']; ?>">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form><!-- End Form Elements -->
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include 'layout/footer.php'; ?>

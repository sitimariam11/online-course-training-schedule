<?php include 'layout/header.php'; ?>


  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


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
          <i class="bi bi-layout-text-window-reverse" a href="rekapitulasi.php"></i><span>Rekapitulasi</span>
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
  <h1>Tambahkan Jadwal Sesi Pelatihan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Tambah</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-15">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Informasi</h5>
          <!-- General Form Elements -->

          <!-- JavaScript alert -->
          <script>
          // Function to get query parameter value
          function getQueryParam(param) {
              const urlParams = new URLSearchParams(window.location.search);
              return urlParams.get(param);
          }

          // Display alert if success parameter is set
          if (getQueryParam('success') === '1') {
              alert('Data berhasil ditambahkan!');
          }
          </script>
            <form action="proses_tambah.php" method="POST">
                <div class="row mb-3">
                    <label for="inputNama" class="col-sm-2 col-form-label">Nama Trainer</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="trainer_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputSesi" class="col-sm-2 col-form-label">Sesi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="session_number" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputWaktu" class="col-sm-2 col-form-label">Waktu</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="time" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputTopik" class="col-sm-2 col-form-label">Topik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="topic" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Tambah</button>
                    </div>
                </div>
            </form>
          <!-- End General Form Elements -->
        </div>
      </div>
    </div>
  </div>
</section>

</main><!-- End #main -->
<?php include 'layout/footer.php'; ?>
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
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="rekapitulasi.php">
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



  </main><!-- End #main -->

<?php include 'layout/footer.php'; ?>
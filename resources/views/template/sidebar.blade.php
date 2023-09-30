<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{ route('home') }}">
      <i class="bi bi-grid"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-heading">Data Master</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('data.master') }}">
      <i class="bi bi-database"></i>
      <span>Data Master</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-heading">Aktifitas</li>
  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pasien</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('pasien.dataPasien') }}">
              <i class="bi bi-circle"></i><span>Data Pasien</span>
            </a>
          </li>
          <li>
            <a href="{{ route('pasien.daftar') }}">
              <i class="bi bi-circle"></i><span>Daftar</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
</aside>
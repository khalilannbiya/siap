<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>admin">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIAP Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0" />

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?= $title == "Dashboard" ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>admin">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider" />

  <!-- Heading -->
  <div class="sidebar-heading">Management</div>

  <!-- Nav Item - Categories -->
  <li class="nav-item <?= $title == "Semua Data Aduan" ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>complaint">
      <i class="fas fa-fw fa-cog"></i>
      <span>Data Aduan</span></a>
  </li>

  <!-- Nav Item - Categories -->
  <li class="nav-item <?= $title == "Tambah Kategori" ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>admin/user">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Data User</span></a>
  </li>

  <!-- Nav Item - Categories -->
  <li class="nav-item <?= $title == "Tambah Kategori" ? "active" : ""; ?>">
    <a class="nav-link" href="<?= base_url(); ?>admin/managementCategories">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Kategori</span></a>
  </li>

  <!-- Nav Item - logoyt -->
  <li class="nav-item ">
    <a class="nav-link" href="<?= base_url(); ?>auth/logout">
      <i class="fas fa-sign-out-alt fa-fw"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block" />

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>




</ul>
<!-- End of Sidebar -->
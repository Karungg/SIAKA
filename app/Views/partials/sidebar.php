<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= site_url('/') ?>">SIAKA</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?= $current_page == 'dashboard' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('/') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
      <li class="menu-header">Master Data</li>
      <li class="<?= $current_page == 'position' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('position') ?>"><i class="fas fa-network-wired"></i> <span>Positions</span></a></li>
      <li class="<?= $current_page == 'employee' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('employee') ?>"><i class="fas fa-user"></i> <span>Employees</span></a></li>
      <li class="<?= $current_page == 'attendance' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('attendance') ?>"><i class="fas fa-clipboard"></i> <span>Attendance</span></a></li>
      <li class="<?= $current_page == 'presence' ? 'active' : '' ?>"><a class="nav-link" href="<?= site_url('presence') ?>"><i class="fas fa-user-check"></i> <span>Presences</span></a></li>
  </aside>
</div>
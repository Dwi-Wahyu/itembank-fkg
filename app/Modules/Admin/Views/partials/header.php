<header class="app-header">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center gap-2 header-left">
      <!-- Burger untuk MOBILE (slide in) -->
      <button class="btn btn-link text-white p-0 d-lg-none" id="btnSidebarMobile" type="button" aria-label="Menu">
        <i class="bi bi-list" style="font-size:1.6rem"></i>
      </button>

      <!-- Brand + tombol mini di sebelah tulisan E-UJIAN -->
      <div class="brand-wrap d-flex align-items-center gap-2">
        <img src="<?= base_url('assets/img/logo_unhas.png') ?>" alt="Logo" class="brand-logo">
        <div class="brand-text">
          <div class="brand-title">E-UJIAN</div>
          <div class="brand-sub">Fakultas Kedokteran Gigi</div>
        </div>
      </div>
    </div>

    <div class="ms-auto d-flex align-items-center gap-3">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" data-bs-toggle="dropdown">
          <i class="bi bi-person-circle me-2"></i>
      
          <span class="fw-semibold"><?= esc($me['name'] ?? 'Admin') ?></span>
          <i class="bi bi-caret-down-fill ms-1 small"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
          <li><a class="dropdown-item" href="<?= base_url('admin/profile') ?>"><i class="bi bi-gear me-2"></i>Profil</a></li>
          <li><a class="dropdown-item" href="<?= base_url('admin/logout') ?>"><i class="bi bi-box-arrow-right me-2"></i>Keluar</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>

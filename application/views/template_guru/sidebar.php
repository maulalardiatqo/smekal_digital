  <!--**********************************
            Sidebar start
        ***********************************-->
  <div class="dlabnav">
      <div class="dlabnav-scroll">
          <ul class="metismenu" id="menu">
              <li><a href="<?= base_url('waka') ?>" aria-expanded="false">
                      <i class="fas fa-home"></i>
                      <span class="nav-text">Dashboard</span>
                  </a>
              </li>
              <li><a href="<?= base_url('waka') ?>" aria-expanded="false">
                      <i class="fas fa-users"></i>
                      <span class="nav-text">Data Guru</span>
                  </a>
              </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-book"></i>
                      <span class="nav-text">Keuangan</span>
                  </a>
                  <ul aria-expanded="false">
                      <li><a href="<?= base_url('admin/uangmasuk') ?>">Pemasukan</a></li>
                      <li><a href="<?= base_url('admin/uangkeluar') ?>">Pengeluaran</a></li>
                      <li><a href="<?= base_url('admin/rekapuang') ?>">Rekap</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->
  <!--**********************************
            Sidebar start
        ***********************************-->
  <div class="dlabnav">
      <div class="dlabnav-scroll">
          <ul class="metismenu" id="menu">
              <li><a href="<?= base_url('admin') ?>" aria-expanded="false">
                      <i class="fas fa-home"></i>
                      <span class="nav-text">Dashboard</span>
                  </a>
              </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-book"></i>
                      <span class="nav-text">Keuangan</span>
                  </a>
                  <ul aria-expanded="false">
                      <li><a href="<?= base_url('admin/pengelolaan') ?>">Pengelolaan</a></li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Pemasukan</a>
                          <ul aria-expanded="false">
                              <li><a href="<?= base_url('admin/uangmasuk') ?>">Pemasukan Tetap</a></li>
                              <li><a href="<?= base_url('admin/lainya') ?>">Lainya</a></li>
                          </ul>
                      </li>
                      <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Pengeluaran</a>
                          <ul aria-expanded="false">
                              <li><a href="ecom-product-grid.html">GAJI KARYAWAN</a></li>
                              <li><a href="ecom-invoice.html">LAINYA</a></li>
                          </ul>
                      </li>
                      <li><a href="<?= base_url('admin/rekapuang') ?>">Rekap</a></li>
                  </ul>
              </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-envelope"></i>
                      <span class="nav-text">Surat</span>
                  </a>
                  <ul aria-expanded="false">
                      <li><a href="<?= base_url('admin/suratmasuk') ?>">Masuk</a></li>
                      <li><a href="<?= base_url('admin/suratkeluar') ?>">Keluar</a></li>
                      <li><a href="<?= base_url('admin/rekapsurat') ?>">Rekap</a></li>
                  </ul>
              </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-info-circle"></i>
                      <span class="nav-text">Inventaris</span>
                  </a>
                  <ul aria-expanded="false">
                      <li><a href="<?= base_url('admin/lab') ?>">Lab Komputer</a></li>
                      <li><a href="<?= base_url('admin/perbankan') ?>">Perbankan</a></li>
                      <li><a href="<?= base_url('admin/bengkel') ?>">Bengkel</a></li>
                  </ul>
              </li>
              <li><a href="<?= base_url('admin/guru') ?>" aria-expanded=" false">
                      <i class="fas fa-user"></i>
                      <span class="nav-text">Guru</span>
                  </a>
              </li>
              <li><a href="<?= base_url('admin/siswa') ?>" aria-expanded=" false">
                      <i class="fas fa-user"></i>
                      <span class="nav-text">Siswa</span>
                  </a>
              </li>
              <li><a href="<?= base_url('admin/kelas') ?>" aria-expanded=" false">
                      <i class="fas fa-book-open"></i>
                      <span class="nav-text">Kelola PRODI/KELAS</span>
                  </a>
              </li>
              <li><a href="<?= base_url('admin/pengguna') ?>" aria-expanded=" false">
                      <i class="fas fa-users"></i>
                      <span class="nav-text">Kelola Pengguna</span>
                  </a>
              </li>
              <li><a href="<?= base_url('admin/website') ?>" aria-expanded=" false">
                      <i class="fas fa-globe"></i>
                      <span class="nav-text">Kelola Website</span>
                  </a>
              </li>
      </div>
  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->
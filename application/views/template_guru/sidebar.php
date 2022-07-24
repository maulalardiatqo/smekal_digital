  <!--**********************************
            Sidebar start
        ***********************************-->
  <div class="dlabnav">
      <div class="dlabnav-scroll">
          <ul class="metismenu" id="menu">
              <li><a href="<?= base_url('guru') ?>" aria-expanded="false">
                      <i class="fas fa-home"></i>
                      <span class="nav-text">Dashboard</span>
                  </a>
              </li>
              <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                      <i class="fas fa-book"></i>
                      <span class="nav-text">Administrasi</span>
                  </a>
                  <ul aria-expanded="false">
                      <li><a href="<?= base_url('guru/prota') ?>">PROTA</a></li>
                      <li><a href="<?= base_url('guru/promes') ?>">PROMES</a></li>
                      <li><a href="<?= base_url('guru/silabus') ?>">SILABUS</a></li>
                      <li><a href="<?= base_url('guru/rpp') ?>">RPP</a></li>
                      <li><a href="<?= base_url('guru/nilaiSiswa') ?>">NILAI SISWA</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->
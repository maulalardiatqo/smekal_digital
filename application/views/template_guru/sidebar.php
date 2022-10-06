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
              <li><a href="<?= base_url('guru/gaji') ?>" aria-expanded="false">
                      <i class="fas fa-wallet"></i>
                      <span class="nav-text">Gaji</span>
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
              <?php
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $guru = $this->db->get_where('guru', ['kode' => $this->session->userdata('username')])->row_array();
                $kelas = $this->db->get_where('kelas', ['walas' => $guru['id']])->result_array();

                if ($kelas) {
                    echo '
                    <li>
                    <a href="' .  ' guru/walas '  . '">
                    <i class="fas fa-book"></i>
                    <span class="nav-text">Wali Kelas</a></span>
                </li>';
                }
                ?>
          </ul>
      </div>
  </div>
  <!--**********************************
            Sidebar end
        ***********************************-->
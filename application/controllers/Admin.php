<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('siswaModel');
        $this->load->helper('date');
    }
    public function index()
    {

        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template_admin/footer');
    }
    public function lainya()
    {
        $data['judul'] = 'Kelola Pengguna';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/lainya', $data);
        $this->load->view('template_admin/footer');
    }
    public function pengguna()
    {
        $data['judul'] = 'Kelola Pengguna';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengguna'] = $this->db->get('user')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('template_admin/footer');
    }
    public function guru()
    {
        $data['judul'] = 'Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('guru.*,rfgeneral.desc');
        $this->db->from('guru');
        $this->db->join('rfgeneral', 'guru.jabatan = rfgeneral.id', 'left');
        $data['guru'] = $this->db->get()->result_array();
        $data['jabatan'] = $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();
        $data['js'] = 'guru';
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahGuru()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'gender' => $this->input->post('gender'),
            'jabatan' => $this->input->post('jabatan'),
            'kontak' => $this->input->post('kontak'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'salary_per_hour' => $this->input->post('salary_per_hour'),
            'jam_kerja' => $this->input->post('jam_kerja'),
        ];
        $role_id = $this->input->post('role_id');
        $password = password_hash($data['kode'], PASSWORD_DEFAULT);
        $this->db->insert('guru', $data);
        if ($role_id) {
            $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[kode]', '$password', '$role_id', 1, now())");
        }
        $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function hapusGuru($kode)
    {
        $sql = "DELETE g.*, u.* FROM guru g, user u WHERE g.kode = $kode AND u.username = $kode";
        $this->db->query($sql, [$kode]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function editGuru($kode)
    {
        $data['judul'] = 'Edit Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['kode' => $kode])->result_array();
        $data['jabatan'] = $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editGuru', $data);
        $this->load->view('template_admin/footer');
    }
    public function updateGuru($kode)
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'gender' => $this->input->post('gender'),
            'jabatan' => $this->input->post('jabatan'),
            'kontak' => $this->input->post('kontak'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'salary_per_hour' => $this->input->post('salary_per_hour'),
            'jam_kerja' => $this->input->post('jam_kerja'),
        ];
        $this->db->update('guru', $data, ['kode' => $kode]);
        $this->session->set_flashdata('flash', 'Update Berhasil');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/guru');
    }
    public function siswa()
    {
        $data['judul'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahSiswa()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'is_unique[siswa.nis]|required');
        $data = [
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'kelas' => $this->input->post('kelas'),
            'kontak' => $this->input->post('kontak'),
            'tahun_masuk' => $this->input->post('tahun_masuk')
        ];
        $password = password_hash($data['nis'], PASSWORD_DEFAULT);
        $cek = $this->input->post('nis');
        $cek1 = $this->input->post('nama');
        $cek2 = $this->input->post('nis');
        $cek3 = $this->input->post('nisn');
        $cek4 = $this->input->post('alamat');
        $cek5 = $this->input->post('gender');
        $cek6 = $this->input->post('nama_ibu');
        $cek7 = $this->input->post('kelas');
        $cek8 = $this->input->post('kontak');
        $cek9 = $this->input->post('tahun_masuk');
        $selec = 'Please select';
        $kosong = '';
        $query = $this->db->get('siswa')->row_array();
        if ($cek == $query['nis']) {
            $this->session->set_flashdata('flash', 'NIS Sudah Terdaftar');
            $this->session->set_flashdata('flashtype', 'info');

            redirect('admin/siswa');
        } elseif ($cek == $kosong || $cek1 == $kosong || $cek2 == $kosong || $cek3 == $kosong || $cek4 == $kosong || $cek6 == $kosong || $cek8 == $kosong || $cek9 == $kosong) {
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');
        } elseif ($cek5 == $selec) {
            $this->session->set_flashdata('flash', 'Anda Belum Memilih Jenis Kelamin');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('admin/siswa');
        } elseif ($cek7 == $selec) {
            $this->session->set_flashdata('flash', 'Anda Belum Memilih kelas');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('admin/siswa');
        } else {
            $this->db->insert('siswa', $data);
            $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[nis]', '$password', 5, 1, now())");
            $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
            $this->session->set_flashdata('flashtype', 'success');
        }
        redirect('admin/siswa');
    }
    public function uploadSiswa()
    {
        //uplad file
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['file_name'] = 'siswa' . time();
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();

            $reader = ReaderEntityFactory::createXLSXReader();
            $reader->open('uploads/' . $file['file_name']);
            foreach ($reader->getSheetIterator() as $sheet) {
                $numrow = 1;
                foreach ($sheet->getRowIterator() as $row) {
                    $passwordU = password_hash($row->getCellAtIndex(1), PASSWORD_DEFAULT);
                    if ($numrow > 1) {
                        $dataSiswa = array(
                            'nama' => $row->getCellAtIndex(0),
                            'nis' => $row->getCellAtIndex(1),
                            'nisn' => $row->getCellAtIndex(2),
                            'alamat' => $row->getCellAtIndex(3),
                            'gender' => $row->getCellAtIndex(4),
                            'nama_ibu' => $row->getCellAtIndex(5),
                            'kelas' => $row->getCellAtIndex(6),
                            'kontak' => $row->getCellAtIndex(7),
                            'tahun_masuk' => $row->getCellAtIndex(8),
                        );
                        $dataUser = array(
                            'nama' => $row->getCellAtIndex(0),
                            'foto' => 'user_default.png',
                            'username' => $row->getCellAtIndex(1),
                            'password' => $passwordU,
                            'role_id' => 5,
                            'is_active' => 1,
                            'date_create' => now(),
                        );
                        if ($dataSiswa['nis']) {
                            $this->siswaModel->import_data($dataSiswa, $dataUser);
                        }
                    }
                    $numrow++;
                }
                $reader->close();
                unlink('uploads/' . $file['file_name']);
                $this->session->set_flashdata('flash', 'Data Berhasil di Upload');
                $this->session->set_flashdata('flashtype', 'success');
            }
        } else {
            echo "Error :" . $this->upload->display_errors();
            $this->session->set_flashdata('flash', 'NIS Sudah terdaftar');
            $this->session->set_flashdata('flashtype', 'info');
        };
        redirect('admin/siswa');
    }
    public function hapusSiswa($nis)
    {
        $sql = "DELETE s.*, u.* FROM siswa s, user u WHERE s.nis = $nis AND u.username = $nis";
        $this->db->query($sql, [$nis]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/siswa');
    }
    public function editSiswa($nis)
    {
        $data['judul'] = 'Edit Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['nis' => $nis])->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editSiswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function updateSiswa($nis)
    {
        $siswa = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
        $selec1 = $this->input->post('gender');
        $selec2 = $this->input->post('kelas');
        $d = 'Please select';
        if ($selec1 == $d) {
            $data = [
                'nama' => $this->input->post('nama'),
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'alamat' => $this->input->post('alamat'),
                'gender' => $siswa['gender'],
                'nama_ibu' => $this->input->post('nama_ibu'),
                'kelas' => $this->input->post('kelas'),
                'kontak' => $this->input->post('kontak'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
            ];
            $this->db->where('nis', $nis);
            $this->db->update('siswa', $data);
            $this->session->set_flashdata('flash', 'Berhasil Update Data');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/siswa');
        } elseif ($selec2 == $d) {
            $data = [
                'nama' => $this->input->post('nama'),
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'alamat' => $this->input->post('alamat'),
                'gender' => $this->input->post('gender'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'kelas' => $siswa['kelas'],
                'kontak' => $this->input->post('kontak'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
            ];
            $this->db->where('nis', $nis);
            $this->db->update('siswa', $data);
            $this->session->set_flashdata('flash', 'Berhasil Update Data');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/siswa');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nis' => $this->input->post('nis'),
                'nisn' => $this->input->post('nisn'),
                'alamat' => $this->input->post('alamat'),
                'gender' => $this->input->post('gender'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'kelas' => $this->input->post('kelas'),
                'kontak' => $this->input->post('kontak'),
                'tahun_masuk' => $this->input->post('tahun_masuk'),
            ];
            $this->db->where('nis', $nis);
            $this->db->update('siswa', $data);
            $this->session->set_flashdata('flash', 'Berhasil Update Data');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/siswa');
        }
    }
    public function pengelolaan()
    {
        $data['judul'] = 'Pengelolaan Keungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenispemasukan'] = $this->db->get('jenispemasukan')->result_array();
        $data['jenispengeluaran'] = $this->db->get('jenispengeluaran')->result_array();
        $data['js'] = 'pengelolaan';

        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pengelolaan', $data);
        $this->load->view('template_admin/footer');
    }

    public function savejeniskeuangan()
    {
        $type = $this->input->post('type');
        $data = [
            'id' => $this->input->post('id'),
            'desc' => $this->input->post('desc'),
        ];

        $save = $this->db->replace($type, $data);
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/pengelolaan');
    }

    public function deletejeniskeuangan($type, $id)
    {
        $this->db->delete($type, ['id' => $id]);
        $this->session->set_flashdata('flash', 'Berhasil Delete Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/pengelolaan');
    }


    public function uangmasuk($jenispemasukan = null)
    {
        $data['judul'] = 'Pemasukan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis_pemasukan'] = $this->db->get('jenispemasukan')->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['js'] = 'uangmasuk';
        $this->db->select('pemasukan.*,jenispemasukan.desc');
        $this->db->from('pemasukan');
        $this->db->join('jenispemasukan', 'pemasukan.type = jenispemasukan.id', 'left');
        if ($jenispemasukan) {
            if ($jenispemasukan == 'all') {
                $this->db->where('pemasukan.type !=', 'lainya');
            } else {
                $this->db->where('pemasukan.type', $jenispemasukan);
            }
        }
        $data['pemasukan'] = $query = $this->db->get()->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function savepemasukan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'type' => $this->input->post('type'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_guru' => $this->input->post('id_guru'),
            'tanggal_pemasukan' => $this->input->post('tanggal_pemasukan'),
        ];
        $save = $this->db->replace('pemasukan', $data);
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/uangmasuk');
    }

    public function deletepemasukan($id)
    {
        $this->db->delete('pemasukan', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Berhasil Delete Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/uangmasuk');
    }

    public function uangkeluar()
    {
        $data['judul'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis_pemasukan'] = $this->db->get_where('jenispengeluaran')->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['js'] = 'uangkeluar';
        $this->db->select('pengeluaran.*,jenispengeluaran.desc');
        $this->db->from('pengeluaran');
        $this->db->join('jenispengeluaran', 'pengeluaran.type = jenispengeluaran.id');
        $data['pengeluaran'] = $query = $this->db->get()->result_array();;
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangkeluar', $data);
        $this->load->view('template_admin/footer');
    }

    public function savepengeluaran()
    {
        $data = [
            'id' => $this->input->post('id'),
            'type' => $this->input->post('type'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_guru' => $this->input->post('id_guru'),
            'tanggal_pengeluaran' => $this->input->post('tanggal_pengeluaran'),
            'status_gaji' => $this->input->post('status_gaji')
        ];
        $save = $this->db->replace('pengeluaran', $data);
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/uangkeluar');
    }

    public function deletepengeluaran($id)
    {
        $this->db->delete('pengeluaran', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Berhasil Delete Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/uangkeluar');
    }

    public function masterjabatan()
    {
        $data['judul'] = 'Master Jabatan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['js'] = 'masterjabatan';
        $this->db->select('rfgeneral.*,user_role.role');
        $this->db->join('user_role', 'rfgeneral.role_id = user_role.id', 'left');
        $data['jabatan'] =  $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();
        $data['roles'] =  $this->db->get_where('user_role', ['role !=' => 'siswa'])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/masterjabatan', $data);
        $this->load->view('template_admin/footer');
    }

    public function savemasterjabatan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'type' => 'jabatan',
            'desc' => $this->input->post('desc'),
            'role_id' => $this->input->post('role_id')
        ];
        $save = $this->db->replace('rfgeneral', $data);
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/masterjabatan');
    }

    public function deletemasterjabatan($id)
    {
        $this->db->delete('rfgeneral', ['id' => $id]);
        $this->session->set_flashdata('flash', 'Berhasil Delete Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/masterjabatan');
    }

    public function rekapuang()
    {
        $data['judul'] = 'Rekap / Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['rekap'] = [];
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rekapuang', $data);
        $this->load->view('template_admin/footer');
    }
    public function suratmasuk()
    {
        $data['judul'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->db->get_where('surat', ['jenis' => '1'])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function inputSuratM()
    {
        $cek = $this->input->post('nomor_surat');
        $cek1 = $this->input->post('nama_surat');
        $cek2 = $this->input->post('tanggal_surat');
        $cek3 = $this->input->post('keterangan');
        $cek4 = $this->input->post('dari');
        $cek5 = $this->input->post('untuk');
        $tidak = '';

        if ($cek == $tidak || $cek1 == $tidak || $cek2 == $tidak || $cek3 == $tidak || $cek4 == $tidak || $cek5 == $tidak) {
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');

            redirect('admin/suratmasuk');
        } else {
            $data = [
                'nomor_surat' => $this->input->post('nomor_surat'),
                'nama_surat' => $this->input->post('nama_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'keterangan' => $this->input->post('keterangan'),
                'dari' => $this->input->post('dari'),
                'untuk' => $this->input->post('untuk'),
                'jenis' => '1',
            ];
            $this->db->insert('surat', $data);
            $this->session->set_flashdata('flash', 'Surat Masuk Berhasil Ditambahkan');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/suratmasuk');
        }
    }
    public function hapusSurat($id_surat, $hal)
    {
        $this->db->delete('surat', ['id_surat' => $id_surat]);
        $this->session->set_flashdata('flash', 'Surat Dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/' . $hal);
    }
    public function suratkeluar()
    {
        $data['judul'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->db->get_where('surat', ['jenis' => '2'])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratkeluar', $data);
        $this->load->view('template_admin/footer');
    }
    public function inputSuratK()
    {

        $cek = $this->input->post('nomor_surat');
        $cek1 = $this->input->post('nama_surat');
        $cek2 = $this->input->post('tanggal_surat');
        $cek3 = $this->input->post('keterangan');
        $cek4 = $this->input->post('dari');
        $cek5 = $this->input->post('untuk');
        $tidak = '';

        if ($cek == $tidak || $cek1 == $tidak || $cek2 == $tidak || $cek3 == $tidak || $cek4 == $tidak || $cek5 == $tidak) {
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');

            redirect('admin/suratkeluar');
        } else {
            $data = [
                'nomor_surat' => $this->input->post('nomor_surat'),
                'nama_surat' => $this->input->post('nama_surat'),
                'tanggal_surat' => $this->input->post('tanggal_surat'),
                'keterangan' => $this->input->post('keterangan'),
                'dari' => $this->input->post('dari'),
                'untuk' => $this->input->post('untuk'),
                'jenis' => '2',
            ];
            $this->db->insert('surat', $data);
            $this->session->set_flashdata('flash', 'Surat Masuk Berhasil Ditambahkan');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/suratkeluar');
        }
    }
    public function rekapsurat()
    {
        $data['judul'] = 'Rekap / Laporan Surat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->db->get('surat')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rekapsurat', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahProdi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi')
        ];
        $prodi = $this->input->post('nama_prodi');
        $ga = '';
        if ($prodi == $ga) {
            $this->session->set_flashdata('flash', 'Anda Belum Mengetik Apapun');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('admin/kelas');
        } else {
            $this->db->insert('prodi', $data);
            $this->session->set_flashdata('flash', 'Data Berhasil Di Tambah');
            $this->session->set_flashdata('flashtype', 'success');
        }


        redirect('admin/kelas');
    }
    public function kelas()
    {
        $data['judul'] = 'Kelas dan Prodi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();

        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.id = kelas.walas');
        $data['kelas'] = $this->db->get()->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahKelas()
    {
        $data = [
            'tingkat' => $this->input->post('tingkat'),
            'prodi' => $this->input->post('prodi'),
            'rombel' => $this->input->post('rombel'),
            'walas' => $this->input->post('walas'),
        ];
        $coba = $this->input->post('tingkat');
        $coba2 = $this->input->post('prodi');
        $coba3 = $this->input->post('rombel');
        $coba4 = $this->input->post('walas');
        $tidak = 'Please select';
        if ($coba == $tidak || $coba2 == $tidak || $coba3 == $tidak || $coba4 == $tidak) {
            $this->session->set_flashdata('flash', 'Anda Belum Memilih Data');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('admin/kelas');
        } else {
            $this->db->insert('Kelas', $data);
            $this->session->set_flashdata('flash', 'Data Berhasil Di Tambah');
            $this->session->set_flashdata('flashtype', 'success');
        }


        redirect('admin/kelas');
    }
    public function hapusKelas($id)
    {
        $sql = "DELETE FROM kelas WHERE id = $id";
        $this->db->query($sql, [$id]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/kelas');
    }
    public function lab()
    {
        $kode = 1;
        $data['judul'] = 'Inventaris Lab Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/lab', $data);
        $this->load->view('template_admin/footer');
    }
    public function perbankan()
    {
        $kode = 2;
        $data['judul'] = 'Inventaris Perbankan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/perbankan', $data);
        $this->load->view('template_admin/footer');
    }
    public function bengkel()
    {
        $kode = 3;
        $data['judul'] = 'Inventaris Bengkel (TKR)';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/bengkel', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahInventaris($hal)
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama_barang' => $this->input->post('nama_barang'),
            'spek' => $this->input->post('spek'),
            'kondisi' => $this->input->post('kondisi'),
            'jumlah' => $this->input->post('jumlah'),
            'tempat' => $this->input->post('tempat')
        ];
        $this->db->insert('inventaris', $data);
        $this->session->set_flashdata('flash', 'Data Berhasil Di Tambah');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/' . $hal);
    }
    public function hapusInventaris($id_inventaris, $hal)
    {
        $sql = "DELETE FROM inventaris WHERE id_inventaris = $id_inventaris";
        $this->db->query($sql, [$id_inventaris]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/' . $hal);
    }

    public function gaji()
    {
        $data['judul'] = 'Gaji Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->db->select('guru.*,rfgeneral.desc,pengeluaran.jumlah,pengeluaran.tanggal_pengeluaran');
        $this->db->from('guru');
        $this->db->join('rfgeneral', 'guru.jabatan = rfgeneral.id', 'left');
        $this->db->join('pengeluaran', 'guru.id = pengeluaran.id_guru', 'left');
        $data['guru'] = $this->db->get()->result_array();
        $data['jabatan'] = $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();
        // $this->db->select('guru.*,rfgeneral.desc,pengeluaran.jumlah,pengeluaran.tanggal_pengeluaran');
        // $this->db->from('guru');
        // $this->db->join('rfgeneral', 'guru.jabatan = rfgeneral.id', 'left');
        // $this->db->join('pengeluaran', 'guru.id = pengeluaran.id_guru', 'left');
        $query  = "SELECT G.*,RG.desc,P.jumlah,P.tanggal_pengeluaran,P.status_gaji FROM guru G LEFT JOIN rfgeneral RG ON RG.id = G.jabatan LEFT JOIN pengeluaran P ON P.id_guru = G.id AND MONTH(P.tanggal_pengeluaran) = MONTH(NOW())";

        $data['guru'] = $this->db->query($query)->result_array();
        $data['jabatan'] = $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();

        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/gajikaryawan', $data);
        $this->load->view('template_admin/footer');
    }
    public function absen()
    {
        $data['judul'] = 'Absensi Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/absen', $data);
        $this->load->view('template_admin/footer');
    }
}

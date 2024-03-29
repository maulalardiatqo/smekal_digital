<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('1');
        $this->load->library('form_validation');
        $this->load->model('SiswaModel');
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
    public function resetPassword($id)
    {
        $this->db->set('password', password_hash('Smekal123', PASSWORD_DEFAULT));
        $this->db->where('id', $id);
        $this->db->update('user');
        $this->session->set_flashdata('flash', 'Password berhasil di reset');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/pengguna');
    }
    public function editUser($id)
    {
        $data['judul'] = 'Edit User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userS'] = $this->db->get_where('user', ['id' => $id])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editUser', $data);
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
        $data['pengguna'] = $this->db->get_where('user', ['is_active' => 1])->result_array();
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
        $password = password_hash('Smekal123', PASSWORD_DEFAULT);
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
        $sql = "DELETE g.*, u.* FROM guru g, user u WHERE g.kode = $kode AND u.username = '$kode'";
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
        $this->db->select('siswa.*,kelas.tingkat,kelas.prodi,kelas.rombel');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.kelas = kelas.id_kelas');
        $this->db->where('siswa.is_active = 1');
        $data['siswa'] = $this->db->get()->result_array();
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
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'is_active' => 1,
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
                            $this->siswamodel->import_data($dataSiswa, $dataUser);
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
    public function naik()
    {
        // var_dump($_POST);die;
        $to = $this->input->post('to');
        $inputan = $_POST;
        foreach ($inputan as $key => $siswa) {
            if ($key != "to" || $key != "example_length" || $key != "naik") {
                $this->db->where('id', $key);
                $this->db->update('siswa', ['kelas' => $to]);
            }
        }
        $this->session->set_flashdata('flash', 'Berhasil Update Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/siswa');
    }
    public function lulus()
    {
        $data['judul'] = 'Luluskan Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('siswa.*,kelas.tingkat,kelas.prodi,kelas.rombel');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.kelas = kelas.id_kelas');
        $this->db->where('siswa.is_active = 1');
        $data['siswa'] = $this->db->get()->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/lulus', $data);
        $this->load->view('template_admin/footer');
    }
    public function siswaLulus()
    {

        $data = [
            'a.is_active' => 0,
            'b.is_active' => 0
        ];
        $inputan = $_POST;
        foreach ($inputan as $key => $siswa) {
            if ($key != "to" || $key != "example_length" || $key != "naik") {
                $sql = "UPDATE siswa, user SET siswa.is_active = 0, user.is_active = 0 WHERE siswa.nis = user.username";
                $this->db->query($sql);
            }
        }
        $this->session->set_flashdata('flash', 'Berhasil Update Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/siswa');
    }
    public function alumni()
    {
        $data['judul'] = 'Alumni';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.kelas = kelas.id_kelas');
        $this->db->where('siswa.is_active = 0');
        $data['alumni'] = $this->db->get()->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/alumni', $data);
        $this->load->view('template_admin/footer');
    }
    public function pengelolaan()
    {
        $data['judul'] = 'Pengelolaan Keungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenispemasukan'] = $this->db->get('jenispemasukan')->result_array();
        $data['jenispengeluaran'] = $this->db->get('jenispengeluaran')->result_array();
        $data['js'] = 'pengelolaan';
        $data['spp'] = $this->db->get('spp_master')->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();

        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pengelolaan', $data);
        $this->load->view('template_admin/footer');
    }
    public function saveSPP()
    {
        $data = [
            'id' => $this->input->post('id'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'jumlah' => $this->input->post('jumlah'),
        ];

        $save = $this->db->replace('spp_master', $data);
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/pengelolaan');
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
        $querySiswa = $this->db->select('siswa.*,spp_master.jumlah')
            ->from('siswa')
            ->where('is_active' == 1)
            ->join('spp_master', 'siswa.tahun_masuk = spp_master.tahun_masuk', 'left')->get()->result_array();
        $data['siswa'] = $querySiswa;

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
        $this->load->view('template_admin/number_format');
    }
    public function pemasukan_Siswa()
    {
        $data['judul'] = 'Pemasukan Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemasukan'] = $this->db->get('tb_pemasukan_siswa')->result_array();
        $this->db->select('siswa.*,kelas.tingkat,kelas.prodi,kelas.rombel');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.kelas = kelas.id_kelas');
        $this->db->where('siswa.is_active = 1');
        $data['siswa'] = $this->db->get()->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pemasukan_siswa', $data);
        $this->load->view('template_admin/footer');
        $this->load->view('template_admin/number_format');
    }

    public function pemasukan_lain()
    {
        $data['judul'] = 'Pemasukan Lain';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pemasukan'] = $this->db->get('tb_pemasukan')->result_array();
        
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pemasukan_lain', $data);
        $this->load->view('template_admin/footer');
        $this->load->view('template_admin/number_format');
    }

    public function inputPemasukanLain()
    {
        $tanggal = $this->input->post('tanggal_pemasukan');
        $jumlahPemasukan = $this->input->post('jumlah_pemasukan');
        $quareyMaster = $this->db->select('total_amount')
                            ->from('tb_keuangan_master')
                            ->order_by('total_amount')
                            ->limit(1)
                            ->get();
        if($quareyMaster->num_rows() > 0){
            $totalAmount = $quareyMaster->row()->total_amount;
            $sumTotalAmount = $totalAmount + $jumlahPemasukan;
            
        }else{
            $sumTotalAmount = $jumlahPemasukan;
        }
        $query = $this->db->select('no_pemasukan')
                        ->from('tb_pemasukan')
                        ->order_by('no_pemasukan', 'DESC')
                        ->limit(1)
                        ->get();
    
        if ($query->num_rows() > 0) {
            $latestNoTransaksi = $query->row()->no_pemasukan;
            preg_match('/\d+/', $latestNoTransaksi, $matches);
            $lastNumber = substr($latestNoTransaksi, -4);

            $newNumber = (int)$lastNumber + 1;
    
            // Convert $newNumber to 4 digits
            $formattedNumber = str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    
            // Generate the new formatted no_pemasukan
            $month = date('m', strtotime($tanggal));
            $year = date('y', strtotime($tanggal));
            $year = str_pad($year, 2, '0', STR_PAD_LEFT);
    
            $newNoTransaksi = 'transin_' . $month . $year . $formattedNumber;
        } else {
            // Handle the case when no previous transactions exist
            $month = date('m', strtotime($tanggal));
            $year = date('y', strtotime($tanggal));
            $year = str_pad($year, 2, '0', STR_PAD_LEFT);
            $newNoTransaksi = 'transin_' . $month . $year . '0001';
        }
       
        $ket = $this->input->post('ket');
        if($tanggal == '' || $jumlahPemasukan == '' || $ket == ''){
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');

            redirect('admin/pemasukan_lain');
        }else{
            $data = [
                'no_pemasukan' => $newNoTransaksi,
                'tanggal_pemasukan' => $tanggal,
                'jumlah_pemasukan' => $jumlahPemasukan,
                'keterangan' => $ket
            ];
            $dataToMaster = [
                'no_trans' => $newNoTransaksi,
                'jen_trans' => 'Pemasukan Lain',
                'tanggal_trans' => $tanggal,
                'trans_id' => $jumlahPemasukan,
                'trans_out' => 0,
                'total_amount' => $sumTotalAmount,
                'ket' => $ket
            ];
            $this->db->insert('tb_keuangan_master', $dataToMaster);
            $this->db->insert('tb_pemasukan', $data);
            $this->session->set_flashdata('flash', 'Berhasil Input Tansaksi Masusk Dengan No '.$newNoTransaksi);
            $this->session->set_flashdata('flashtype', 'success');
            redirect('admin/pemasukan_lain');
        }
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

    // Tagihan

    public function tagihan()
    {
        $data['judul'] = 'Master Tagihan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tagihan'] = $this->db->get('tb_tagihan')->result_array();
        $data['js'] = 'tb_tagihan';
        // $this->db->select('pemasukan.*,jenispemasukan.desc');
        // $this->db->from('pemasukan');
        // $this->db->join('jenispemasukan', 'pemasukan.type = jenispemasukan.id', 'left');
        // if ($jenispemasukan) {
        //     if ($jenispemasukan == 'all') {
        //         $this->db->where('pemasukan.type !=', 'lainya');
        //     } else {
        //         $this->db->where('pemasukan.type', $jenispemasukan);
        //     }
        // }
        // $data['pemasukan'] = $query = $this->db->get()->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tagihan', $data);
        $this->load->view('template_admin/footer');
        $this->load->view('template_admin/number_format');
    }

    public function savetagihan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'title' => $this->input->post('title'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_input' => $this->input->post('tanggal_input'),
            'tanggal_tenggang' => $this->input->post('tanggal_tenggang'),
            'desc' => $this->input->post('desc')
        ];
        $save = $this->db->replace('tagihan', $data);
        $insert_id = $this->db->insert_id();
        $this->session->set_flashdata('flash', 'Berhasil Save Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/tagihandetail/' . $insert_id);
    }

    public function savetagihandetail()
    {
        $siswaChecked = $this->input->post();
        // query delete All Tagihan Detail that does not have value on Bayar Field
        $this->db->delete('tagihan_detail', ['id_tagihan' => $this->input->post('id_tagihan'), 'bayar' => null]);
        // Insert Tagihan Detail
        foreach ($siswaChecked as $key => $siswa) {
            $dataInsert = array(
                "id_tagihan" => $this->input->post('id_tagihan'),
                "to" => $key
            );
            if ($key != "id_tagihan") {
                $isAlreadyExist = $this->db->get_where('tagihan_detail', ['to' => $dataInsert['to'], 'id_tagihan' => $this->input->post('id_tagihan')])->num_rows();
                if ($isAlreadyExist == 0) {
                    $this->db->insert('tagihan_detail', $dataInsert);
                }
            }
        }
        redirect('admin/tagihandetail/' . $this->input->post('id_tagihan'));
    }

    public function bayartagihan()
    {
        $id = $this->input->post('id');
        $data = [
            "bayar" => $this->input->post('bayar') + $this->input->post('sudahdibayar'),
            "status" => $this->input->post('kurang') > 0 ? 0 : 1,
            "tanggal_bayar" => date('Y m d'),
        ];
        $this->db->update('tagihan_detail', $data, ['id' => $id]);
        // insert into pemasukan
        $data = [
            'jumlah' => $this->input->post('bayar'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('to'),
            'id_guru' => null,
            'tanggal_pemasukan' => date('Y m d'),
        ];
        $save = $this->db->replace('pemasukan', $data);
        // END INSERT PEMASUKAN

        $this->session->set_flashdata('flash', 'Update Berhasil');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/tagihandetail/' . $this->input->post('id_tagihan'));
    }

    public function tagihandetail($id)
    {
        $data['judul'] = 'Tagihan Detail';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->select('tagihan_detail.*,siswa.nama');
        $this->db->from('tagihan_detail');
        $this->db->join('siswa', 'tagihan_detail.to = siswa.id', 'left');
        $this->db->where('tagihan_detail.id_tagihan', $id);
        $this->db->where('siswa.is_active', '1');
        $data['tagihan_detail'] = $this->db->get()->result_array();
        // var_dump($data['tagihan_detail']);
        // die;
        $data['tagihan'] = $this->db->get_where('tagihan', array('id' => $id))->row_array();
        $dataSiswa = [];
        $querySiswa = $this->db->get('siswa')->result_array();
        foreach ($querySiswa as $qs) {
            if ($dataSiswa > 0) {
                $cek = 0;
                $index = null;
                foreach ($dataSiswa as $key => $ds) {
                    if ($ds['kelas'] == $qs['kelas']) {
                        $cek++;
                        $index = $key;
                    }
                }

                if ($cek > 0) {
                    array_push($dataSiswa[$index]['detail'], [
                        "id" => $qs['id'],
                        "nama" => $qs['nama']
                    ]);
                } else {
                    array_push($dataSiswa, array(
                        "kelas" => $qs['kelas'],
                        "detail" => [[
                            "id" => $qs['id'],
                            "nama" => $qs['nama']
                        ]]
                    ));
                }
            } else {
                array_push($dataSiswa, array(
                    "kelas" => $qs['kelas'],
                    "detail" => [[
                        "id" => $qs['id'],
                        "nama" => $qs['nama']
                    ]]
                ));
            }
        }

        $data['siswa'] = $dataSiswa;
        $data['js'] = 'tagihan_detail';
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/tagihan_detail', $data);
        $this->load->view('template_admin/footer');
        $this->load->view('template_admin/number_format');
    }

    public function deletetagihan($id)
    {
        $this->db->delete('tagihan', ['id' => $id]);
        $this->db->delete('tagihan_detail', ['id_tagihan' => $id]);
        $this->session->set_flashdata('flash', 'Berhasil Delete Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/tagihan');
    }
    // Tagihan End

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
        $this->load->view('template_admin/number_format');
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
       
        $data['rekap'] = $this->db->get('tb_keuangan_master')->result_array();

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
        $this->db->select('*');
        $this->db->from('prodi');
        $this->db->join('guru', 'guru.kode = prodi.ka_prodi');
        $data['prodi'] = $this->db->get()->result_array();

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
        $sql = "DELETE FROM kelas WHERE id_kelas = $id";
        $this->db->query($sql, [$id]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/kelas');
    }
    public function editKelas($id)
    {
        $data['judul'] = 'Edit Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id])->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/editKelas', $data);
        $this->load->view('template_admin/footer');
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waka extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('3');
        $this->load->library('form_validation');
        $this->load->helper('date');
    }
    public function index()
    {

        $data['judul'] = 'Dashboard Waka Kurikulum';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/index', $data);
        $this->load->view('template_waka/footer');
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
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/guru', $data);
        $this->load->view('template_waka/footer');
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

        redirect('waka/guru');
    }
    public function editGuru($kode)
    {
        $data['judul'] = 'Edit Karyawan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get_where('guru', ['kode' => $kode])->result_array();
        $data['jabatan'] = $this->db->get_where('rfgeneral', ['type' => 'jabatan'])->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/editGuru', $data);
        $this->load->view('template_waka/footer');
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
        redirect('waka/guru');
    }
    public function hapusGuru($kode)
    {
        $sql = "DELETE g.*, u.* FROM guru g, user u WHERE g.kode = $kode AND u.username = '$kode'";
        $this->db->query($sql, [$kode]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('waka/guru');
    }
    public function siswa()
    {
        $data['judul'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get_where('siswa', ['is_active' => '1'])->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/siswa', $data);
        $this->load->view('template_waka/footer');
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

            redirect('waka/siswa');
        } elseif ($cek == $kosong || $cek1 == $kosong || $cek2 == $kosong || $cek3 == $kosong || $cek4 == $kosong || $cek6 == $kosong || $cek8 == $kosong || $cek9 == $kosong) {
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');
        } elseif ($cek5 == $selec) {
            $this->session->set_flashdata('flash', 'Anda Belum Memilih Jenis Kelamin');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('waka/siswa');
        } elseif ($cek7 == $selec) {
            $this->session->set_flashdata('flash', 'Anda Belum Memilih kelas');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('waka/siswa');
        } else {
            $this->db->insert('siswa', $data);
            $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[nis]', '$password', 5, 1, now())");
            $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
            $this->session->set_flashdata('flashtype', 'success');
        }
        redirect('waka/siswa');
    }
    public function kelas()
    {
        $data['judul'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['prodi'] = $this->db->get('prodi')->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.kode = kelas.walas');
        $data['kelas'] = $this->db->get()->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/kelas', $data);
        $this->load->view('template_waka/footer');
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


        redirect('waka/kelas');
    }
    public function editKelas($id)
    {
        $data['judul'] = 'Edit Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kelas'] = $this->db->get_where('kelas', ['id_kelas' => $id])->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/editKelas', $data);
        $this->load->view('template_waka/footer');
    }
    public function updateKelas($id)
    {
        $data = [
            'tingkat' => $this->input->post('tingkat'),
            'prodi' => $this->input->post('prodi'),
            'rombel' => $this->input->post('rombel'),
            'walas' => $this->input->post('walas')
        ];
        $this->db->update('kelas', $data, ['id_kelas' => $id]);
        $this->session->set_flashdata('flash', 'Update Berhasil');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('waka/kelas');
    }
    public function hapusKelas($id)
    {
        $sql = "DELETE FROM kelas WHERE id_kelas = $id";
        $this->db->query($sql, [$id]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('waka/kelas');
    }
    public function mapel()
    {
        $data['judul'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/mapel', $data);
        $this->load->view('template_waka/footer');
    }
    public function hapusMapel($id)
    {
        $sql = "DELETE FROM mapel WHERE id_mapel = $id";
        $this->db->query($sql, [$id]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('waka/mapel');
    }
    public function tambahMapel()
    {
        $data = [
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel'),
        ];
        $this->db->insert('mapel', $data);

        $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('waka/mapel');
    }
    public function administrasi()
    {
        $data['judul'] = 'Administrasi Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/administrasi', $data);
        $this->load->view('template_waka/footer');
    }
    public function kelengkapan($kode)
    {
        $data['judul'] = 'Repository Administrasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['nama'] = $this->db->get_where('guru', ['kode' => $kode])->row_array();
        $this->db->select('*');
        $this->db->from('admin_guru');
        $this->db->join('guru', 'admin_guru.kode_guru = guru.kode');
        $this->db->join('mapel', 'mapel.id_mapel = admin_guru.mapel_id');
        $this->db->where('admin_guru.kode_guru', $kode);
        $this->db->order_by('kode_guru', 'esc');
        $data['admin'] = $this->db->get()->result_array();

        // $query = 'SELECT nama FROM guru WHERE kode=' . $kode;
        // $data['nama_guru'] = $this->db->query($query)->result_array();

        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/kelengkapan', $data);
        $this->load->view('template_waka/footer');
    }
}

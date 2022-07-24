<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __constructor()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
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
            'tahun_masuk' => $this->input->post('tahun_masuk')
        ];
        $this->db->insert('guru', $data);
        $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[kode]', '$data[kode]', 4, 1, now())");
        $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function siswa()
    {
        $data['judul'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahSiswa()
    {
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
        $this->db->insert('siswa', $data);
        $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[nis]', '$data[nis]', 5, 1, now())");
        $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/siswa');
    }
    public function uangmasuk()
    {
        $data['judul'] = 'Pemasukan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis_pemasukan'] = $this->db->get_where('rfgeneral', ['type' => 'jenis_pemasukan'])->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['js'] = 'uangmasuk';
        $this->db->select('pemasukan.*,rfgeneral.desc');
        $this->db->from('pemasukan');
        $this->db->join('rfgeneral', 'pemasukan.type = rfgeneral.id');
        $data['pemasukan'] =$query = $this->db->get()->result_array();;
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahpemasukan()
    {
        $data = [
            'type' => $this->input->post('type'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_guru' => $this->input->post('id_guru'),
            'tanggal_pemasukan' => $this->input->post('tanggal_pemasukan'),
        ];
        $insert=$this->db->insert('pemasukan', $data);
        redirect('admin/uangmasuk');
    }
    public function uangkeluar()
    {
        $data['judul'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangkeluar', $data);
        $this->load->view('template_admin/footer');
    }
    public function rekapuang()
    {
        $data['judul'] = 'Rekap / Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
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
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function suratkeluar()
    {
        $data['judul'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratkeluar', $data);
        $this->load->view('template_admin/footer');
    }
    public function rekapsurat()
    {
        $data['judul'] = 'Rekap / Laporan Surat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rekapsurat', $data);
        $this->load->view('template_admin/footer');
    }
}

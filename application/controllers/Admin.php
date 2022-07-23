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
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('template_admin/footer');
    }
    public function siswa()
    {
        $data['judul'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function uangmasuk()
    {
        $data['judul'] = 'Pemasukan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk', $data);
        $this->load->view('template_admin/footer');
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

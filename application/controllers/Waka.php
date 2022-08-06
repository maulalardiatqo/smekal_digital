<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waka extends CI_Controller
{
    public function __constructor()
    {
        parent::__construct();
        cek_login('3');
        $this->load->library('form_validation');
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
        $data['judul'] = 'Data Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/guru', $data);
        $this->load->view('template_waka/footer');
    }
    public function siswa()
    {
        $data['judul'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/siswa', $data);
        $this->load->view('template_waka/footer');
    }
    public function kelas()
    {
        $data['judul'] = 'Data Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.id = kelas.walas');
        $data['kelas'] = $this->db->get()->result_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/kelas', $data);
        $this->load->view('template_waka/footer');
    }
    public function jadwal()
    {
        $data['judul'] = 'Penjadwalan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/jadwal', $data);
        $this->load->view('template_waka/footer');
    }
    public function administrasi()
    {
        $data['judul'] = 'Administrasi Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/administrasi', $data);
        $this->load->view('template_waka/footer');
    }
}

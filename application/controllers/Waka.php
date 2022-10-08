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
    public function tambahMapel()
    {
        $data = [
            'nama_mapel' => $this->input->post('nama_mapel'),
            'status' => $this->input->post('status')
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
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/administrasi', $data);
        $this->load->view('template_waka/footer');
    }
}

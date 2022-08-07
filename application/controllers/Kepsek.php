<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('2');
        $this->load->library('form_validation');
        $this->load->model('siswaModel');
        $this->load->helper('date');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->num_rows();
        $data['guru'] = $this->db->get('guru')->num_rows();
        $data['kelas'] = $this->db->get('kelas')->num_rows();
        $data['casis'] = $this->db->get('casis')->num_rows();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/index', $data);
        $this->load->view('template_kepsek/footer');
    }
    public function keuangan()
    {
        $data['judul'] = 'Keuangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/keuangan', $data);
        $this->load->view('template_kepsek/footer');
    }
    public function ppdb()
    {
        $data['judul'] = 'PPDB';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['calon'] = $this->db->get('casis')->num_rows();
        $data['du'] = $this->db->get_where('casis', ['status' => 'DU'])->num_rows();
        $data['cancel'] = $this->db->get_where('casis', ['status' => 'Cancel'])->num_rows();
        $data['fix'] = $this->db->get_where('casis', ['status' => 'FIX'])->num_rows();
        $data['casis'] = $this->db->get('casis')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/ppdb', $data);
        $this->load->view('template_kepsek/footer');
    }
    public function absen()
    {
        $data['judul'] = 'Absensi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/absen', $data);
        $this->load->view('template_kepsek/footer');
    }
    public function proposal()
    {
        $data['judul'] = 'Absensi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/proposal', $data);
        $this->load->view('template_kepsek/footer');
    }
}

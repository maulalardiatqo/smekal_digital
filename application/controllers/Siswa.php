<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('5');
        $this->load->library('form_validation');
        $this->load->model('SiswaModel');
        $this->load->helper('date');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->num_rows();
        $data['guru'] = $this->db->get('guru')->num_rows();
        $data['kelas'] = $this->db->get('kelas')->num_rows();
        $this->load->view('template_siswa/topbar', $data);
        $this->load->view('template_siswa/header', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('template_siswa/footer');
    }
    public function pembayaran()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->num_rows();
        $data['guru'] = $this->db->get('guru')->num_rows();
        $data['kelas'] = $this->db->get('kelas')->num_rows();
        $this->load->view('template_siswa/topbar', $data);
        $this->load->view('template_siswa/header', $data);
        $this->load->view('siswa/pembayaran', $data);
        $this->load->view('template_siswa/footer');
    }
}

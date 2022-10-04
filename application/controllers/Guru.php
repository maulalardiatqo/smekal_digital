<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('4');
        $this->load->library('form_validation');
        $this->load->model('SiswaModel');
        $this->load->helper('date');
    }
    public function index()
    {

        $data['judul'] = 'Dashboard Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('template_guru/footer');
    }
    public function prota()
    {
        $data['judul'] = 'Program Tahunan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/prota', $data);
        $this->load->view('template_guru/footer');
    }
    public function promes()
    {
        $data['judul'] = 'Program Semesteran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/promes', $data);
        $this->load->view('template_guru/footer');
    }
    public function silabus()
    {
        $data['judul'] = 'Silabus';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/silabus', $data);
        $this->load->view('template_guru/footer');
    }
    public function rpp()
    {
        $data['judul'] = 'RPP';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/rpp', $data);
        $this->load->view('template_guru/footer');
    }
    public function nilaiSiswa()
    {
        $data['judul'] = 'Nilai Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/nilaiSiswa', $data);
        $this->load->view('template_guru/footer');
    }
    public function gaji()
    {
        $data['judul'] = 'Gaji';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $guru = $this->db->get_where('guru', ['kode' => $this->session->userdata('username')])->row_array();
        $data['gaji'] = $this->db->get_where('pengeluaran', ['id_guru' => $guru['id']])->result_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/gaji', $data);
        $this->load->view('template_guru/footer');
    }
    public function updateGaji($id)
    {
        $data = [
            'status_gaji' => 'TERKONFIRMASI'
        ];
        $this->db->update('pengeluaran', $data, ['id_guru' => $id]);
        $this->session->set_flashdata('flash', 'Update Berhasil');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('guru/gaji');
    }
}

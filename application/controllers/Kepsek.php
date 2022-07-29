<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->num_rows();
        $data['guru'] = $this->db->get('guru')->num_rows();
        $data['kelas'] = $this->db->get('kelas')->num_rows();
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
    public function surat()
    {
        $data['judul'] = 'Surat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['surat'] = $this->db->get('surat')->result_array();
        $this->load->view('template_kepsek/topbar', $data);
        $this->load->view('template_kepsek/header', $data);
        $this->load->view('kepsek/surat', $data);
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
}

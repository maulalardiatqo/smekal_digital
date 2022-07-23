<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __constructor()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        $data['judul'] = 'Dashboard Waka Kurikulum';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/index', $data);
        $this->load->view('template_guru/footer');
    }
}
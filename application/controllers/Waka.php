<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Waka extends CI_Controller
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
        $this->load->view('template_waka/topbar', $data);
        $this->load->view('template_waka/header', $data);
        $this->load->view('template_waka/sidebar', $data);
        $this->load->view('waka/index', $data);
        $this->load->view('template_waka/footer');
    }
}
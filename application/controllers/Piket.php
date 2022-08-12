<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . 'third_party/Spout/AutoLoader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login('7');
        $this->load->library('form_validation');
        $this->load->model('siswaModel');
        $this->load->helper('date');
    }
    public function index()
    {
        $data['title'] = 'Piket';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->siswaModel->getAll();
        $this->load->view('tempalte_piket/header', $data);
        $this->load->view('tempalte_piket/sidebar', $data);
        $this->load->view('tempalte_piket/topbar', $data);
        $this->load->view('piket/index', $data);
        $this->load->view('tempalte_piket/footer');
    }
}
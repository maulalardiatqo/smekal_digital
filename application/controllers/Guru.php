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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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
        $data['mapel'] = $this->db->get('mapel')->result_array();
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
    public function walas()
    {
        $data['judul'] = 'Wali Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $guru = $this->db->get_where('guru', ['kode' => $this->session->userdata('username')])->row_array();
        $guruid = $guru['id'];
        $data['naik'] = $this->db->get('kelas')->result_array();
        $data['kelas'] = $this->db->get_where('kelas', ['walas' => $guru['id']])->result_array();
        $query = "SELECT id_kelas FROM kelas WHERE walas = $guruid";
        $siswa = $this->db->query($query)->row_array();

        // Implode is method for convert array to string
        $idsiswa = implode($siswa);

        $data['siswa'] = $this->db->get_where('siswa', ['kelas' => $idsiswa])->result_array();
        $this->db->select('tingkat');
        $this->db->from('kelas');
        $data['tingkat'] = $this->db->get()->result_array();

        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/walas', $data);
        $this->load->view('template_guru/footer');
    }
    public function naik()
    {
        $to = $this->input->post('to');
        $inputan = $_POST;
        foreach ($inputan as $key => $siswa) {
            if ($key != "to" || $key != "example_length" || $key != "naik") {
                $this->db->where('id', $key);
                $this->db->update('siswa', ['kelas' => $to]);
            }
        }
        $this->session->set_flashdata('flash', 'Berhasil Update Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('guru/walas');
    }
    public function uploadAdmin()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'doc|docx|pdf|xlx|xlxs';
        $config['file_name'] = 'administrasiguru' . time();

        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $file = $this->upload->data();
            $data = [
                'jenis' => $this->input->post('jenis'),
                'kode_guru' => $this->session->userdata('username'),
                'file' =>  $config['file_name'],
                'smester' => $this->input->post('smester'),
                'ta' => $this->input->post('ta'),
                'mapel_id' => $this->input->post('mapel'),
                'kelas' => $this->input->post('kelas'),
                'keterangan' => $this->input->post('keterangan')
            ];
            $this->db->insert('admin_guru', $data);

            unlink('uploads/' . $file['file_name']);
            $this->session->set_flashdata('flash', 'Data Berhasil di Upload');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('guru');
        }
    }
}

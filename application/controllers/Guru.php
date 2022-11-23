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
    public function adminGuru()
    {
        $data['judul'] = 'Administrasi Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['mapel'] = $this->db->get('mapel')->result_array();
        $this->db->select('*');
        $this->db->from('admin_guru');
        $this->db->join('mapel', 'mapel.id_mapel = admin_guru.mapel_id');
        $this->db->join('kelas', 'kelas.id_kelas = admin_guru.kelas_id');
        $this->db->where('kode_guru', $this->session->userdata('username'));
        $data['admin'] = $this->db->get()->result_array();
        $this->load->view('template_guru/topbar', $data);
        $this->load->view('template_guru/header', $data);
        $this->load->view('template_guru/sidebar', $data);
        $this->load->view('guru/adminGuru', $data);
        $this->load->view('template_guru/footer');
    }
    public function tambahAdmin()
    {
        $config['upload_path']          = './uploads/administrasi/';
        $config['allowed_types']        = 'pdf|doc|xlsx|xls';
        $config['file_name']            = 'administrai' . $this->session->userdata('username') . 'jenis' . $this->input->post('jenis') . 'mapel' . $this->input->post('mapel') . 'kelas' . $this->input->post('kelas') . 'waktu' . time();
        $name = $_FILES["file"]["name"];
        $ext = end((explode(".", $name))); # extra () to prevent notice

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('flash', 'Gagal Upload File');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('guru/adminGuru');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data = [
                'kode_guru' => $this->session->userdata('username'),
                'jenis' => $this->input->post('jenis'),
                'mapel_id' => $this->input->post('mapel'),
                'kelas_id' => $this->input->post('kelas'),
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'file' => $config['file_name'],
                'extension' => $ext
            ];

            $this->db->insert('admin_guru', $data);
            $this->session->set_flashdata('flash', 'Berhasil Upload File');
            $this->session->set_flashdata('flashtype', 'success');
            redirect('guru/adminGuru');
        }
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
        $guruid = $guru['kode'];
        $data['naik'] = $this->db->get('kelas')->result_array();
        $data['kelas'] = $this->db->get_where('kelas', ['walas' => $guru['kode']])->result_array();
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

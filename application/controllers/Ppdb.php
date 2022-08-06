<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ppdb extends CI_Controller
{
    public function __constructor()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['casis'] = $this->db->get('casis')->num_rows();
        $data['du'] = $this->db->get_where('casis', ['status' => 'DU'])->num_rows();
        $data['fix'] = $this->db->get_where('casis', ['status' => 'FIX'])->num_rows();
        $data['cancel'] = $this->db->get_where('casis', ['status' => 'Cancel'])->num_rows();
        $this->load->view('template_ppdb/topbar', $data);
        $this->load->view('template_ppdb/header', $data);
        $this->load->view('template_ppdb/sidebar', $data);
        $this->load->view('ppdb/index', $data);
        $this->load->view('template_ppdb/footer');
    }
    public function casis()
    {
        $data['judul'] = 'Calon Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['casis'] = $this->db->get('casis')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_ppdb/topbar', $data);
        $this->load->view('template_ppdb/header', $data);
        $this->load->view('template_ppdb/sidebar', $data);
        $this->load->view('ppdb/casis', $data);
        $this->load->view('template_ppdb/footer');
    }
    public function tambahCasis()
    {
        $data = [
            'nama_casis' => $this->input->post('nama_casis'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'pendamping' => $this->input->post('pendamping'),
            'kontak' => $this->input->post('kontak'),
            'bukti' => $this->input->post('bukti'),
            'status' => $this->input->post('status'),
        ];
        $cek = $this->input->post('nama_casis');
        $cek1 =  $this->input->post('alamat');
        $cek2 = $this->input->post('asal_sekolah');
        $cek3 = $this->input->post('gender');
        $cek4 = $this->input->post('pendamping');
        $cek5 = $this->input->post('kontak');
        $cek6 = $this->input->post('bukti');
        $cek7 = $this->input->post('status');
        $selec = 'Please select';

        if ($cek == '' || $cek1 == '' || $cek2 == '' || $cek5 == '') {
            $this->session->set_flashdata('flash', 'Data Tidak Boleh Kosong');
            $this->session->set_flashdata('flashtype', 'danger');
        } elseif ($cek3 == $selec) {
            $this->session->set_flashdata('flash', 'Pilih Jenis Kelamin');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('ppdb/casis');
        } elseif ($cek4 == $selec) {
            $this->session->set_flashdata('flash', 'Pilih Pendamping');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('ppdb/casis');
        } elseif ($cek6 == $selec) {
            $this->session->set_flashdata('flash', 'Pilih Bukti');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('ppdb/casis');
        } elseif ($cek7 == $selec) {
            $this->session->set_flashdata('flash', 'Pilih Status');
            $this->session->set_flashdata('flashtype', 'danger');
            redirect('ppdb/casis');
        } else {
            $this->db->insert('casis', $data);
            $this->session->set_flashdata('flash', 'Data Berhasil Ditambahkan');
            $this->session->set_flashdata('flashtype', 'Success');
            redirect('ppdb/casis');
        }
    }
    public function hapusCasis($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('casis');
        $this->session->set_flashdata('flash', 'Data Berhasil Dihapus');
        $this->session->set_flashdata('flashtype', 'Success');
        redirect('ppdb/casis');
    }
    public function editCasis($id)
    {
        $data['judul'] = 'Edit Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['casis'] = $this->db->get_where('casis', ['id' => $id])->result_array();
        $this->load->view('template_ppdb/topbar', $data);
        $this->load->view('template_ppdb/header', $data);
        $this->load->view('template_ppdb/sidebar', $data);
        $this->load->view('ppdb/editCasis', $data);
        $this->load->view('template_ppdb/footer');
    }
    public function updateCasis($id)
    {
        $data = [
            'nama_casis' => $this->input->post('nama_casis'),
            'asal_sekolah' => $this->input->post('asal_sekolah'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'pendamping' => $this->input->post('pendamping'),
            'kontak' => $this->input->post('kontak'),
            'bukti' => $this->input->post('bukti'),
            'status' => $this->input->post('status'),
        ];
        $this->db->where('id', $id);
        $this->db->update('casis', $data);
        $this->session->set_flashdata('flash', 'Berhasil Update Data');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('ppdb/casis');
    }
}

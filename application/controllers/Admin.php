<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template_admin/footer');
    }
    public function pengguna()
    {
        $data['judul'] = 'Kelola Pengguna';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengguna'] = $this->db->get('user')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pengguna', $data);
        $this->load->view('template_admin/footer');
    }
    public function guru()
    {
        $data['judul'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahGuru()
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama' => $this->input->post('nama'),
            'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
            'gender' => $this->input->post('gender'),
            'jabatan' => $this->input->post('jabatan'),
            'kontak' => $this->input->post('kontak'),
            'tahun_masuk' => $this->input->post('tahun_masuk')
        ];
        $password = password_hash($data['kode'], PASSWORD_DEFAULT);
        $this->db->insert('guru', $data);
        $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[kode]', '$password', 4, 1, now())");
        $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function hapusGuru($kode)
    {
        $sql = "DELETE g.*, u.* FROM guru g, user u WHERE g.kode = $kode AND u.username = $kode";
        $this->db->query($sql, [$kode]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/guru');
    }
    public function siswa()
    {
        $data['judul'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahSiswa()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'is_unique[siswa.nis]|required');
        $data = [
            'nama' => $this->input->post('nama'),
            'nis' => $this->input->post('nis'),
            'nisn' => $this->input->post('nisn'),
            'alamat' => $this->input->post('alamat'),
            'gender' => $this->input->post('gender'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'kelas' => $this->input->post('kelas'),
            'kontak' => $this->input->post('kontak'),
            'tahun_masuk' => $this->input->post('tahun_masuk')
        ];
        $password = password_hash($data['nis'], PASSWORD_DEFAULT);
        $cek = $this->input->post('nis');
        $query = $this->db->get('siswa')->row_array();
        if ($cek == $query['nis']) {
            $this->session->set_flashdata('flash', 'NIS Sudah Terdaftar');
            $this->session->set_flashdata('flashtype', 'info');

            redirect('admin/siswa');
        } else {
            $this->db->insert('siswa', $data);
            $this->db->query("insert into user(nama, foto, username, password, role_id, is_active, date_create) values('$data[nama]', 'user_default.png', '$data[nis]', '$password', 5, 1, now())");
            $this->session->set_flashdata('flash', 'Data Berhasil Di Input');
            $this->session->set_flashdata('flashtype', 'success');
        }
        redirect('admin/siswa');
    }
    public function hapusSiswa($nis)
    {
        $sql = "DELETE s.*, u.* FROM siswa s, user u WHERE s.nis = $nis AND u.username = $nis";
        $this->db->query($sql, [$nis]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/siswa');
    }
    public function pengelolaan()
    {
        $data['judul'] = 'Pengelolaan Keungan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/pengelolaan', $data);
        $this->load->view('template_admin/footer');
    }
    public function uangmasuk()
    {
        $data['judul'] = 'Pemasukan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis_pemasukan'] = $this->db->get_where('rfgeneral', ['type' => 'jenis_pemasukan'])->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['js'] = 'uangmasuk';
        $this->db->select('pemasukan.*,rfgeneral.desc');
        $this->db->from('pemasukan');
        $this->db->join('rfgeneral', 'pemasukan.type = rfgeneral.id');
        $data['pemasukan'] = $query = $this->db->get()->result_array();;
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function savepemasukan()
    {
        $data = [
            'id' => $this->input->post('id'),
            'type' => $this->input->post('type'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_guru' => $this->input->post('id_guru'),
            'tanggal_pemasukan' => $this->input->post('tanggal_pemasukan'),
        ];
        $save = $this->db->replace('pemasukan', $data);
        redirect('admin/uangmasuk');
    }

    public function deletepemasukan($id)
    {
        $this->db->delete('pemasukan', ['id' => $id]);
        redirect('admin/uangmasuk');
    }

    public function uangkeluar()
    {
        $data['judul'] = 'Pengeluaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['jenis_pemasukan'] = $this->db->get_where('rfgeneral', ['type' => 'jenis_pemasukan'])->result_array();
        $data['siswa'] = $this->db->get('siswa')->result_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $data['js'] = 'uangkeluar';
        $this->db->select('pengeluaran.*,rfgeneral.desc');
        $this->db->from('pengeluaran');
        $this->db->join('rfgeneral', 'pengeluaran.type = rfgeneral.id');
        $data['pengeluaran'] = $query = $this->db->get()->result_array();;
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/uangkeluar', $data);
        $this->load->view('template_admin/footer');
    }

    public function savepengeluaran()
    {
        $data = [
            'id' => $this->input->post('id'),
            'type' => $this->input->post('type'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan'),
            'id_siswa' => $this->input->post('id_siswa'),
            'id_guru' => $this->input->post('id_guru'),
            'tanggal_pengeluaran' => $this->input->post('tanggal_pengeluaran'),
        ];
        $save = $this->db->replace('pengeluaran', $data);
        redirect('admin/uangkeluar');
    }

    public function deletepengeluaran($id)
    {
        $this->db->delete('pengeluaran', ['id' => $id]);
        redirect('admin/uangkeluar');
    }

    public function rekapuang()
    {
        $data['judul'] = 'Rekap / Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rekapuang', $data);
        $this->load->view('template_admin/footer');
    }
    public function suratmasuk()
    {
        $data['judul'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratmasuk', $data);
        $this->load->view('template_admin/footer');
    }
    public function suratkeluar()
    {
        $data['judul'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/suratkeluar', $data);
        $this->load->view('template_admin/footer');
    }
    public function rekapsurat()
    {
        $data['judul'] = 'Rekap / Laporan Surat';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/rekapsurat', $data);
        $this->load->view('template_admin/footer');
    }
    public function kelas()
    {
        $data['judul'] = 'Inventaris Kelas';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['guru'] = $this->db->get('guru')->result_array();
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->join('guru', 'guru.id = kelas.walas');
        $data['kelas'] = $this->db->get()->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahKelas()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama'),
            'prodi' => $this->input->post('prodi'),
            'walas' => $this->input->post('walas'),
        ];
        $this->db->insert('Kelas', $data);
        $this->session->set_flashdata('flash', 'Data Berhasil Di Tambah');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/kelas');
    }
    public function hapusKelas($id)
    {
        $sql = "DELETE FROM kelas WHERE id = $id";
        $this->db->query($sql, [$id]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/kelas');
    }
    public function lab()
    {
        $kode = 1;
        $data['judul'] = 'Inventaris Lab Komputer';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/lab', $data);
        $this->load->view('template_admin/footer');
    }
    public function perbankan()
    {
        $kode = 2;
        $data['judul'] = 'Inventaris Perbankan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/perbankan', $data);
        $this->load->view('template_admin/footer');
    }
    public function bengkel()
    {
        $kode = 3;
        $data['judul'] = 'Inventaris Bengkel (TKR)';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['inventaris'] = $this->db->get_where('inventaris', ['kode' => $kode])->result_array();
        $this->load->view('template_admin/topbar', $data);
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/bengkel', $data);
        $this->load->view('template_admin/footer');
    }
    public function tambahInventaris($hal)
    {
        $data = [
            'kode' => $this->input->post('kode'),
            'nama_barang' => $this->input->post('nama_barang'),
            'spek' => $this->input->post('spek'),
            'kondisi' => $this->input->post('kondisi'),
            'jumlah' => $this->input->post('jumlah'),
            'tempat' => $this->input->post('tempat')
        ];
        $this->db->insert('inventaris', $data);
        $this->session->set_flashdata('flash', 'Data Berhasil Di Tambah');
        $this->session->set_flashdata('flashtype', 'success');

        redirect('admin/' . $hal);
    }
    public function hapusInventaris($id_inventaris, $hal)
    {
        $sql = "DELETE FROM inventaris WHERE id_inventaris = $id_inventaris";
        $this->db->query($sql, [$id_inventaris]);

        $this->session->set_flashdata('flash', 'Data dihapus');
        $this->session->set_flashdata('flashtype', 'success');
        redirect('admin/' . $hal);
    }
}

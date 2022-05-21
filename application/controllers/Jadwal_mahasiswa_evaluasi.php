<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Jadwal_mahasiswa_evaluasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal_mahasiswa_evaluasi');
        $this->load->library('session');
        is_logged_in('2');
    }

    public function index()
    {
        $data['title'] = 'Jadwal Mahasiswa Evaluasi';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        // $data['mahasiswa'] = $this->m_jadwal_mahasiswa_evaluasi->tampil_data2()->result();

        $userlogin = $this->session->userdata('id');
        $query = $this->db->query("select user.*, tbl_profil_mahasiswa.*
                                    from user join tbl_profil_mahasiswa on user.id = tbl_profil_mahasiswa.id_mahasiswa where tbl_profil_mahasiswa.id_mahasiswa = $userlogin");
        $id_diklat = 0;
        foreach ($query->result_array() as $q) {
            $where = $q['id_diklat'];
            $querymk = $this->db->query("select tbl_mata_kuliah.*, tbl_paket_evaluasi.*
                                        from tbl_mata_kuliah
                                        join tbl_paket_evaluasi
                                        on tbl_mata_kuliah.id_mata_kuliah = tbl_paket_evaluasi.id_mata_kuliah
                                        where id_diklat =  $where  && tbl_paket_evaluasi.id_mata_kuliah = tbl_mata_kuliah.id_mata_kuliah order by tbl_paket_evaluasi.id_mata_kuliah")->result();
        };
        $data['mahasiswa'] = $querymk;

        $this->load->view('jadwal_mahasiswa_evaluasi/index', $data);
        $this->load->view('templates_dosen/footer');

    }

    public function getdaftarmatkul()
    {
        $data['title'] = 'Daftar Mata Kuliah';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        // $data['mahasiswa'] = $this->m_jadwal_mahasiswa_evaluasi->tampil_data2()->result();

        $userlogin = $this->session->userdata('id');
        $query = $this->db->query("select user.*, tbl_profil_mahasiswa.*
                                    from user join tbl_profil_mahasiswa on user.id = tbl_profil_mahasiswa.id_mahasiswa where tbl_profil_mahasiswa.id_mahasiswa = $userlogin");
        $id_diklat = 0;
        foreach ($query->result_array() as $q) {
            $where = $q['id_diklat'];
            $querymk = $this->db->query("select tbl_dosen.*, tbl_mata_kuliah.*
                                        from tbl_mata_kuliah join tbl_dosen on tbl_mata_kuliah.id_dosen = tbl_dosen.id_dosen where id_diklat = $where")->result();
        };
        $data['matkul'] = $querymk;

        $this->load->view('jadwal_mahasiswa_evaluasi/daftarmatkul', $data);
        $this->load->view('templates_dosen/footer');

    }

}

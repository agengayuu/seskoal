<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Hasil_evaluasi_mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('mypdf');
        $this->load->model('m_hasil_evaluasi_mahasiswa');
        $this->load->library('session');

        is_logged_in('2');
        // session_start();
    }

    // public function index()
    // {
    //     $data['title'] = 'Hasil Evaluasi Mahasiswa';
    //     $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //     $userlogin = $this->session->userdata('id');
    //     // print_r($userlogin);
    //     $array_id_mata_kuliah = $this->m_hasil_evaluasi_mahasiswa->get_id_matakuliah($userlogin);

    //     // echo '<pre>';
    //     // print_r( $this->m_hasil_evaluasi_mahasiswa->get_mahasiswa($array_id_mata_kuliah));
    //     // die();

    //     if (count($array_id_mata_kuliah) > 0) {
    //         $data['mahasiswa'] = $this->m_hasil_evaluasi_mahasiswa->get_mahasiswa($array_id_mata_kuliah);
    //         // var_dump($data['mahasiswa']);die;
    //     } else {
    //         $data['mahasiswa'] = [];
    //     }

    //     // echo "<pre>";print_r($data);die;
    //     // $data['diklatnya'] = $this->m_diklat->tampildata()->result();
    //     $this->load->view('templates_dosen/header', $data);
    //     $this->load->view('templates_dosen/sidebar_admin', $data);
    //     $this->load->view('hasil_evaluasi_mahasiswa/index', $data);

    //     $this->load->view('templates_dosen/footer');

    // }

    public function index() {
        $data['title'] = 'Daftar Mata Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $userlogin = $this->session->userdata('id');
        
        $data['getmatkul'] = $this->m_hasil_evaluasi_mahasiswa->get_matakuliah();
        $data['mhs'] = $this->m_hasil_evaluasi_mahasiswa->get_nilai();

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('hasil_evaluasi_mahasiswa/daftar_matkul', $data);

        $this->load->view('templates_dosen/footer');

    }

    public function daftarpaket() {
        $data['title'] = 'Hasil Tes Evaluasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        
        $paket = $this->uri->segment(3);
        $data['mhs'] = $this->m_hasil_evaluasi_mahasiswa->get_nilai();
        $data['getpaket'] = $this->m_hasil_evaluasi_mahasiswa->get_paket($paket);

        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('hasil_evaluasi_mahasiswa/daftar_paket', $data);

        $this->load->view('templates_dosen/footer');

    }

    public function print_rekap()
    {
        $paket = $this->uri->segment(3);
        $data['getrekap'] = $this->m_hasil_evaluasi_mahasiswa->get_paket($paket);
        $data['mhs'] = $this->m_hasil_evaluasi_mahasiswa->get_nilai();
        $this->mypdf->generate('hasil_evaluasi_mahasiswa/cetak_rekap', $data, 'Cetak Hasil Ujian ujian', 'A4', 'Landscape');
    }
}

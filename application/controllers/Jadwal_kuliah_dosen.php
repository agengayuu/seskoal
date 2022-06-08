<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Jadwal_kuliah_dosen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal_kuliah_dosen');
        $this->load->library('session');
        is_logged_in('3');
    }

    public function index()
    {
        $data['title'] = 'Jadwal Kuliah Dosen';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $query = $this->m_jadwal_kuliah_dosen->get(); 
        $data['jadwal'] = $query;

        // var_dump($query);
        // die;

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('jadwal_kuliah_dosen/index', $data);
        $this->load->view('templates_dosen/footer');
    }

    public function matakuliah_dosen()
    {
        $data['title'] = 'Matakuliah Dosen';

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $query = $this->m_jadwal_kuliah_dosen->getmatakuliah();
        $data['matakuliah'] = $query;

        $this->load->view('templates_dosen/sidebar_admin', $data);
        $this->load->view('jadwal_kuliah_dosen/matakuliah_dosen', $data);
        $this->load->view('templates_dosen/footer');
    }
}

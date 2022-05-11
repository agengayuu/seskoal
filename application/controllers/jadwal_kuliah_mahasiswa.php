<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Jadwal_kuliah_mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal_kuliah_mahasiswa');
        $this->load->library('session');
        // is_logged_in('3');
        //session_start();
    }


    public function index()
    {
        $data['title'] = 'Jadwal Kuliah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);
        $this->load->view('templates_dosen/sidebar_admin', $data);

        $query= $this->m_jadwal_kuliah_mahasiswa->getdata();
        // echo "<pre>";
        // print_r($query);die;
        $data['jadwal'] = $query;
        
        $query1 = $this->m_jadwal_kuliah_mahasiswa->getakademik();
        $data['tahunakademik'] = $query1;

        $this->load->view('jadwal_kuliah_mahasiswa/index', $data);
        $this->load->view('templates_dosen/footer');
    }




}

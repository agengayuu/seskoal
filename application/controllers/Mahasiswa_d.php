<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Mahasiswa_d extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa_d');
        $this->load->library('session');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Mahasiswa per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['mahasiswa_d'] = $this->m_mahasiswa_d->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar', $data); 
        $this->load->view('mahasiswa_d/mahasiswa_d', $data); 


        $data['diklatnya'] = $this->m_mahasiswa_d->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }
    


}
<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Penilaian_dosen extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_penilaian_d');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        is_logged_in('3');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Penilaian per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['penilaian_d'] = $this->m_penilaian_d->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar_admin', $data); 
        $this->load->view('penilaian_d/index', $data); 


        $data['diklatnya'] = $this->m_penilaian_d->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }
    


}
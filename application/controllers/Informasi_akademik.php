<?php

if(!defined('BASEPATH')) 
exit('No direct script access allowed');

class Informasi_akademik extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_mahasiswa_d');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        is_logged_in('3');
       // session_start();
    }

    public function index() {
        $data['title'] = 'Informasi Akademik';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $this->load->view('informasi_akademik/index', $data); 
        $this->load->view('templates_dosen/footer'); 
    }
}
 
?>
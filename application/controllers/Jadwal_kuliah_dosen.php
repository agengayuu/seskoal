<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Jadwal_kuliah_dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_mahasiswa');
        $this->load->library('session');
        is_logged_in('3');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Jadwal Kuliah Dosen';
        
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 

        $this->load->view('templates_dosen/header', $data); 
        // $data['siswa'] = $this->m_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('jadwal_kuliah_dosen/index',$data);
        $this->load->view('templates_dosen/footer'); 
        
    }




}


?>
<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Profil_mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_profil_mahasiswa');
        $this->load->library('session');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Profil Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        $data['profil_mahasiswa'] = $this->m_profil_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('profil_mahasiswa/index', $data);
        $this->load->view('templates_dosen/footer'); 
    }

    public function detail(){
        $data['title'] = 'Profil Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        // $data['profil_mahasiswa'] = $this->m_profil_mahasiswa->tampildata()->result();

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('profil_mahasiswa/detail', $data);
        $this->load->view('templates_dosen/footer'); 
    }
}


?>
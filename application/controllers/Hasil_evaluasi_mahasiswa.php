<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Hasil_evaluasi_mahasiswa extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        // $this->load->model('m_diklat');
        $this->load->library('session');
        is_logged_in('2');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Hasil Evaluasi Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        // $data['diklatnya'] = $this->m_diklat->tampildata()->result();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('hasil_evaluasi_mahasiswa/index');

        $this->load->view('templates_dosen/footer'); 

    }
    


}
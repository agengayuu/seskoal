<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Jadwal_kuliah_dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jadwal_kuliah_dosen');
        $this->load->library('session');
        // is_logged_in('3');
        //session_start();
    }


    public function index(){
        $data['title'] = 'Jadwal Kuliah Dosen';
        
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data);

        $query= $this->m_jadwal_kuliah_dosen->get();
        // echo "<pre>";
        // print_r($query);die;
        $data['jadwal'] = $query;

        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('jadwal_kuliah_dosen/index',$data);
        $this->load->view('templates_dosen/footer'); 
    }




}

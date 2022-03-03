<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
       // $this->load->model('m_dosen');
        $this->load->library('session');
        //session_start();
    }


    public function index(){
        $data['title'] = "Daftar Dosen";
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 

        $this->load->view('templates_dosen/header',$data); 
        $query = $this->db->query("select * from 
                        tbl_dosen ")->result();
        $data['dosen'] = $query;
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('dosen/index');
        $this->load->view('templates_dosen/footer');
    }
}
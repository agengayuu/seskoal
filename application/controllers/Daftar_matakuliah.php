<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Daftar_matakuliah extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_daftar_matakuliah');
        $this->load->library('session');
        $this->load->helper('aksesblock');
        is_logged_in('3');
       // session_start();
    }

    public function index(){
        $data['title'] = 'Daftar Mata Kuliah';
        
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data);

        $query= $this->m_daftar_matakuliah->get();
        // echo "<pre>";
        // print_r($query);die;
        $data['daftar_matakuliah'] = $query;


        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('daftar_matakuliah/index',$data);
        $this->load->view('templates_dosen/footer'); 
    }
}
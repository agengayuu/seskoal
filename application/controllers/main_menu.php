<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        //session_start();
    }

    public function admin() {

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/admin',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function dosen() {

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/dosen',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function siswa() {

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/siswa',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }
}

?>
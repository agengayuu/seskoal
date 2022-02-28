<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu extends CI_Controller {

    public function index() {

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/admin'); 
        $this->load->view('templates_dosen/footer'); 
    }

    public function admin(){
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/admin'); 
        $this->load->view('templates_dosen/footer'); 

    }
}

?>
<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu_dosen extends CI_Controller {

    public function index() {
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $this->load->view('dosen/index', $data); 
        $this->load->view('templates_dosen/footer'); 
    }
}
 
?>
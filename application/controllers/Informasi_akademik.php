<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Informasi_akademik extends CI_Controller {

    public function index() {
        $data['title'] = 'Informasi Akademik';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();  
        $this->load->view('templates_dosen/header',$data);  
        $this->load->view('templates_dosen/sidebar',$data); 

        $this->load->view('informasi_akademik/index', $data); 
        $this->load->view('templates_dosen/footer'); 
    }
}
 
?>
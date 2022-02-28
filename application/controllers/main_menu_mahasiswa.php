<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Main_menu_dosen extends CI_Controller {

    public function index() {
        $this->load->view('templates_dosen/header'); 
        $this->load->view('templates_dosen/sidebar_mahasiswa'); 
        $this->load->view('mahasiswa/index'); 
        $this->load->view('templates_dosen/footer'); 
    }
}

?>
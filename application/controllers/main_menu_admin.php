<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main_menu_admin extends CI_Controller
{

    public function index()
    {
        $this->load->view('templates_dosen/header');
        $this->load->view('templates_dosen/sidebar_admin');
        $this->load->view('main_menu/admin');
        $this->load->view('templates_dosen/footer');
    }
}

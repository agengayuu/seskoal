<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Main_menu_mahasiswa extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header');
        $this->load->view('templates_dosen/sidebar_mahasiswa', $data);
        $this->load->view('main_menu/siswa');
        $this->load->view('templates_dosen/footer');
    }
}

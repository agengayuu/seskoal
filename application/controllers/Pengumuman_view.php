<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Pengumuman_view extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_pengumuman_v');
        $this->load->library('session');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Pengumuman';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['pengumuman'] = $this->m_pengumuman_v->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar', $data); 
        $this->load->view('pengumuman_view/index', $data); 


        $data['diklatnya'] = $this->m_pengumuman_v->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }
    


}
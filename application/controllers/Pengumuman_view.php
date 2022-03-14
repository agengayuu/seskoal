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
        $this->load->helper('aksesblock');
        is_logged_in('2');
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Pengumuman';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header', $data); 
        $data['pengumuman'] = $this->m_pengumuman_v->tampil_data()->result();
        $this->load->view('templates_dosen/sidebar_admin', $data); 
        $this->load->view('pengumuman_view/index', $data);
        $this->load->view('templates_dosen/footer'); 

    }

    public function detail($id_pengumuman) {
        $data['title'] = 'Detail Pengumuman';
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array(); 
        $this->load->view('templates_dosen/header', $data); 
        // $data['pengumuman'] = $this->m_pengumuman_v->detail($id_pengumuman);
        $data['pengumuman'] = $this->db->query("select * from tbl_pengumuman")->result_array();


        $this->load->view('templates_dosen/sidebar_admin',$data); 
        // $this->load->view('mahasiswa/detail');
        $this->load->view('templates_dosen/footer');
    }

}
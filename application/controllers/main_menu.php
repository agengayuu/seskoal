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
        
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/admin',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function dosen() {

        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
        $this->load->view('main_menu/dosen',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }

    public function siswa() {
        $data['user'] = $this->db->get_where('user', ['username'=> 
        $this->session->userdata('username')])->row_array();
        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 

        $query = $this->db->query("select * from tbl_pengumuman")->result();
        $last = $this->db->order_by('id_pengumuman', 'desc')
        ->limit(1)
        ->get('tbl_pengumuman')
        ->result();
        //print_r($last);die;
        $data['pengumuman'] = $last;

        $idterakhir = 
        $this->load->view('main_menu/siswa',$data); 
        $this->load->view('templates_dosen/footer',$data); 
    }
}

<?php

if(!defined('BASEPATH'))
exit('No direct script access allowed');

class Mahasiswa_d extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_mahasiswa_d');
        $this->load->library('session');
        if(!$this->session->userdata('username')){
            redirect('login');
        }
       // session_start();
    }
 
    public function index(){
        $data['title'] = 'Mahasiswa per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $data['mahasiswa_d'] = $this->m_mahasiswa_d->tampil_data()->result();
        $this->load->view('templates_dosen/header', $data); 
        $this->load->view('templates_dosen/sidebar', $data); 
        $this->load->view('mahasiswa_d/index', $data); 


        $data['diklatnya'] = $this->m_mahasiswa_d->tampil_data()->result();
        $this->load->view('templates_dosen/footer'); 

    }

    public function lm($id) {
        $data['title'] = 'List Mahasiswa per Diklat';

        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();

        $this->load->view('templates_dosen/header',$data); 
        $this->load->view('templates_dosen/sidebar_admin',$data); 
    
        $query= $this->db->query("select * from tbl_mahasiswa where id_diklat='".$id."' order by id_mahasiswa asc")->result();
        $data['siswa'] = $query;
        
        $this->load->view('mahasiswa_d/lm',$data);
        $this->load->view('templates_dosen/footer');
    }
    


}